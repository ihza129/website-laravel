<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class createproductstable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product name',58);
            $table->enum('product_type',['snack','drink','fruit','drug','groceries','make-up','cigarette']);
            $table->integer('product_price');
            $table->date('expired_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }

    public function up();
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('google_id')->nullable()->unique();
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('google_id');
    });
}

};
