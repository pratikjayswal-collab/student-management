<?php

use App\Models\Classes;
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
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'user_id')->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Classes::class,'class_id')->constrained()->cascadeOnDelete();
            $table->string('total_marks');
            $table->string('obtained_marks');
            $table->date('exam_date');
            $table->enum('exam_type',['mid_term','final','test','quiz']);
            $table->enum('grade',['A','B','C','D','E','F']);
            $table->enum('result_status',['pass','fail']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
