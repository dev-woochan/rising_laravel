<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    /**
     * 이 게시물을 작성한 사용자를 가져옵니다.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    } //user와의 관계지정 Board는 User에 속하게된다.

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    protected $table = 'boards'; //테이블과연결될 이름 지정
    protected $primaryKey = 'id'; //pk 설정 
    protected $fillable = ['title', 'created_at', 'updated_at', 'target_date', 'content', 'stock_name', 'stock_price', 'likes', 'views', 'rise_select'];
    //fillable은 대량할당 가능 콜럼을 정해준다. 원하지않는 데이터가 다수들어오는걸 막기위함이란다. 라라벨에서는 기본적으로 차단으로 설정되어있어서 입력할 데이터는 추가해줘야한다.
    protected $attributes = [ //attributes는 기본값지정이다 이런식으로하면 likes views를 생성시 자동으로 0이 저장됨 
        'likes' => 0,
        'views' => 0,
    ];

}
