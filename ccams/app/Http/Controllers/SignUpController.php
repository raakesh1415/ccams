<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SignUpController extends Controller
{
    public function store(Request $request)
    {
        // 验证传入的数据
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'ic' => 'required|string|max:255',
            'year' => 'required|string|max:4',
            'level' => 'required|string|max:50',
            'month' => 'required|string',
            'day' => 'required|integer|min:1|max:31',
            'birth_year' => 'required|integer',
        ]);

        // 创建新用户
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']); // 加密密码
        $user->ic = $validatedData['ic'];
        $user->year = $validatedData['year'];
        $user->level = $validatedData['level'];
        $user->dob = $validatedData['birth_year'] . '-' . $this->getMonthNumber($validatedData['month']) . '-' . $validatedData['day']; // 组合出生日期
        $user->save();

        // 注册成功后重定向
        return redirect()->route('login.index')->with('success', '注册成功！');
    }

    private function getMonthNumber($month)
    {
        $months = [
            'January' => '01', 'February' => '02', 'March' => '03', 'April' => '04',
            'May' => '05', 'June' => '06', 'July' => '07', 'August' => '08',
            'September' => '09', 'October' => '10', 'November' => '11', 'December' => '12'
        ];
        return $months[$month] ?? '01'; // 默认返回 01
    }
}
