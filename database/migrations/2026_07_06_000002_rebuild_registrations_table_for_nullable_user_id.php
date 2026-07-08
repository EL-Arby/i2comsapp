<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('registrations')) {
            return;
        }

        if (DB::getDriverName() !== 'sqlite') {
            Schema::table('registrations', function (Blueprint $table) {
                $table->unsignedBigInteger('user_id')->nullable()->change();
            });

            return;
        }

        Schema::dropIfExists('registrations_new');

        DB::statement('CREATE TABLE registrations_new (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER NULL,
            registration_date DATETIME NULL,
            first_name VARCHAR(255) NULL,
            last_name VARCHAR(255) NULL,
            email VARCHAR(255) NULL,
            phone VARCHAR(255) NULL,
            organization VARCHAR(255) NULL,
            job_title VARCHAR(255) NULL,
            registration_type VARCHAR(255) NULL,
            participant_type VARCHAR(255) NULL,
            amount_paid NUMERIC(8,2) NOT NULL DEFAULT 0,
            payment_received TINYINT(1) NOT NULL DEFAULT 0,
            payment_method VARCHAR(255) NULL,
            payment_proof VARCHAR(255) NULL,
            notes TEXT NULL,
            is_active TINYINT(1) NOT NULL DEFAULT 1,
            created_at DATETIME NULL,
            updated_at DATETIME NULL
        )');

        DB::statement("INSERT INTO registrations_new (
            id, user_id, registration_date, first_name, last_name, email, phone, organization, job_title, registration_type, participant_type, amount_paid, payment_received, payment_method, payment_proof, notes, is_active, created_at, updated_at
        )
        SELECT
            id, user_id, registration_date, first_name, last_name, email, phone, organization, job_title, registration_type, participant_type, amount_paid, payment_received, payment_method, payment_proof, notes, is_active, created_at, updated_at
        FROM registrations");

        Schema::drop('registrations');
        Schema::rename('registrations_new', 'registrations');
    }

    public function down(): void
    {
        // no-op
    }
};
