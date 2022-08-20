<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreorderProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preorder_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('preorder_id')->constrained('preorders');
            $table->foreignId('product_id')->constrained('products');
            $table->string('symbol');
            $table->string('color');
            $table->string('size');
            $table->json('symbol_pos');
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
        Schema::dropIfExists('preorder_product');
    }
}
