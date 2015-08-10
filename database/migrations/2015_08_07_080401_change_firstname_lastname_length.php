<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeFirstnameLastnameLength extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
           $table->string('first_name', 255)->change(); 
           $table->string('last_name', 255)->change(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ($table) {
           $table->string('first_name', 50)->change(); 
           $table->string('last_name', 50)->change(); 
        });
    }
}
