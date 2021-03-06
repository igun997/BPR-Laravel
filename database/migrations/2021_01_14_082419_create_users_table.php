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
            $table->integer('id', true);
            $table->string('name', 100);
            $table->string('email', 100)->nullable();
            $table->string('username', 100);
            $table->string('password', 100);
            $table->text('alamat')->nullable();
            $table->string('no_hp', 100)->nullable();
            $table->integer('level');
            $table->string('ktp', 100)->nullable();
            $table->string('no_ktp', 100)->nullable()->unique('no_ktp');
            $table->integer('status');
            $table->string('no_rekening', 100)->nullable();
            $table->date('deleted_at')->nullable();
            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();
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
