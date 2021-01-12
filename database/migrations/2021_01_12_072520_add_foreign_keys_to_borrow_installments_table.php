<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToBorrowInstallmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('borrow_installments', function (Blueprint $table) {
            $table->foreign('borrow_id', 'borrow_installments_ibfk_1')->references('id')->on('borrows')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('borrow_installments', function (Blueprint $table) {
            $table->dropForeign('borrow_installments_ibfk_1');
        });
    }
}
