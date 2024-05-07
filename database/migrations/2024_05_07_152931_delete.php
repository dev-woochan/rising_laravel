<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        // 특정 테이블로 이동하여 열 삭제
        Schema::table('comments', function (Blueprint $table) {
            $table->dropColumn('parent_comment_id'); // 열 삭제
            $table->dropColumn('depth'); // 열 삭제
            $table->dropColumn('order_number'); // 열 삭제
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // 마이그레이션 롤백 시 다시 열을 추가할 경우를 고려하여 해당 작업을 down() 메서드에 기술할 수도 있습니다.
        Schema::table('comments', function (Blueprint $table) {
            $table->string('parent_comment_id'); // 열 다시 추가
        });
    }
};
