<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/board-korea', function () {
    return view('board-korea');
})->middleware(['auth', 'verified'])->name('board-korea');

Route::get('/home', function () {
    return view('home');
})->name('home');
// ->middleware(['auth', 'verified'])

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/popup', function () {
    return view('popup');
})->name('popup.show');

Route::get('/board-korea', [BoardController::class, 'index'])->name('board-korea.index');

//해당 Route는 get타입으로 /boards 경로로 요청이 온다면, BoardController의 index 함수를 실행한다는 뜻입니다.
// 즉 처음 korea-board 화면접속시 실행 
//name(’boards.index’)는 라우트의 별칭으로 나중에 route(’boards.index’) 이런 식으로 주소 출력을 할 수 있습니다.

// Route::get(
//     '/writepost',
//     [BoardController::class, 'create']
// )->middleware(['auth', 'verified'])->name('writepost');

// Route::post('/post/store', [BoardController::class, 'store'])
//     ->middleware(['auth', 'verified'])
//     ->name('post.store');

// Route::get('/showpost', [BoardController::class, 'show'])
//     ->middleware(['auth', 'verified'])
//     ->name('showpost'); RESTful resources로 리펙토링함 

Route::resource('boards', BoardController::class);

Route::resource('comments', CommentController::class);

Route::post('/comments/update', [CommentController::class, 'update'])->name('comment.update');
Route::delete('/comments/delete', [CommentController::class, 'delete'])->name('comment.delete');


require __DIR__ . '/auth.php';


