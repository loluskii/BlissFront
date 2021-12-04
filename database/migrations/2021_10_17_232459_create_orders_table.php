<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('order_number');
            $table->unsignedBigInteger('user_id');
            $table->string('order_reference');
            $table->string('plan');
            $table->enum('status',['pending','completed','declined'])->default('pending');
            $table->float('subtotal');
            $table->float('grand_total');
            $table->integer('item_count');
            $table->boolean('is_paid')->default(false);
            $table->enum('payment_method',['payment_on_delivery','stripe', 'paystack'])->default('payment_on_delivery');
            $table->float('delivery_total');
            $table->string('shipping_fname');
            $table->string('shipping_lname');
            $table->string('shipping_address');
            $table->string('shipping_apartment_suite');
            $table->string('shipping_city');
            $table->string('shipping_state');
            $table->string('shipping_zipcode');
            $table->string('shipping_phone');
            $table->string('notes')->nullable();

            // $table->string('billing_fname')->nullable();
            // $table->string('billing_lname')->nullable();
            // $table->string('billing_address')->nullable();
            // $table->string('billing_apartment_suite')->nullable();
            // $table->string('billing_city')->nullable();
            // $table->string('billing_state')->nullable();
            // $table->string('billing_zipcode')->nullable();
            // $table->string('billing_phone')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('orders');
    }
}
