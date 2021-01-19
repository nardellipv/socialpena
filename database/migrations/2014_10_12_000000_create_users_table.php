<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name', 50);
            
            $table->string('nickname', 50)->nullable();
            $table->string('profile_number', 20)->nullable();
            $table->string('dni', 20)->nullable();
            $table->string('phone', 20)->nullable();
            $table->date('birth_date')->nullable();
            $table->string('number_member', 20)->nullable();
            $table->string('version', 10)->nullable();
            $table->enum('category', ['ADHERENTE', 'ACTIVO', 'COMISION', 'SIN CATEGORIA']);
            $table->string('photo')->nullable();
            // $table->string('header')->nullable();

            $table->string('email', 150)->nullable();
            $table->enum('status', ['ACTIVE', 'INACTIVE'])->default('INACTIVE');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
