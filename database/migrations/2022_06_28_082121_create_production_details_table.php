<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('production_id')->nullable()->unsigned()->constrained('production_materials')->nullOnDelete();
            $table->integer('action');
            $table->integer('qty');
            $table->text('material_note')->nullable();
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
        Schema::dropIfExists('production_details');
    }
}
