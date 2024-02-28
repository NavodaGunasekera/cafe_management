<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('first_name',50)->index();
            $table->string('last_name',50);
            $table->string('contact',20)->index();
            $table->string('email',160)->index();
            $table->tinyInteger('gender')->comment('male => 0, female => 1');
            $table->date('dob');
            $table->string('street_no',10);
            $table->string('street_address',255);
            $table->string('city',100)->index();
            $table->tinyInteger('status')->comment('inactive => 0, active => 1')->index();
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
        Schema::dropIfExists('clients');
    }
};
