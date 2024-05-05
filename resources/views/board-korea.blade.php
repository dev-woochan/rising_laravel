<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('국내주식 게시판') }}
        </h2>
    </x-slot>
    <div class="container mx-auto w-3/5 mt-8">
    <div class="flex justify-between items-center mb-4 ">
            <div class="left_option">
                <form action="board_koreaStock.php" method="get" class="flex">
                    <input type="text" placeholder="종목명 검색" name="searchStock" class="border border-gray-300 px-2 py-1 rounded-md mr-2">
                    <input type="submit" value="검색" class="bg-blue-500 text-white px-4 py-1 rounded-md">
                </form>
            </div>
            <div class="right_option">
                <a href="{{route('boards.create')}}">
                    <button class="bg-blue-500 text-white px-4 py-1 rounded-md">글쓰기</button>
                </a>
            </div>
    </div>
    <section class="max-w-7xl mx-auto sm:px-6 lg:px-8 pb-12">
    <section class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
        <div class="p-6 bg-red-400 border-b border-gray-200 "><a class="font-bold text-lg" :href="route('home')">국내주식 게시판</a></div>
        <x-board-list>
        
        {{-- 반복문 --}}
        @foreach($boards as $key => $board)
            <tr>
            @php
    $id = $board->id;
    $user = $board->user;
    $user_name = $user->name;
         @endphp
                <td class="border px-4 py-2 text-center">{{$id}}</td>
                <td class="border px-4 py-2 text-center" ><a href="#" class="stockLink" target="_blank">{{$board->stock_name}}</a></td>
                <td class="border px-4 py-2 text-center"><a href="/boards/{{$id}}">{{$board->title}}</a></td>
                <td class="border px-4 py-2 text-center">{{$user_name}}</td>
                <td class="border px-4 py-2 text-center">{{$board->created_at}}</td>
                <td class="border px-4 py-2 text-center">{{$board->rise_select}}</td>
                <td class="border px-4 py-2 text-center">{{$board->views}}</td>
                <td class="border px-4 py-2 text-center">{{$board->likes}}</td>
            </tr>
            
        @endforeach
        </x-board-list>
    </section>
</section>


</div>

</x-app-layout>
