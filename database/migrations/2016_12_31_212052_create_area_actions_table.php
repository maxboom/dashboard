<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('dashboard.table_prefix') . 'area_actions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('area_id')->unsigned();
            $table->string('action')->nullable()->unique();
            $table->string('name')->nullable()->unique();
            $table->string('method')->nullable()->default(null);
            //$table->string('callback')->nullable();
            $table->timestamps();

            $table->foreign('area_id')
                  ->references('id')->on(config('dashboard.table_prefix') . 'areas')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists(config('dashboard.table_prefix') . 'area_actions');
        Schema::enableForeignKeyConstraints();
    }
}
