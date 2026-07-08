<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('registrations', function (Blueprint $table) {
            if (! Schema::hasColumn('registrations', 'workshop_id')) {
                $table->foreignId('workshop_id')->nullable()->constrained('workshops')->nullOnDelete();
            }

            if (! Schema::hasColumn('registrations', 'participant_type')) {
                $table->string('participant_type')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('registrations', function (Blueprint $table) {
            if (Schema::hasColumn('registrations', 'workshop_id')) {
                $table->dropConstrainedForeignId('workshop_id');
            }

            if (Schema::hasColumn('registrations', 'participant_type')) {
                $table->dropColumn('participant_type');
            }
        });
    }
};
