<?php

namespace MaxBoom\Dashboard\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use MaxBoom\Dashboard\Models\AreaActon;
use Request;


class AreaActionPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function before($user, $action)
    {
        $actionRoles = $action->roles;

        if ($actionRoles->isEmpty()) {
            return false;
        }

        return $user->roles()->whereIn(
            'role_id',
            $action->roles->pluck('id')
        )->first();
    }
}
