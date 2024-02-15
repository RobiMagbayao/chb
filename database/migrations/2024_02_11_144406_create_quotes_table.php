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
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade'); 
            $table->dateTime('quote_date')->nullable();
            $table->string('service_type');
            $table->string('property_address');
            $table->string('type_of_roof')->nullable();
            $table->string('gutter_size')->nullable();
            $table->string('gutter_length')->nullable();
            $table->string('with_gutter_guard')->nullable();
            $table->string('window_qty')->nullable();
            $table->string('solar_qty')->nullable();
            $table->string('with_algae')->nullable();
            $table->string('type_of_area')->nullable();
            $table->string('area_size')->nullable();
            $table->text('comment')->nullable();
            $table->string('photo')->nullable();
            $table->string('quote')->nullable();
            $table->string('status')->nullable();
            $table->string('with_personal_info')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotes');
    }
};
