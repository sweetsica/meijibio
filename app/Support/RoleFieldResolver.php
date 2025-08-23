<?php

namespace App\Support;

class RoleFieldResolver
{
    public static function forUser($user): array
    {
        $userRoles  = $user->getRoleNames();   // Spatie roles
        $roleFields = config('role_fields', []);

        return collect($userRoles)
            ->flatMap(fn ($role) => $roleFields[$role] ?? [])
            ->unique()
            ->values()
            ->all();
    }
}
