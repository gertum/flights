<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('flights', function (Blueprint $table) {
            $table->foreign('source_port', 'fk_source_port')->references('code')->on('ports');
            $table->foreign('destination_port', 'fk_destination_port')->references('code')->on('ports');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('flights', function (Blueprint $table) {
            $table->dropForeign('fk_source_port');
            $table->dropForeign('fk_destination_port');
        });
    }
};
