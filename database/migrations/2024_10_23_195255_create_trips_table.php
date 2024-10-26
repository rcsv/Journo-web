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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // User ID は外部キーとして設定
            $table->string('title');
            $table->string('destination')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->text('description')->nullable(); // 概要説明は任意
            $table->decimal('cost',10,2)->nullable(); // 費用は10桁まで、小数点以下2桁
            $table->string('image_path')->nullable(); // 画像パスは任意
            $table->integer('number_of_people')->nullable() ; // 参加人数は任意
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
