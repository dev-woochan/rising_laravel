<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('boards', function (Blueprint $table) {
            $table->id();
            $table->timestamps();//생성일 수정일 자동생성
            $table->timestamp('target_date');//목표일
            $table->string('title', 255);//제목
            $table->longText('content');//게시글
            $table->string('stock_name');//주식명
            $table->integer('stock_price');//입력된 가격
            $table->integer('likes'); //좋아요수 
            $table->integer('views');// 조회수 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boards');
    }
};
