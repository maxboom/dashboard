<?php

namespace MaxBoom\Dashboard\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = [
        'table',
        'caption'
    ];

    public function actions()
    {
        return $this->hasMany(
            \MaxBoom\Dashboard\Models\AreaActon::class
        );
    }

    public function __construct(array $attributes = [])
    {
        $this->table = config('dashboard.table_prefix') . 'areas';
        parent::__construct($attributes);
    }
}
