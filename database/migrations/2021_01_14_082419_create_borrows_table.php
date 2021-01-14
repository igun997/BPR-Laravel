<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrows', function (Blueprint $table) {
            $table->integer('id', true);
            $table->double('amount');
            $table->integer('status');
            $table->integer('interest')->nullable();
            $table->float('month_term', 10, 0)->nullable();
            $table->date('approved_date')->nullable();
            $table->date('declined_date')->nullable();
            $table->integer('product_id')->index('product_id');
            $table->integer('user_id')->index('user_id');
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
        Schema::dropIfExists('borrows');
    }
}
