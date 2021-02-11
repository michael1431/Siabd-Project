<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_no');
            $table->unsignedBigInteger('related_party_id')->nullable();
            $table->string('related_party_type')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->float('total_amount');
            $table->float('total_less')->nullable();
            $table->float('total_paid')->nullable();
            $table->float('total_balance')->nullable();
            $table->float('total_discount')->nullable();
            $table->float('total_makingcharge')->nullable();
            $table->string('payment_deadline')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('payment_trxid')->nullable();
            $table->string('event')->nullable();
            $table->string('note')->nullable();
            $table->string('ext1')->nullable();
            $table->string('extstring2')->nullable();
            $table->timestamps();
            //$table->foreign("supplier_id")->references('id')->on('suppliers');
            // $table->foreign("customer_id")->references('id')->on('customers');
            $table->foreign("user_id")->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
