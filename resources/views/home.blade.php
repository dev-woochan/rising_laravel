<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('홈') }}
        </h2>
    </x-slot>

    <div class="py-9">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex items-center justify-center">
                <div class="p-6 text-lg text-gray-900 font-semibold">
                    {{ __("주식 시장 동향") }}
                </div>
            </div>
        </div>
    </div>
    @include('components.section-stock')
    <section class="max-w-7xl mx-auto sm:px-6 lg:px-8 pb-12">
        <section class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
            <div class="p-6 bg-red-400 border-b border-gray-200 "><a class="font-bold text-lg text-black"
                    href="/board-korea">국내주식
                    게시판</a></div>
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
                                    <td class="border px-4 py-2 text-center"><a href="#" class="stockLink"
                                            target="_blank">{{$board->stock_name}}</a></td>
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
</x-app-layout>