<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->unsignedBigInteger('position_id')->nullable();
            $table->string('photo');

            $table->timestamps();

            $table->index('position_id', 'users_position_idx');
            $table->foreign('position_id', 'users_position_fk')->on('positions')->references('id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
