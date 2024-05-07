<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    } //user와의 관계지정 Board는 User에 속하게된다.

    public function boards()
    {
        return $this->belongsTo(Board::class);
    } //user와의 관계지정 Board는 User에 속하게된다.

    protected $primaryKey = 'id'; //pk 설정 

    protected $fillable = ['content', 'board_id'];
}
