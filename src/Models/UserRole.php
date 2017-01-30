<?php

namespace MaxBoom\Dashboard\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $fillable = [
        'ident',
        'caption'
    ];

    public function users()
    {
        return $this->belongsToMany(
            config('dashboard.user_model_class'),
            (new  \MaxBoom\Dashboard\Models\UserRole2User())->getTable(),
            'role_id',
            'user_id'
        )->withTimestamps();
    }

    public function actions()
    {
        return $this->belongsToMany(
            \MaxBoom\Dashboard\Models\AreaActon::class,
            config('dashboard.table_prefix') . 'area_actions2roles',
            //(new  \MaxBoom\Dashboard\Models\UserRole2User())->getTable(),
            'role_id',
            'action_id'
        )->withTimestamps();
    }
    
    public function __construct(array $attributes = [])
    {
        $this->table = config('dashboard.table_prefix') . 'user_roles';
        parent::__construct($attributes);
    }
}
