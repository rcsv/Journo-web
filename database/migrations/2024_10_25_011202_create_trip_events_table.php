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
        Schema::create('trip_events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trip_id')->constrained('trips')->onDelete('cascade'); // trip_id は外部キーとして設定
            $table->string('title');
            $table->enum('event_type', ['transportation', 'stay', 'activity', 'sightseeing'])->default('activity'); // イベントの種類
            $table->text('description')->nullable(); // 概要説明は任意
            $table->date('start_time') ;
            $table->date('end_time')->nullable();      // 終了時間は任意
            $table->decimal('expense', 10, 2)->nullable();  // 費用は10桁まで。小数点以下2桁
            $table->string('point_of_departure')->nullable();// 出発地点
            $table->string('point_of_arrival')->nullable(); // 到着地点 まぁ任意。
            $table->string('transportation_mode')->nullable();// 移動手段は任意
            $table->integer('priority')->nullable();
            $table->timestamps(); // created_at, and updated_up installed.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trip_events');
    }
};
