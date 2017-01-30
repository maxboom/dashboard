<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userModelClass = config('dashboard.user_model_class');

        $user = $userModelClass::create([
            'login' => 'admin',
            'name' => 'admin',
            'email' => 'admin@dashboard.io',
            'password' => bcrypt('admin')
        ]);

        $role = \MaxBoom\Dashboard\Models\UserRole::create([
            'ident' => 'admin',
            'caption' => 'Admins'
        ]);

        $role->users()->attach($user);

        $area = \MaxBoom\Dashboard\Models\Area::create([
            'caption' => 'Dashboard'
        ]);

        $action = $area->actions()->create([
            'action' => 'dashboard',
            //'callback' => 'function() { die("it`s work!"); }'
        ]);

        $role->actions()->attach($action);

        $userArea = \MaxBoom\Dashboard\Models\Area::create([
            'table' => 'user',
            'caption' => 'Users'
        ]);

        $indexAtion = $userArea->actions()->create([
            'name' => 'user.index',
        ]);

        $role->actions()->attach($indexAtion);

        $createAction = $userArea->actions()->create([
            'name' => 'user.create',
        ]);

        $role->actions()->attach($createAction);

        $storeAction = $userArea->actions()->create([
            'name' => 'user.store',
        ]);

        $role->actions()->attach($storeAction);

        $showAction = $userArea->actions()->create([
            'name' => 'user.show',
        ]);

        $role->actions()->attach($showAction);

        $editAction = $userArea->actions()->create([
            'name' => 'user.edit',
        ]);

        $role->actions()->attach($editAction);

        $updateAction = $userArea->actions()->create([
            'name' => 'user.update',
        ]);

        $role->actions()->attach($updateAction);

        $destroyAction = $userArea->actions()->create([
            'name' => 'user.destory',
        ]);

        $role->actions()->attach($destroyAction);

    }
}
