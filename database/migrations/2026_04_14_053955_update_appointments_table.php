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
        Schema::table('appointments', function (Blueprint $table) {
            $table->time('start_time')->after('date');
            $table->time('end_time')->after('start_time');

             $table->string('status')->default('Pending');

             $table->dropColumn('time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('appointments', function (Blueprint $table) {

            $table->time('time');
            $table->dropColumn(['start_time', 'end_time', 'status']);

        });
    }
};
