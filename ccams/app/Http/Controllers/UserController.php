<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Activity;
use App\Models\Club;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class UserController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'ic' => 'required|string|max:12',
            'role' => 'required|string|in:student,teacher', // Ensure role is either student or teacher
        ]);
        

        // Create and save the user to the database with a hashed password
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']), // Hash the password
            'ic' => $validatedData['ic'],
            'role' => $validatedData['role'],
        ]);

        return redirect()->route('login.index')->with('success', 'Sign up successfully');
    }
    public function checkEmail(Request $request)
    {
        $exists = User::where('email', $request->email)->exists();
        return response()->json(['exists' => $exists]);
    }
    public function checkName(Request $request)
    {
        $exists = User::where('name', $request->name)->exists();
        return response()->json(['exists' => $exists]);
    }
    public function checkIC(Request $request)
    {
        $exists = User::where('ic', $request->ic)->exists();
        return response()->json(['exists' => $exists]);
    }      


    public function create()
    {
        return view('login.signin'); // 假设您的注册视图文件是 signin.blade.php
    }

    public function showLoginForm()
    {
        return view('login.index'); // 返回登录视图 'login.index'
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'email' => !$user ? 'The email address does not exist.' : null,
                'password' => $user && !Hash::check($request->password, $user->password) ? 'The password you entered is incorrect.' : null,
            ]);
        }

        Auth::login($user);
        $user->update(['last_login_at' => now('UTC')]);

        $request->session()->regenerate();

        return $this->redirectToDashboard($user);
    }

    // 根据用户角色导航到不同的界面
    private function redirectToDashboard(User $user)
    {
        $routes = [
            'teacher' => 'dashboard.index',
            'student' => 'dashboard.index',
        ];

        return isset($routes[$user->role])
            ? redirect()->route($routes[$user->role])->with('success', 'Welcome, ' . ucfirst($user->role) . '!')
            : redirect()->route('login.index')->with('error', 'Invalid user role!');
    }




    // public function logout(): RedirectResponse
    // {
    //     auth()->logout(); // 使用 Laravel 的 auth() 函数登出
    //     return redirect()->route('login.index'); // 注销后重定向到登录页面
    // }


    public function index()
{
    $users = User::all(); 
    foreach ($users as $user) {
        $user->last_login_at = Carbon::parse($user->last_login_at)->format('Y-m-d H:i:s');
    }
    $activities = Activity::all();
    $clubs = Club::all();
    return view('profile.list', compact('users', 'activities', 'clubs'));
}



    public function show(int $id)
    {
        $user = User::findOrFail($id);
        return view('profile.show', compact('user')); 
    }
    public function edit(int $id)
    {
        $user = User::findOrFail($id); 
        return view('users.edit', compact('user')); 
    }


    public function update(Request $request, int $id)
    {
        // 验证请求数据
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id, // 排除当前用户的邮箱进行唯一性验证
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|string',
        ]);
        $user = User::findOrFail($id); // 根据 ID 查找用户
        // 更新用户信息，如果密码被更改，则进行哈希加密
        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'] ? Hash::make($validated['password']) : $user->password,
            'role' => $validated['role'],
        ]);
        return redirect()->route('login.index')->with('success', 'successful saved');
    }


    public function destroy(int $id)
    {
        $user = User::findOrFail($id); // 根据 ID 查找用户
        $user->delete(); // 从数据库删除用户
        return redirect()->route('users.index')->with('success', '用户删除成功');
    }



    //reset password
    public function resetPassword(Request $request)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'email' => 'required|email|exists:users,email', // Ensure email exists in the users table
            'ic' => 'required|string|max:12|exists:users,ic', // Ensure IC exists in the users table
            'Newpassword' => 'required|min:8|confirmed', // Password rules and confirmation
        ]);
        // Retrieve the user based on email and IC
        $user = User::where('email', $validatedData['email'])
                    ->where('ic', $validatedData['ic'])
                    ->first();
        if (!$user) {
            // If the user is not found with the provided email and IC
            return redirect()->back()->withErrors(['email' => 'Email or IC is incorrect.'])->withInput();
        }
        // Update the password
        $user->password = Hash::make($validatedData['Newpassword']); // Hash the new password
        $user->save();
        // Redirect to the login page or display success
        return redirect()->route('login.index')->with('success', 'Password has been reset successfully!');
    }
    public function checkEmailAndICMatch(Request $request)
    {
        $email = $request->input('email');
        $ic = $request->input('ic');
        // Check if the email and IC match the same user
        $user = User::where('email', $email)->where('ic', $ic)->first();
        if ($user) {
            return response()->json(['match' => true]);
        } else {
            return response()->json(['match' => false]);
        }
    }



    //profile:
    public function showprofile()
    {
        $user = Auth::user();
        $user->last_login_at = Carbon::parse($user->last_login_at)->format('Y-m-d H:i:s');
        $activities = Activity::all();
        $clubs = Club::all();
        return view('profile.index', compact('user', 'activities', 'clubs'));

    }

