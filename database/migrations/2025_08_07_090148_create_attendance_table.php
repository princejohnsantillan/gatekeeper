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
        Schema::create('attendance', function (Blueprint $table) {
            $table->id();
            $table->foreignId('child_id')->constrained()->cascadeOnDelete();
            $table->foreignId('service_id')->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('checked_in_by');
            $table->timestamp('checked_in_at');
            $table->unsignedBigInteger('checked_out_by')->nullable();
            $table->timestamp('checked_out_at')->nullable();
            $table->unsignedBigInteger('entered_by'); // Staff or admin user
            $table->unsignedBigInteger('exited_by')->nullable(); // Staff or admin user
            $table->timestamps();

            $table->foreign('checked_in_by')->references('id')->on('guardians')->cascadeOnDelete();
            $table->foreign('checked_out_by')->references('id')->on('guardians')->cascadeOnDelete();
            $table->foreign('entered_by')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('exited_by')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendee');
    }
};
