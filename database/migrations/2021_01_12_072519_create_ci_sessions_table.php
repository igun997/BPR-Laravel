<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCiSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ci_sessions', function (Blueprint $table) {
            $table->string('id', 128)->primary();
            $table->string('ip_address', 45);
            $table->unsignedInteger('timestamp')->default(0)->index('timestamp');
            $table->text('data');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ci_sessions');
    }
}
