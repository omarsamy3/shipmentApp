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
        Schema::create('journal_entities', function (Blueprint $table) {
            $table->id();
            $table->unsignedDecimal('amount', $precision = 8, $scale = 2);
            $table->enum('type', ['Debit Cash', 'Credit Revenue', 'Credit Payable'])->default('Debit Cash');
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
        Schema::dropIfExists('journal_entities');
    }
};
