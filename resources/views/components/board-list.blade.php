<div class="board_list">
    <table>
        <colgroup>
            <col style="width: 4%;">
            <col style="width: 8%;">
            <col style="width: 20%;">
            <col style="width: 8%;">
            <col style="width: 8%;">
            <col style="width: 6%;">
            <col style="width: 2%;">
            <col style="width: 2%;">
        </colgroup>
        <thead>
            <tr class="bg-gray-100 hover:bg-gray-200">
                <th scope="col" class="text-center">번호</th>
                <th scope="col" class="text-center">종목명</th>
                <th scope="col"class="text-center">제목</th>
                <th scope="col"class="text-center">글쓴이</th>
                <th scope="col"class="text-center">작성일</th>
                <th scope="col"class="text-center">오를까?</th>
                <th scope="col"class="text-center">조회</th>
                <th scope="col"class="text-center">공감</th>
            </tr>
        </thead>
        <tbody>
            {{ $slot }}
        </tbody>
    </table>
</div>
