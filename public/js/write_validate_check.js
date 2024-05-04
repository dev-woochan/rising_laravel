document.getElementById("write_form").addEventListener("submit", function(event) {
    var titleInput = document.getElementById("titleInput");
    var stockInput = document.getElementById("stockInput");
    var priceInput = document.getElementById("priceInput");
    var dateInput = document.getElementById("dateInput");
    var selectInput = document.getElementById("selectInput");
    var contentInput = document.getElementById("contentInput");

    if (titleInput.value.trim() == "") {
        alert('제목을 입력해주세요');
        titleInput.focus();
        event.preventDefault(); // 폼 제출 막기
        return false;
    } else if (stockInput.value == "") {
        alert('종목명을 입력해주세요');
        stockInput.focus();
        event.preventDefault(); // 폼 제출 막기
        return false;
    } else if (priceInput.value == "") {
        alert('현재가를 입력해주세요');
        priceInput.focus();
        event.preventDefault(); // 폼 제출 막기
        return false;
    } else if (dateInput.value == "") {
        alert("목표일을 지정해주세요");
        dateInput.focus();
        event.preventDefault(); // 폼 제출 막기
        return false;
    } else if (selectInput.value == "") {
        alert("오른다 내린다를 선택해주세요");
        event.preventDefault(); // 폼 제출 막기
        return false;
    } else if (contentInput.value == "") {
        alert("내용을 입력해주세요");
        contentInput.focus();
        event.preventDefault(); // 폼 제출 막기
        return false;
    }
});