// Update the profile
public function editprofile(Request $request)
{
    // Validation for new fields (address, city, etc.)
    $request->validate([
        'address' => 'nullable|string',
        'city' => 'nullable|string',
        'country' => 'nullable|string',
        'postal_code' => 'nullable|string',
        'about_me' => 'nullable|string',
        'current_password' => 'nullable|string',
        'new_password' => 'nullable|string|confirmed|min:8',
        'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional image upload for profile picture
    ]);

    // Get the current authenticated user
    $user = Auth::user();

    // Handle profile picture upload (if present)
    if ($request->hasFile('profile_pic')) {
        $profilePicPath = $request->file('profile_pic')->store('public/profiles');
        $user->profile_pic = basename($profilePicPath); // Save the filename to the database
    }

    // Handle profile picture upload (if present)
    $profilePicPath = null;
    if ($request->hasFile('profile_pic')) {
        $profilePicPath = $request->file('profile_pic')->store('profiles', 'public');
        $user->profile_pic = basename($profilePicPath); // Save the filename to the database
    }

    // Update other fields (address, city, country, etc.)
    $user->address = $request->address;
    $user->city = $request->city;
    $user->country = $request->country;
    $user->postal_code = $request->postal_code;
    $user->about_me = $request->about_me;

    // If a new password is provided, check the current password and update the password field
    if ($request->new_password) {
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }
        $user->password = Hash::make($request->new_password);
    }

    // Save the changes to the user model
    $user->save();

    return redirect()->route('profile.index')->with('success', 'Profile updated successfully');
}
}

// <?php

// namespace App\Http\Controllers;

// use Carbon\Carbon;
// use App\Models\User;
// use App\Models\Activity;
// use App\Models\Club;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Auth;

// class UserController extends Controller
// {
//     // 用户注册
//     public function store(Request $request)
//     {
//         $validatedData = $request->validate([
//             'name' => 'required|string|max:255',
//             'email' => 'required|email|unique:users,email',
//             'password' => 'required|min:8',
//             'ic' => 'required|string|max:12',
//             'role' => 'required|string|in:student,teacher', // 确保角色是 student 或 teacher
//         ]);

//         User::create([
//             'name' => $validatedData['name'],
//             'email' => $validatedData['email'],
//             'password' => Hash::make($validatedData['password']),
//             'ic' => $validatedData['ic'],
//             'role' => $validatedData['role'],
//         ]);

//         return redirect()->route('login.index')->with('success', 'Sign up successfully');
//     }

//     // 用户登录
//     public function login(Request $request)
//     {
//         $request->validate([
//             'email' => ['required', 'email'],
//             'password' => ['required'],
//         ]);

//         $user = User::where('email', $request->email)->first();

//         if (!$user) {
//             return back()->withErrors(['email' => 'The email address does not exist.']);
//         }

