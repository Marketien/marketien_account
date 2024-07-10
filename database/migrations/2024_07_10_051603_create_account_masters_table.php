<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_masters', function (Blueprint $table) {
            $table->id();
            $table->string('client_name')->nullable();
            $table->string('invoice_no')->nullable();
            $table->string('description')->nullable();
            $table->date('invoice_date')->nullable();
            $table->string('lpo')->nullable();
            $table->string('amount')->nullable();
            $table->string('credit')->nullable();
            $table->string('due')->nullable();
            $table->string('remark')->nullable();
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
        Schema::dropIfExists('account_masters');
    }
};
