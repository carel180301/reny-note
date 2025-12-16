<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('piutangs', function (Blueprint $table) {
            $table->timestamp('green_sent_at')->nullable();
            $table->timestamp('yellow_sent_at')->nullable();
            $table->timestamp('red_sent_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('piutangs', function (Blueprint $table) {
            $table->dropColumn([
                'green_sent_at',
                'yellow_sent_at',
                'red_sent_at',
            ]);
        });
    }
};
