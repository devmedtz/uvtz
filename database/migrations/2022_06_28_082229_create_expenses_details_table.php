<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('expenses_id');
            $table->date('date');
            $table->string('reference');
            $table->text('details')->nullable();
            $table->integer('amount');
            $table->foreign('expenses_id')->references('id')->on('expenses')->restrictOnDelete();
            $table->integer('status');
            $table->string('created_by');
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
        Schema::dropIfExists('expenses_details');
    }
}
