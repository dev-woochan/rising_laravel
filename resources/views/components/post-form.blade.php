<main class="container mx-auto bg-white rounded-lg p-6 mt-8 overflow-hidden shadow">
    <form action="{{route('post.store')}}" class="write_form"  enctype="multipart/form-data" id="write_form" method="POST" >
    @csrf

        <div class="form_wrap">
            <div class="flex flex-wrap mb-1">
                <div class="w-full md:w-1/2 pr-2 mb-1 md:mb-0">
                    <label for="titleInput" class="block">제목</label>
                    <input type="text" class="write_textarea border border-gray-500 rounded-md px-4 py-2 w-full" name="title" id="titleInput">
                </div>
                
            </div>

            <div class="flex flex-wrap mb-1">
                <div class="w-full md:w-1/3 pl-2 mb-1 md:mb-0">
                    <label for="stockInput" class="block">종목명</label>
                    <div class="flex pr-5" >
                        <input type="text" class="write_textarea border border-gray-300 rounded-l-md px-4 py-2 w-full" name="stock_name" id="stockInput" list="stocks" autocomplete="off">
                        <button type="button" id="searchStockPrice" class="bg-blue-500 text-white px-4 rounded-r-md">주가조회</button>
                    </div>
                    <datalist id="stocks">
                    </datalist>
                </div>
                <div class="w-full md:w-1/3 pr-2 mb-1 md:mb-0">
                    <label for="priceInput" class="block">현재가</label>
                    <input type="number" name="stock_price" id="priceInput" class="border border-gray-300 rounded-md px-4 py-2 w-full">
                </div>
                <div class="w-full md:w-1/2 pl-2">
                    <label for="datepicker" class="block">목표일</label>
                    <x-datepicker/>
                </div>
            </div>
            <div class="write_button_left mb-4">
                <button type="button" id="button_increase" class="button_select bg-blue-500 text-white px-4 py-2 rounded-md">오른다</button>
                <button type="button" id="button_decrease" class="button_select bg-blue-500 text-white px-4 py-2 rounded-md">내린다</button>
                <input type="hidden" name="rise_select" id="select">
            </div>
            <script src="{{asset("/js/selectbutton.js")}}"></script>

            <textarea class="main_text border border-gray-300 rounded-md px-4 py-2 w-full" name="editordata" id="summernote"></textarea>

            <div class="write_button_right mt-4">
                <button type="button" onclick="history.back(-1)" class="bg-gray-500 text-white px-4 py-2 rounded-md">취소</button>
                <input type="submit" id="submit" value="등록" class="bg-blue-500 text-white px-4 py-2 rounded-md">
            </div>
        </div>
        <script src="{{asset("/js/summernote.js")}}">
</script>
<script src="{{asset('/js/write_validate_check.js')}}"></script>

    </form>
</main>
