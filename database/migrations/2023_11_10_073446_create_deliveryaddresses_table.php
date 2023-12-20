<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('deliveryaddresses', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('country');
            $table->string('address');
            $table->string('type');
            $table->string('city');
            $table->string('state');
            $table->string('postcode');
            $table->string('phone');
            $table->string('email');
            $table->string('note');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliveryaddresses');
    }
};
