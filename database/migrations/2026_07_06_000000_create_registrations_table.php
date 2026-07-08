<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('registrations')) {
            return;
        }

        Schema::create('registrations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->timestamp('registration_date')->nullable();

            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->index();
            $table->string('phone')->nullable();

            $table->string('organization');
            $table->string('job_title')->nullable();

            $table->enum('registration_type', [
                'author',
                'attendee',
                'workshop',
            ])->default('attendee');

            $table->foreignId('workshop_id')
                ->nullable()
                ->constrained('workshops')
                ->nullOnDelete();

            $table->enum('participant_type', [
                'student',
                'non_student',
            ])->nullable();

            $table->decimal('amount_paid', 10, 2)->default(0);
            $table->boolean('payment_received')->default(false);
            $table->string('payment_method')->nullable();
            $table->string('payment_proof')->nullable();

            $table->text('notes')->nullable();
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
