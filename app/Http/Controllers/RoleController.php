<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


class RoleController extends Controller
{
    // Danh sách role
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    // Form tạo role
    public function create()
    {
        return view('roles.create');
    }

    // Lưu role mới
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);

        Role::create(['name' => $request->name]);

        return redirect()->route('roles.index')->with('success', 'Tạo role thành công');
    }

    // Xóa role
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Xóa role thành công');
    }

}
