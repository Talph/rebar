<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });

        $permissions = array(
            array('id' => '1', 'name' => 'Full permissions', 'slug' => 'full-permissions'),
            array('id' => '2', 'name' => 'Create user', 'slug' => 'create-user'),
            array('id' => '3', 'name' => 'Update user', 'slug' => 'update-user'),
            array('id' => '4', 'name' => 'Delete user', 'slug' => 'delete-user'),
            array('id' => '5', 'name' => 'View user', 'slug' => 'view-user'),
            array('id' => '6', 'name' => 'Create post', 'slug' => 'create-post'),
            array('id' => '7', 'name' => 'Update post', 'slug' => 'update-post'),
            array('id' => '8', 'name' => 'Delete post', 'slug' => 'delete-post'),
            array('id' => '9', 'name' => 'View post', 'slug' => 'view-post'),

        );

        DB::table('permissions')->insert($permissions);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
}
