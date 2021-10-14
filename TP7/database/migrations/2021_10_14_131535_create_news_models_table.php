<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsModelsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('news_models', function (Blueprint $table) {
            $table->id();
            $table->string('Titre');
            $table->text('Contenu');
            $table->date('Date');
            $table->foreignId('user_id')->constrained('user_models');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('news_models');
    }
}
