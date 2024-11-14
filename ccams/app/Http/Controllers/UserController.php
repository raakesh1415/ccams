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
    // 对请求进行验证
    $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    // 使用 Auth::attempt 进行用户认证
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        // 登录成功，重新生成 session ID 防止会话固定攻击
        $request->session()->regenerate();

        // 登录成功后重定向到用户原先尝试访问的页面，或默认重定向到 'assessment.index'
        return redirect()->intended(route('club.index'));
    }

    // 登录失败，返回并附带错误信息
    return back()->withErrors([
        'email' => 'These credentials do not match our records.',
    ]);
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
}
