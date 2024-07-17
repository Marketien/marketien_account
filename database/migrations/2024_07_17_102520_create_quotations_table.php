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
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->string('ref_no')->nullable();
            $table->date('date')->nullable();
            $table->string('ms')->nullable();
            $table->string('po_box')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('email')->nullable();
            $table->string('kind_attn')->nullable();
            $table->string('project_name')->nullable();
            $table->text('projects')->nullable();
            $table->text('conditon')->nullable();
            $table->text('total_amount')->nullable();
            $table->text('vat_amount')->nullable();
            $table->text('total_net_amount')->nullable();
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
        Schema::dropIfExists('quotations');
    }
};
