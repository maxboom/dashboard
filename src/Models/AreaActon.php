<?php

namespace MaxBoom\Dashboard\Models;

use Illuminate\Database\Eloquent\Model;

class AreaActon extends Model
{
    protected $fillable = [
        'action',
        'name',
        'method',
        //'callback'
    ];

    public function area()
    {
        return $this->hasOne(
            \MaxBoom\Dashboard\Models\Area::class
        );
    }

    public function roles()
    {
        return $this->belongsToMany(
            \MaxBoom\Dashboard\Models\UserRole::class,
            config('dashboard.table_prefix') . 'area_actions2roles',
            'action_id',
            'role_id'
        )->withTimestamps();
    }

    public function __construct(array $attributes = [])
    {
        $this->table = config('dashboard.table_prefix') . 'area_actions';
        parent::__construct($attributes);
    }
}
