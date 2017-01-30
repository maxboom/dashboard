<?php

namespace MaxBoom\Dashboard\Models;

use App\User;

class DashboardUser extends User
{
    public function roles()
    {
        return $this->belongsToMany(
            \MaxBoom\Dashboard\Models\UserRole::class,
            (new \MaxBoom\Dashboard\Models\UserRole2User())->getTable(),
            'user_id',
            'role_id'
        );
    }

    public function __construct(array $attributes = [])
    {
        $this->table = (new User())->getTable();
        parent::__construct($attributes);
    }
}
