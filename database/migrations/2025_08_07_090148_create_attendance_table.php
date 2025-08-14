<?php

use App\Models\Guardian;
use App\Models\User;
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
            $table->foreignId('service_id')->constrained()->cascadeOnDelete();
            $table->foreignId('child_id')->constrained()->cascadeOnDelete();

            $table->foreignIdFor(User::class, 'checkin_processed_by')->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Guardian::class, 'checked_in_by')->constrained()->cascadeOnDelete();
            $table->timestamp('checked_in_at');

            $table->foreignIdFor(User::class, 'checkout_processed_by')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Guardian::class, 'checked_out_by')->nullable()->constrained()->cascadeOnDelete();
            $table->timestamp('checked_out_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('attendance', function (Blueprint $table) {
            $table->dropForeign('attendance_service_id_foreign');
            $table->dropForeign('attendance_child_id_foreign');
            $table->dropForeign('attendance_checkin_processed_by_foreign');
            $table->dropForeign('attendance_checked_in_by_foreign');
            $table->dropForeign('attendance_checkout_processed_by_foreign');
            $table->dropForeign('attendance_checked_out_by_foreign');
        });

        Schema::dropIfExists('attendee');
    }
};
