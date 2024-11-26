<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Solution;

class CreateSolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solutions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('solution_name');
            $table->mediumText('solution_description')->nullable();
            $table->string('solution_icon', 100)->nullable();
            $table->string('solution_slug', 200);
            $table->timestamps();
        });


        $solutions = array(
            array('id' => '1', 'solution_name' => 'Structures'),
            array('id' => '2', 'solution_name' => 'Building'),
            array('id' => '3', 'solution_name' => 'Storm Water'),
            array('id' => '4', 'solution_name' => 'Road Construction'),
            array('id' => '5', 'solution_name' => 'Bulk Water Reticulation'),
            array('id' => '6', 'solution_name' => 'Property Development'),
            array('id' => '7', 'solution_name' => 'Mechanical Work'),
            array('id' => '8', 'solution_name' => 'Training'),
            array('id' => '9', 'solution_name' => 'Maintenance and support'),
            array('id' => '10', 'solution_name' => 'Design'),

        );

        foreach($solutions as $solution){
            Solution::create([
                'solution_name' => $solution['solution_name'],
                'solution_slug' => $slug = Str::slug($solution['solution_name'], '-'),
            ]);
        }

        Schema::create('solutions_clients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('solution_id')->unsigned();
            $table->foreign('solution_id')->references('id')->on('solutions')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solutions_clients');
        Schema::dropIfExists('solutions');
    }
}
