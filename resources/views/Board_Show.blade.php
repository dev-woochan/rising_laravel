<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('글 보기') }}
        </h2>
    </x-slot>
    <div class="articleContentBox bg-white p-6 rounded-lg shadow-lg min-h-screen m-5">
        <div class="article_header">
            <div class="header_top flex justify-between items-center">
                <a href="#" class="link_board text-blue-500">국내주식 게시판</a>

                <div class="flex space-x-2">
                    @if (Auth::id() == $user->id)
                        <form action="/boards/{{$board->id}}/edit" method="GET">
                            <button type="submit"
                                class="btn-update bg-green-500 text-white px-3 py-2 rounded-lg">수정</button>
                        </form>
                        <form action="/boards/{{$board->id}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn-delete bg-red-500 text-white px-3 py-2 rounded-lg">삭제</button>
                        </form>
                    @endif
                </div>

            </div>
        </div>
        <div id="board_info" class="header_mid mt-2" data-id="{{$board->id}}">
            <div class="article_title text-xl font-bold">{{$board->title}}</div>
            <div class="article_info flex flex-column mt-2 text-sm">
                <div class="article_writer">작성자: {{$user->name}}</div>
                <div class="article_date">{{$board->created_at}} </div>
            </div>
        </div>
        <div class="border-t-2 mt-2"></div>

        <div class="article_stock flex justify-between mt-2">
            <div class="article_stock_name">종목명: {{$board->stock_name}}</div>
            <div id="rise_select" class="article_stock_rise bg-red-600 p-2 rounded-lg shadow-lg text-white">오른다</div>
        </div>
        <div class="article_stock flex justify-between mt-2">
            <div class="article_stock_price">작성일가격: {{$board->stock_price}} 원</div>
            <div class="article_stock_targetDate">목표일: {{$board->target_date}}</div>
        </div>
        <div class="border-2 mt-3 min-h-60">{!! $board->content !!}</div>

        <div class="like align-center mt-3 flex items-center justify-center">
            <button id="like_btn" src="{{asset('/like_btn.png')}}"><img class="h-10" id="btn_image"
                    src="{{asset('/like_btn.png')}}" />
                <span id="like_cnt">0</span>
            </button>
        </div>
        <div class="border-b-2 mt-2">댓글</div>
        <x-comment_container>
            <!-- 댓글시작 -->
            @foreach ($comments as $comment)
                <x-comment :comment="$comment" />
            @endforeach
            <!-- 댓글 끝 -->
        </x-comment_container>
        <!-- 댓글입력창  -->
        <div class=" mt-5"></div>
        <div class="comment_insert flex flex-column p-2 border-2 mt-2">
            <div class="comment_insert_name" id="login_name">
                <span class="font-bold">{{Auth::user()->name}}</span>
                <!-- <a  class="font-bold">로그인</a>을 해주세요 -->
            </div>
            <input type="text" id="comment_insert_content" placeholder="댓글을 입력해주세요" name="content"
                class="border-0 flex-grow border rounded-md p-2 ">
            <!-- 로그인중일 때 -->
            <div class="justify-end flex mt-1">
                <input type="button" value="등록" id="comment_btn" onclick="comment_insert()"
                    class="px-2 text-center py-2 bg-blue-500 text-white w-14 rounded-md cursor-pointer">
            </div>
        </div>
    </div>
    <script src="/js/comment.js"></script>
    <script src="/js/likebtn.js"></script>
    </div>







</x-app-layout>