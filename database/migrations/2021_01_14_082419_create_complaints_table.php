<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('complaint_type_id')->index('complaint_type_id');
            $table->integer('user_id')->index('user_id');
            $table->string('subject', 100);
            $table->text('content')->nullable();
            $table->integer('status');
            $table->date('created_at')->nullable();
            $table->date('deleted_at')->nullable();
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
        Schema::dropIfExists('complaints');
    }
}
