<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('description')->default('Aucune description')->change();
            $table->string('title');
            $table->string('status');
            $table->date('correction_date')->nullable();
            $table->date('submission_date');
            $table->text('comments')->nullable()->after('status');
            $table->foreignId('student_id')->constrained('students');
            $table->foreignId('teacher_id')->constrained('teachers');
            $table->timestamps();
        });
    }

    public function down()
    {
        // Schema::dropIfExists('reports');
        Schema::table('reports', function (Blueprint $table) {
            $table->dropColumn('comments');
        });
        
    }
}
