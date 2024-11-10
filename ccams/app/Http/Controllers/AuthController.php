<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * 显示登录页面
     */
    public function showLoginForm()
    {
        return view('login'); // 返回 login.blade.php 视图
    }

    /**
     * 处理登录请求
     */
    public function login(Request $request)
    {
        // 验证用户输入
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:6',
        ]);

        // 查找用户
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // 登录用户
            Auth::login($user);

            // 登录成功后跳转到某个页面（比如首页）
            return redirect()->route('assessment.index');
        }

        // 登录失败，返回错误信息
        return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }

    /**
     * 处理注销请求
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.index'); // 注销后重定向到登录页面
    }
}
