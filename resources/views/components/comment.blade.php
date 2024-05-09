<li class="comment_list bg-white overflow-hidden rounded-lg border-2 p-3 mt-3" data-id="{{$comment->id}}">
    <div class="comment_top flex items-center">
        <div class="comment_name" style="font-weight: 700;">
            <span id="comment_name">{{\App\Models\User::find($comment->comment_user_id)->name}}</span>

        </div>
        <div class="buttons ml-auto">
            <button class="modify_comment bg-green-500 text-white rounded-lg" onclick="modify_comment(this)">수정</button>
            <button class="delete_comment bg-red-500 text-white rounded-lg" onclick="comment_delete(this)">삭제</button>
        </div>
    </div>
    <div class="comment_time text-xs">
        {{$comment->created_at}}
    </div>
    <div class="comment_bottom">
        <div class="comment_content mt-4 text-base">
            {{$comment->content}}
        </div>
    </div>
</li>