//         if (!Hash::check($request->password, $user->password)) {
//             return back()->withErrors(['password' => 'The password you entered is incorrect.']);
//         }

//         Auth::login($user);
//         $user->last_login_at = now('UTC');
//         $user->save();

//         // 防止会话固定攻击
//         $request->session()->regenerate();

//         // 根据角色导航到不同的界面
//         return $this->redirectToDashboard($user);
//     }

//     // 根据用户角色导航到不同的界面
//     private function redirectToDashboard(User $user)
//     {
//         if ($user->role === 'teacher') {
//             return redirect()->route('teacher.dashboard')->with('success', 'Welcome, Teacher!');
//         } elseif ($user->role === 'student') {
//             return redirect()->route('student.dashboard')->with('success', 'Welcome, Student!');
//         }

//         return redirect()->route('login.index')->with('error', 'Invalid user role!');
//     }

//     // 教师或学生的控制逻辑
//     public function dashboard()
//     {
//         $user = Auth::user();

//         if ($user->role === 'teacher') {
//             return view('teacher.dashboard'); // 教师视图
//         } elseif ($user->role === 'student') {
//             return view('student.dashboard'); // 学生视图
//         }

//         abort(403, 'Unauthorized access'); // 如果角色不符合预期
//     }

//     // 显示登录页面
//     public function showLoginForm()
//     {
//         return view('login.index');
//     }

//     // 登出
//     public function logout()
//     {
//         Auth::logout();
//         return redirect()->route('login.index')->with('success', 'Logged out successfully!');
//     }

//     // 用户信息查看
//     public function show(int $id)
//     {
//         $user = User::findOrFail($id);
//         return view('users.show', compact('user'));
//     }

//     // 用户信息更新
//     public function update(Request $request, int $id)
//     {
//         $validated = $request->validate([
//             'name' => 'required|string|max:255',
//             'email' => 'required|email|unique:users,email,' . $id,
//             'password' => 'nullable|string|min:8|confirmed',
//             'role' => 'required|string',
//         ]);

//         $user = User::findOrFail($id);

//         $user->update([
//             'name' => $validated['name'],
//             'email' => $validated['email'],
//             'password' => $validated['password'] ? Hash::make($validated['password']) : $user->password,
//             'role' => $validated['role'],
//         ]);

//         return redirect()->route('users.index')->with('success', 'User updated successfully');
//     }

//     // 用户信息删除
//     public function destroy(int $id)
//     {
//         $user = User::findOrFail($id);
//         $user->delete();
//         return redirect()->route('users.index')->with('success', 'User deleted successfully');
//     }

//     // 用户资料显示
//     public function showProfile()
//     {
//         $user = Auth::user();
//         $user->last_login_at = Carbon::parse($user->last_login_at)->format('Y-m-d H:i:s');
//         $activities = Activity::all();
//         $clubs = Club::all();
//         return view('profile.index', compact('user', 'activities', 'clubs'));
//     }

//     // 用户资料更新
//     public function editProfile(Request $request)
//     {
//         $request->validate([
//             'address' => 'nullable|string',
//             'city' => 'nullable|string',
//             'country' => 'nullable|string',
//             'postal_code' => 'nullable|string',
//             'about_me' => 'nullable|string',
//             'current_password' => 'nullable|string',
//             'new_password' => 'nullable|string|confirmed|min:8',
//         ]);

//         $user = Auth::user();

//         $user->address = $request->address;
//         $user->city = $request->city;
//         $user->country = $request->country;
//         $user->postal_code = $request->postal_code;
//         $user->about_me = $request->about_me;

//         if ($request->new_password) {
//             if (!Hash::check($request->current_password, $user->password)) {
//                 return back()->withErrors(['current_password' => 'Current password is incorrect']);
//             }
//             $user->password = Hash::make($request->new_password);
//         }

//         $user->save();

//         return redirect()->route('profile.index')->with('success', 'Profile updated successfully');
//     }
// }
