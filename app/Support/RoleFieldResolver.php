<?php

namespace App\Support;
use Illuminate\Support\Facades\Auth;

class RoleFieldResolver
{
    public static function forUser($user): array
    {
        $roleFields = config('role_fields', []);

        // Nếu chưa đăng nhập
        if (!$user) {
            Auth::logout();
            redirect()->route('login')->send();
        }

        $userRoles = $user->role;

        // Nếu user không có role
        if (!$userRoles || empty($roleFields)) {
            Auth::logout();
            redirect()->route('login')->send();
        }

        if ($userRoles == 'admin') {
            // return all fields from all roles in config/role_fields.php (remove duplicates)
            return array_unique(array_merge(...array_values($roleFields)));
        }

        return collect($userRoles)
            ->flatMap(fn ($role) => $roleFields[$role] ?? [])
            ->unique()
            ->values()
            ->all();
    }
}
