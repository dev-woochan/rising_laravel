<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    protected $table = 'boards'; //자동으로 생성되긴함 
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'created_at', 'updated_at', 'target_date', 'content', 'stock_name', 'stock_price', 'likes', 'views', 'rise_select'];
    protected $attributes = [ //attributes는 기본값지정이다 이런식으로하면 likes views를 생성시 자동으로 0이 저장됨 
        'likes' => 0,
        'views' => 0,
    ];

}
