<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserRoleController extends Controller
{
    // Hiển thị form gán role
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();

        return view('users.edit-role', compact('user', 'roles'));
    }

    // Cập nhật role cho user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'roles' => 'required|array',
        ]);

        // Gán role (xóa role cũ, thêm role mới)
        $user->syncRoles($request->roles);

        return redirect()->route('users.index')->with('success', 'Cập nhật role thành công');
    }
}
