<?php

use App\Models\Result;
use App\Models\Student;
use App\Models\Subject;
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
        Schema::create('subject_marks', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Result::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Subject::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Student::class)->constrained()->cascadeOnDelete();
            $table->string('total_mark')->default('100');
            $table->string('obtained_mark');
            $table->enum('exam_type',['mid_term','final','test']);
            $table->enum('grade',['A','B','C','D','E','F']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject_marks');
    }
};
