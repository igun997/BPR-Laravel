<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowInstallmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrow_installments', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('amount');
            $table->integer('status');
            $table->string('recipt', 100)->nullable();
            $table->integer('borrow_id')->index('borrow_id');
            $table->date('deleted_at')->nullable();
            $table->date('updated_at')->nullable();
            $table->date('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrow_installments');
    }
}
