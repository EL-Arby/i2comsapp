<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('registrations', function (Blueprint $table) {
            if (!Schema::hasColumn('registrations', 'user_id')) {
                $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            }
            if (!Schema::hasColumn('registrations', 'first_name')) {
                $table->string('first_name')->nullable();
            }
            if (!Schema::hasColumn('registrations', 'last_name')) {
                $table->string('last_name')->nullable();
            }
            if (!Schema::hasColumn('registrations', 'email')) {
                $table->string('email')->nullable();
            }
            if (!Schema::hasColumn('registrations', 'phone')) {
                $table->string('phone')->nullable();
            }
            if (!Schema::hasColumn('registrations', 'organization')) {
                $table->string('organization')->nullable();
            }
            if (!Schema::hasColumn('registrations', 'job_title')) {
                $table->string('job_title')->nullable();
            }
            if (!Schema::hasColumn('registrations', 'amount_paid')) {
                $table->decimal('amount_paid', 8, 2)->default(0);
            }
            if (!Schema::hasColumn('registrations', 'payment_method')) {
                $table->string('payment_method')->nullable();
            }
            if (!Schema::hasColumn('registrations', 'payment_proof')) {
                $table->string('payment_proof')->nullable();
            }
            if (!Schema::hasColumn('registrations', 'notes')) {
                $table->text('notes')->nullable();
            }
            if (!Schema::hasColumn('registrations', 'participant_type')) {
                $table->string('participant_type')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('registrations', function (Blueprint $table) {
            $table->dropColumn(['user_id', 'first_name', 'last_name', 'email', 'phone', 'organization', 'job_title', 'amount_paid', 'payment_method', 'payment_proof', 'notes', 'participant_type']);
        });
    }
};
