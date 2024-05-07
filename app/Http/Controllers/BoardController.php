<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;
use App\Http\Auth;
use Illuminate\Foundation\Http\FormRequest;
use Validator;


class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //boards 테이블에서 데이터를 최신순으로 10개씩 불러오기
        $boards = Board::latest()->paginate((10));
        return view("board-korea", compact('boards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('writepost');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $user_id = \Auth::id();
        $board = new Board;
        $board->user_id = $user_id;
        $board->title = $requestData['title'];
        $board->stock_name = $requestData['stock_name'];
        $board->stock_price = $requestData['stock_price'];
        $board->rise_select = $requestData['rise_select'];
        $board->target_date = $requestData['target_date'];
        $board->content = $requestData['editordata'];

        $board->save();


        return redirect()->route('board-korea.index')->with('success', '게시글이 성공적으로 저장되었습니다.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Board $board)
    {
        $id = $board->id;
        $user_id = $board->user_id;
        $user = $board->user;
        $board = Board::find($id);
        return view('Board_Show', compact('board', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Board $board)
    {
        $id = $board->id;
        $user_id = $board->user_id;
        $user = $board->user;
        $board = Board::find($id);
        return view('Board_Edit', compact('board', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Board $board)
    {

        $requestData = $request->all();
        $board_id = $requestData['board_id'];
        $board = Board::find($board_id);
        $board->title = $requestData['title'];
        $board->stock_name = $requestData['stock_name'];
        $board->stock_price = $requestData['stock_price'];
        $board->rise_select = $requestData['rise_select'];
        $board->target_date = $requestData['target_date'];
        $board->content = $requestData['editordata'];
        $board->save();
        $user = $board->user;


        return view('Board_Show', compact('board', 'user'))->with('success', '게시글이 성공적으로 수정 되었습니다.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Board $board)
    {
        Board::find(($board->id))->delete();

        return redirect()->route('board-korea.index')->with('success', '삭제되었습니다.');
    }
}
