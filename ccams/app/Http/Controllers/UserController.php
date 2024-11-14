<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * 显示注册表单
     *
     * @return View
     */
    public function showSignupForm(): View
    {
        return view('login.signin'); // 假设您的注册视图文件是 signin.blade.php
    }

    /**
     * 显示登录表单
     *
     * @return View
     */
    public function showLoginForm(): View
    {
        return view('login.index'); // 返回登录视图 'login.index'
    }

    /**
     * 显示用户列表
     *
     * @return View
     */
    public function index(): View
    {
        $users = User::all(); // 获取所有用户
        return view('users.index', compact('users')); // 返回包含所有用户的视图
    }

    /**
     * 登录方法
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function login(Request $request)
    {
    $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string|min:6',
    ]);

    // 获取用户
    $user = User::where('email', $request->email)->first();

    if ($user && Hash::check($request->password, $user->password)) {
        auth()->login($user); // 确保这里只调用一次
        return redirect()->route('assessment.index');
    }

    return back()->withErrors(['email' => 'wrong eamil']);
    }

    /**
     * 注销方法
     *
     * @return RedirectResponse
     */
    // public function logout(): RedirectResponse
    // {
    //     auth()->logout(); // 使用 Laravel 的 auth() 函数登出
    //     return redirect()->route('login.index'); // 注销后重定向到登录页面
    // }

    /**
     * 显示创建用户的表单
     *
     * @return View
     */
    public function create(): View
    {
        return view('login.index'); // 返回创建用户视图
    }

    /**
     * 将新用户存储到数据库
     *
     * @param Request $request
     * @return RedirectResponse
     */
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

        // Create and save the user to the database
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'], // Hash the password
            'ic' => $validatedData['ic'],
            'role' => $validatedData['role'],
        ]);

        return redirect()->route('login.index')->with('success', 'Signin Successfully');
    }

//     public function store(Request $request)
// {
//     // Validate the incoming data
//     $validatedData = $request->validate([
//         'name' => 'required|string|max:255',
//         'email' => 'required|email|unique:users,email',
//         'password' => 'required|min:8|confirmed',  // 添加 confirmed 验证规则
//         'ic' => 'required|string|max:12',
//         'role' => 'required|string|in:student,teacher', // Ensure role is either student or teacher
//     ]);

//     // Create and save the user to the database
//     User::create([
//         'name' => $validatedData['name'],
//         'email' => $validatedData['email'],
//         'password' => Hash::make($validatedData['password']), // Hash the password
//         'ic' => $validatedData['ic'],
//         'role' => $validatedData['role'],
//     ]);

//     return redirect()->route('login.index')->with('success', 'Sign-in Successful');
// }
    // public function store(Request $request)
    // {
    //     // 验证传入的数据
    //     $validatedData = $request->validate([
    //         'name' => 'required|string|max:255',  // 姓名字段必须存在且不超过 255 个字符
    //         'email' => 'required|email|unique:users,email', // 确保邮箱唯一
    //         'password' => 'required|min:8|confirmed',  // 密码字段要求至少 8 个字符并且需要确认字段匹配
    //         'ic' => 'required|string|max:12',  // IC 字段要求为字符串，且最大 12 个字符
    //         'role' => 'required|string|in:student,teacher', // 确保角色是 "student" 或 "teacher"
    //     ]);

    //     // 创建并保存新用户到数据库
    //     User::create([
    //         'name' => $validatedData['name'],
    //         'email' => $validatedData['email'],
    //         'password' => Hash::make($validatedData['password']), // 在存储之前将密码进行哈希加密
    //         'ic' => $validatedData['ic'],
    //         'role' => $validatedData['role'],
    //     ]);

    //     // 成功后重定向到登录页面并显示成功消息
    //     return redirect()->route('login.index')->with('success', '注册成功');
    // }


    /**
     * 显示指定用户的信息
     *
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        $user = User::findOrFail($id); // 根据 ID 查找用户
        return view('users.show', compact('user')); // 返回包含用户信息的视图
    }

    /**
     * 显示编辑用户的表单
     *
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $user = User::findOrFail($id); // 根据 ID 查找用户
        return view('users.edit', compact('user')); // 返回编辑用户的视图
    }

    /**
     * 更新指定用户的信息
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
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

    /**
     * 从数据库删除指定用户
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $user = User::findOrFail($id); // 根据 ID 查找用户
        $user->delete(); // 从数据库删除用户

        return redirect()->route('users.index')->with('success', '用户删除成功');
    }
}
