<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePfeSessionsTable extends Migration
{
    public function up()
    {
        Schema::create('pfe_sessions', function (Blueprint $table) {
            $table->id();
            $table->year('year');
            $table->date('start_date');
            $table->date('end_date');
            $table->text('projects');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pfe_sessions');
    }
}
