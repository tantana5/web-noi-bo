<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('provider_id')->comment('Nhà cung cấp');
            $table->string('name', 255)->comment('Tên sản phẩm');
            $table->integer('price');
            $table->integer('promotion')->comment('Giá khuyến mãi');
            $table->integer('vat')->comment('Thuế VAT');
            $table->longText('body')->comment('Mô tả');
            $table->tinyInteger('status')->comment('Trạng thái');

            $table->softDeletes();
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
        Schema::dropIfExists('packages');
    }
}
