<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_title');
            $table->string('product_address');
            $table->string('product_slug')->nullable();
            $table->integer('product_price');
            $table->float('product_acreage');
            $table->text('product_info');
            $table->text('product_img')->nullable();
            $table->boolean('product_fast')->default(0);
            $table->boolean('product_status')->default(0);
            $table->unsignedInteger('type_id');
            $table->foreign('type_id')->references('id')->on('type');
            $table->unsignedInteger('property_id');
            $table->foreign('property_id')->references('id')->on('property');
            $table->unsignedInteger('district_id');
            $table->foreign('district_id')->references('id')->on('district');
            $table->unsignedInteger('direction_id');
            $table->foreign('direction_id')->references('id')->on('direction');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->dateTime('deleted_at')->nullable();
            $table->string('lon')->default(1);
            $table->string('lat')->default(1);
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
        Schema::dropIfExists('product');
    }
}
