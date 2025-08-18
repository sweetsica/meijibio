<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use App\Models\User;

class StaticPageController extends Controller
{
     public function webhook(Request $request): JsonResponse
    {
        // Lấy tất cả dữ liệu gửi đến (bao gồm cả GET & POST)
        $data = $request->all();

        // Xử lý logic ở đây nếu cần, ví dụ log hoặc kiểm tra chữ ký...

        // Trả kết quả JSON
        return response()->json([
            'status' => 'success',
            'received_data' => $data,
        ]);
    }

    public function post_test(Request $request)
    {
        $data = $request->all();

        $response = Http::post(
            'https://sweetsica-n8n.onrender.com/webhook-test/137838fa-85e0-48d9-9df3-0118c1ef6538',
            $data
        );
        return $response->body();
    }

    //START TEST LOGIN FUNCTION
    public function testlogin(){
        return view('static.login-test');
    }
    public function checktestlogin(Request $request)
    {
        $username = $request->input('username');

        if ($username === 'admin') {
            $user = Auth::user() ?? \App\Models\User::first();

            if ($user) {
                Auth::login($user);
                $request->session()->regenerate();
                $user->syncRoles(['admin']);
                return redirect('/admin-only')->with('notice', 'Bạn đã đăng nhập với quyền Admin');
            }

        } elseif ($username === 'user') {
            $user = Auth::user() ?? \App\Models\User::first();

            if ($user) {
                Auth::login($user);
                $request->session()->regenerate();
                $user->syncRoles(['user']);
                return redirect('/admin-user')->with('notice', 'Bạn đã đăng nhập với quyền User');
            }
        }

        return back()->withErrors([
            'notice' => 'Không được truy cập',
        ]);
    }


    public function adminOnly()
    {
        $user = Auth::user();

        if (!$user || !$user->hasRole('admin')) {
            return view('static.login-test', [
                'notice' => 'Bạn không có quyền truy cập trang này!'
            ]);
        }

        return view('static.admin', [
            'notice' => null
        ]);
    }

    public function adminUser()
    {
        $user = Auth::user();
        $role = 'Chưa đăng nhập';

        if ($user) {
            $role = $user->roles->pluck('name')->implode(', ');
        }

        if (!$user || !($user->hasRole('admin') || $user->hasRole('user'))) {
            return view('static.user', [
                'notice' => 'Bạn không có quyền truy cập trang này!',
                'roleText' => $role
            ]);
        }

        return view('static.user', [
            'notice' => null,
            'roleText' => $role
        ]);
    }

    //END TEST LOGIN FUNCTION
}
