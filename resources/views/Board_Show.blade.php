<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('글 보기') }}
        </h2>
    </x-slot>
    <div class="articleContentBox bg-white p-6 rounded-lg shadow-lg min-h-screen m-3">
    <div class="article_header">
        <div class="header_top flex justify-between items-center">
            <a href="#" class="link_board text-blue-500">국내주식 게시판</a>
            <div class="flex space-x-2">
                <button class="btn-update bg-green-500 text-white px-3 py-2 rounded-lg">수정</button>
                <button class="btn-delete bg-red-500 text-white px-3 py-2 rounded-lg">삭제</button>
            </div>
        </div>
    </div>
    <div class="header_mid mt-2">
        <input id="board_id" type="hidden" value="{{$board->id}}">
        <div class="article_title text-xl font-bold">{{$board->title}}</div>
        <div class="article_info flex flex-column mt-2 text-sm">
            <div class="article_writer">작성자: {{$user->name}}</div>
            <div class="article_date">{{$board->created_at}} </div>
        </div>
    </div>
    <div class="border-t-2 mt-2"></div>

    <div class="article_stock flex justify-between mt-2">
        <div class="article_stock_name">종목명: {{$board->stock_name}}</div>
        <div class="article_stock_rise bg-red-600 p-2 rounded-lg shadow-lg text-white">오른다</div>
    </div>
    <div class="article_stock flex justify-between mt-2">
        <div class="article_stock_price">작성일가격: {{$board->stock_price}} 원</div>
        <div class="article_stock_targetDate">목표일: {{$board->target_date}}</div>
    </div>
        <div class="border-2 mt-3 min-h-60">{!! $board->content !!}</div>

        <div class="like align-center mt-3 flex items-center justify-center" >
            <button id="like_btn" src="{{asset('/like_btn.png')}}"><img id="btn_image" src="{{asset('/like_btn.png')}}"/> 
                <span id ="like_cnt">0</span>
            </button>
       </div>
       <script>
let like_btn = document.getElementById("like_btn");
let btn_image = document.getElementById("btn_image");
btn_image.addEventListener("mouseover", function() {
    btn_image.src = "/like_btn_hover.png";
});

btn_image.addEventListener("mouseout", function() {
    btn_image.src = "/like_btn.png";
});

like_btn.addEventListener("click", likeClick
);

async function likeClick() {
    //포스팅 id 가 필요함 
    let postId = '';
    let board_id = document.getElementById("board_id").value;
    let data = { 'board_id': board_id };

    try {
        const response = await fetch("likebtn.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(data),
        });
        const result = await response.json();
        if (result.valid == 'increase') {
            document.getElementById("like_cnt").innerText = parseInt(document.getElementById("like_cnt").innerText + 1);
            console.log('증가');
        } else if (result.valid == 'decrease') {
            document.getElementById("like_cnt").innerText = parseInt(document.getElementById("like_cnt").innerText - 1);
            console.log('감소');
        } else {
            alert("로그인을 해주세요");
        }
    } catch (error) {
        console.log("좋아요버튼 에러: " + error);
    }
}
       </script>
</div>





</x-app-layout>
