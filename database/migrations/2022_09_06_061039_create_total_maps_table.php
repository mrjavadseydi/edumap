<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('total_maps', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\State::class)->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Book::class)->cascadeOnDelete();
            $table->string('month');
            $table->string('title');
            $table->text('body');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('total_maps');
    }
};
