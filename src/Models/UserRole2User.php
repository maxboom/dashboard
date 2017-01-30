<?php

namespace MaxBoom\Dashboard\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole2User extends Model
{
    public function __construct(array $attributes = [])
    {
        $this->table = config('dashboard.table_prefix') . 'user_roles2users';
        parent::__construct($attributes);
    }
}
