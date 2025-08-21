<?php

use App\Models\Student;
use App\Models\StudentParent;
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
        Schema::create('student_parent_pivots', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Student::class, 'student_id')->constrained()->cascadeOnDelete();
            $table->foreignIdFor(StudentParent::class, 'parent_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_parent_pivots');
    }
};
