<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name',20);
            $table->char('desc');
            $table->string('sku');
            $table->string('category');
            $table->decimal('price', 5, 2);
            $table->bigInteger('discount_id')->unsigned();
            $table->date('created_at')->timestamps()->nullable();
            $table->date('modified_at')->timestamps()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
