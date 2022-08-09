<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_materials', function (Blueprint $table) {
            $table->id();
            $table->string('material_name');
            $table->string('material_unit');
            $table->integer('available_unit');
            $table->integer('total_unit'); #Total of all material to date
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
        Schema::dropIfExists('production_materials');
    }
}
