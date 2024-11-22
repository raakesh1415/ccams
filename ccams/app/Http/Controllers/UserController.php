<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

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

    public function index()
    {
        $users = User::all(); // 获取所有用户
        return view('users.index', compact('users')); // 返回包含所有用户的视图
    }

public function login(Request $request)
{
    // 验证请求数据
    $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    // 查找用户是否存在
    $user = User::where('email', $request->email)->first();

    if (!$user) {
        // 邮箱不存在
        return back()->withErrors([
            'email' => 'The email address does not exist.',
        ]);
    }

    // 验证密码是否正确
    if (!Hash::check($request->password, $user->password)) {
        // 密码错误
        return back()->withErrors([
            'password' => 'The password you entered is incorrect.',
        ]);
    }

    // 用户认证成功，使用 Auth 登录
    Auth::login($user);

    // 防止会话固定攻击
    $request->session()->regenerate();

    // 重定向到目标页面
    return redirect()->intended(route('club.index'))->with('success', 'Login successful!');
}




    // public function logout(): RedirectResponse
    // {
    //     auth()->logout(); // 使用 Laravel 的 auth() 函数登出
    //     return redirect()->route('login.index'); // 注销后重定向到登录页面
    // }


    public function show(int $id)
    {
        $user = User::findOrFail($id); // 根据 ID 查找用户
        return view('users.show', compact('user')); // 返回包含用户信息的视图
    }

    public function edit(int $id)
    {
        $user = User::findOrFail($id); // 根据 ID 查找用户
        return view('users.edit', compact('user')); // 返回编辑用户的视图
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

    
}
