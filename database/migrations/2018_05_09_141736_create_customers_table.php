<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address', 255);
            $table->string('email', 255);
            $table->phone('phone', 255);
            $table->string('full_name', 255);
            $table->string('company_name', 255);
            $table->string('seri_number', 255);
            $table->string('delivery', 255);
            $table->longText('note');
            $table->string('status', 255);
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
        Schema::dropIfExists('customers');
    }
}
