<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('nis')->unique()->nullable();
            $table->string('emp_id')->unique()->nullable();
            $table->string('name');
            $table->string('password');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('class')->nullable();
            $table->string('section')->nullable();
            $table->string('user_role')->default('user');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert(
            array(
            'name' => 'admin-service',
            'email' => 'admin@local',
            'section' => 'service',
            'user_role' => 'admin',
            'password' => $password = Hash::make('default')
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
