<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    protected $fillable = ['user_id','job_title','description', 'address', 'website','skype','twitter','linkedin'];
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('mobile')->nullable();
            $table->string('professional_title')->nullable();
            $table->text('bio_overview')->nullable();
            $table->string('image')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('location')->nullable();
            $table->string('dob')->nullable();
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('slug');
            $table->timestamps();
            $table->softDeletes();
        });

        $users_detail = array(
            array('user_id' => 1, 'slug' => 'admin-admin'),

        );

        DB::table('user_details')->insert($users_detail);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_details');
    }
}
