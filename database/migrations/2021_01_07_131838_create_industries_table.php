<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Industry;
use Illuminate\Support\Str;

class CreateIndustriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('industries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('industry_name');
            $table->mediumText('industry_description')->nullable();
            $table->string('industry_icon', 100)->nullable();
            $table->string('industry_slug', 200);
            $table->timestamps();
        });

        $industries = array(
            array('id' => '1', 'industry_name' => 'Agriculture'),
            array('id' => '2', 'industry_name' => 'Arts & Culture'),
            array('id' => '3', 'industry_name' => 'Automotive'),
            array('id' => '4', 'industry_name' => 'Financial Services'),
            array('id' => '5', 'industry_name' => 'Chemicals and Speciality Materials'),
            array('id' => '6', 'industry_name' => 'Construction & Engineering'),
            array('id' => '7', 'industry_name' => 'Consumer & Industrial Products'),
            array('id' => '8', 'industry_name' => 'Consumer Products'),
            array('id' => '9', 'industry_name' => 'Education & Training'),
            array('id' => '10', 'industry_name' => 'Energy & Resources'),
            array('id' => '11', 'industry_name' => 'Industrial Products and Services'),
            array('id' => '12', 'industry_name' => 'Insurance'),
            array('id' => '13', 'industry_name' => 'International Donor Organizations'),
            array('id' => '14', 'industry_name' => 'Investment Management'),
            array('id' => '15', 'industry_name' => 'Life Sciences & Health Care'),
            array('id' => '16', 'industry_name' => 'Minerals & Mining'),
            array('id' => '17', 'industry_name' => 'Oil & Gas'),
            array('id' => '18', 'industry_name' => 'Public Health and Social Services'),
            array('id' => '19', 'industry_name' => 'Public Sector'),
            array('id' => '20', 'industry_name' => 'Public Transportation'),
            array('id' => '21', 'industry_name' => 'Real Estate'),
            array('id' => '22', 'industry_name' => 'Retail, Wholesale and Distribution'),
            array('id' => '23', 'industry_name' => 'Security and Justice'),
            array('id' => '24', 'industry_name' => 'Shipping & Ports'),
            array('id' => '25', 'industry_name' => 'Technology, Media & Telecommunications'),
            array('id' => '26', 'industry_name' => 'Travel, Hospitality and Services'),
            array('id' => '27', 'industry_name' => 'Water'),
    
        );
    
                    
        foreach($industries as $industry){
            Industry::create([
                'industry_name' => $industry['industry_name'],
                'industry_slug' => Str::slug($industry['industry_name'], '-'),
            ]);
        }

    }


    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('industries');
    }
}
