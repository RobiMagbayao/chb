<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->dateTime('quote_date');
            $table->string('service_type');
            $table->string('address');
            $table->string('type_of_roof')->nullable();
            $table->string('gutter_size')->nullable();
            $table->string('gutter_length')->nullable();
            $table->string('gutter_guard')->nullable();
            $table->unsignedInteger('window_qty')->nullable();
            $table->unsignedInteger('solar_qty')->nullable();
            $table->boolean('with_algae')->nullable();
            $table->string('type_of_area')->nullable();
            $table->unsignedInteger('area_size')->nullable();
            $table->string('photos')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->string('comments')->nullable();
            $table->string('status')->default('Pending');
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
