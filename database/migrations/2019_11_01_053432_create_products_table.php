<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_id');
            $table->integer('entry_price');//giá tiền nhập vào trên mỗi chiếc
            $table->integer('sale_percent');
            $table->integer('qty_total');//tổng số lượng hàng nhâp
            $table->integer('qty_sold');//tổng số lượng hàng bán ra
            $table->integer('total_price');//tổng số tiền nhập hàng về
            $table->integer('total_sold_price');//tổng số tiền hàng bán ra
            $table->integer('revenue');//doanh thu
            $table->string('source');
            $table->text('short_desc')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('products');
    }
}
