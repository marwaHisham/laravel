<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('First_name');
            $table->string('Last_name');
            $table->string('Status');
            $table->string('img');
            $table->text('Job');
            $table->string('Location');
            $table->string('User_id');
            $table->timestamps();
        });
    }

    public function user(){
        return $this->belongsto(User::class);
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
