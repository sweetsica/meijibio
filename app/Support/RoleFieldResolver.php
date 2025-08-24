<?php

namespace App\Support;

class RoleFieldResolver
{
    public static function forUser($user): array
    {
        $userRoles = $user->role;
        $roleFields = config('role_fields', []);

        if($userRoles == 'admin') {
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
