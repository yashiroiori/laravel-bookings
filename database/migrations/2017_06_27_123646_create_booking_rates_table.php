<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(config('rinvex.bookings.tables.rates'), function (Blueprint $table) {
            // Columns
            $table->increments('id');
            $table->morphs('bookable');
            $table->string('range');
            $table->string('range_from')->nullable();
            $table->string('range_to')->nullable();
            $table->string('base_cost')->nullable();
            $table->char('base_cost_modifier', 1)->nullable();
            $table->string('unit_cost')->nullable();
            $table->char('unit_cost_modifier', 1)->nullable();
            $table->smallInteger('priority')->unsigned()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(config('rinvex.bookings.tables.rates'));
    }
}
