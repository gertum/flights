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
        Schema::table('flights', function (Blueprint $table) {
            $table -> dateTime("specified_departure_time")->nullable(true);
            $table -> dateTime("specified_arrival_time")->nullable(true);
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('flights', function (Blueprint $table) {
            $table->dropColumn("specified_departure_time");
            $table->dropColumn("specified_arrival_time");
            //
        });
    }
};
