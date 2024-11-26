<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateRolesPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles_permissions', function (Blueprint $table) {
            $table->integer('role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('permission_id')->unsigned();
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade')->onUpdate('cascade');

            $table->primary(['role_id','permission_id']);
        });

        $roles_permissions = array(
            array('role_id' => 1, 'permission_id' => 1),
            array('role_id' => 2, 'permission_id' => 2),
            array('role_id' => 2, 'permission_id' => 3),
            array('role_id' => 2, 'permission_id' => 4),
            array('role_id' => 2, 'permission_id' => 5),
            array('role_id' => 2, 'permission_id' => 6),
            array('role_id' => 2, 'permission_id' => 7),
            array('role_id' => 2, 'permission_id' => 8),
            array('role_id' => 2, 'permission_id' => 9),
            array('role_id' => 3, 'permission_id' => 6),
            array('role_id' => 3, 'permission_id' => 7),
            array('role_id' => 3, 'permission_id' => 8),
            array('role_id' => 3, 'permission_id' => 9),
            array('role_id' => 4, 'permission_id' => 6),
            array('role_id' => 4, 'permission_id' => 9)
        );

        DB::table('roles_permissions')->insert($roles_permissions);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles_permissions');
    }
}
