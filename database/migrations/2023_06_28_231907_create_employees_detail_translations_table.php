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
        Schema::create('employees_detail_translations', function (Blueprint $table) {
            $table->id();
            $table->text('about_me')->nullable();
            $table->text('hobbies')->nullable();
            $table->string('language', 100)->nullable()->default('Spanish');
            $table->foreignId('employee_id')->constrained('employees')
            ->onUpdate('cascade')
            ->onDelete('no action');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees_detail_translations');
    }
};
