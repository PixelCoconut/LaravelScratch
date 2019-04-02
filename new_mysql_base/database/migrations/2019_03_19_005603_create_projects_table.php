<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            
            $table->increments('id');
            
            //It was unsignedInteger before which didn't work because DB was having a hissy fit.
            $table->unsignedBigInteger('owner_id');
            
            $table->string('title');
            
            $table->string('name');
            
            $table->text('description');
            
            $table->timestamps();
            
            
            //Delete all the users projects
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
