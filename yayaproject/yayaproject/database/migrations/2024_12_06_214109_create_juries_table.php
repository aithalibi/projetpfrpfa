<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJuriesTable extends Migration
{
    public function up()
    {
        Schema::create('juries', function (Blueprint $table) {
            $table->id();
            $table->date('defense_date');
            $table->enum('role', ['encadrent', 'examinateur', 'rapporteur', 'president']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('juries');
    }
}
