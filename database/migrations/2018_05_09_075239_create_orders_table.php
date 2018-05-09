<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_code', 125)->comment('Mã đơn hàng');
            $table->string('tax_code', 125)->comment('Mã số thuế');
            $table->integer('package_id')->comment('Mã gói sản phẩm');
            $table->integer('provider_id')->comment('Mã nhà cung cấp');
            $table->integer('customer_id')->comment('Mã khách hàng');
            $table->integer('created_by')->comment('Người tạo');
            $table->integer('updated_by')->comment('Người cập nhật');
            $table->tinyInteger('status')->comment('Trạng thái');
            $table->softDeletes();
            $table->timestamps();

            $table->index(['id', 'create_by', 'customer_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
