<?php
Route::group([
    'middleware' => ['web']
], function() {
    Route::group([
        'prefix' => config('dashboard.url_prefix'),
        'middleware' => \MaxBoom\Dashboard\Http\Middleware\AreaAccess::class
    ], function() {
        Route::any('/', function() {
            die('it works!');
        });
        Route::any('/non-dashboard', function() {
            die('it works!');
        });
        

        // resources
        // todo: to other route file

        if (\Schema::hasTable((new \MaxBoom\Dashboard\Models\Area())->getTable())) {
            foreach (\MaxBoom\Dashboard\Models\Area::whereNotNull('table')->get() as $area) {
                Route::resource(
                    $area->table,
                    \MaxBoom\Dashboard\Http\Controllers\ResourceController::class
                );
            }

        }

        // end resources
    });
});
