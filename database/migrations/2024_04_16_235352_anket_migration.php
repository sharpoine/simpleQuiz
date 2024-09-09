<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('anket', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->integer('approval')->nullable()->default(0)->comment('Approval trait ranging from -10 to 10');
            $table->integer('affection')->nullable()->default(0)->comment('Affection trait ranging from -10 to 10');
            $table->integer('success')->nullable()->default(0)->comment('Success trait ranging from -10 to 10');
            $table->integer('perfectionism')->nullable()->default(0)->comment('Perfectionism trait ranging from -10 to 10');
            $table->integer('righteousness')->nullable()->default(0)->comment('Righteousness trait ranging from -10 to 10');
            $table->integer('god_complex')->nullable()->default(0)->comment('God complex trait ranging from -10 to 10');
            $table->integer('autonomy')->nullable()->default(0)->comment('Autonomy trait ranging from -10 to 10');
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
        Schema::dropIfExists('anket');
    }
};
