<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });

        $roles = array(
            array('id' => '1', 'name' => 'Admin', 'slug' => 'admin'),
            array('id' => '2', 'name' => 'Manager', 'slug' => 'manager'),
            array('id' => '3', 'name' => 'Editor', 'slug' => 'editor'),
            array('id' => '4', 'name' => 'user', 'slug' => 'user')

        );

        DB::table('roles')->insert($roles);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
