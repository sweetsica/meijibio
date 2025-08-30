<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthenticateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('authenticator.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function logincheck(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = $request->username;
        $password = $request->password;

        // Trường hợp đặc biệt: admin cứng
        if ($username === 'admin@meijibio.com' && $password === '123456!') {
            try{
                $admin = User::where('email', 'phamnam2211@gmail.com')->first();

                auth()->login($admin);

                // return view('dashboard.admincrm');
                return redirect()->route('dashboard.admincrm'); // nếu route có name = dashboard

            } catch (\Exception $e) {
                dd($e);
                return redirect()->route('login')->with('error', 'Invalid username or password');
            }
        }

        // Check trong bảng users (username/email/số điện thoại)
        $user = User::where('email', $username)
            ->orWhere('username', $username)
            ->orWhere('phone', $username)
            ->first();

        if ($user && Hash::check($password, $user->password)) {
            // Có thể set session cho user nếu cần
            // --- Login user ---
            auth()->login($user);

            // --- Gán role Spatie dựa trên trường 'role' trong DB ---
            if (!empty($user->role)) {
                // Remove tất cả role cũ nếu có
                $user->syncRoles([$user->role]);
            }
            // dd(auth()->user()->getfly_id);

            // return view('dashboard.crm');
            return redirect()->route('dashboard.crm');
        }

        return redirect()->route('login')->with('error', 'Invalid username or password');
    }

}
