

//오른다 내린다 설정을 위한 코드 

// const date = document.getElementById('date');

// //현재 날짜 호출해서 date에 담음
// function getToday() {
//     var date = new Date();
//     var year = date.getFullYear();
//     var month = ("0" + (1 + date.getMonth())).slice(-2);
//     var day = ("0" + date.getDate()).slice(-2);

//     return year + "-" + month + "-" + day;
// }

// date.value = getToday();



//로드되었을때 데이터베이스 가져오기 
var stockList;

window.onload = function () { //window.onload는 창로드 이후의 동작을 수행
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState = 4 && xhr.status == 200) {
            stockList = JSON.parse(xhr.responseText);
        }
    };
    xhr.open("GET", "load_stockList.php", true);
    xhr.send();
}

const stockInput = document.getElementById("stockInput"); // 종목명 입력칸 
var stocks = document.getElementById("stocks");

stockInput.addEventListener("input", function () { //입력시에 값을받아서 필터된 주식리스트를 가져오는 함수 
    var inputValue = this.value.trim();
    setTimeout(() => {
        console.log("입력됨 " + inputValue);
        // 입력 값에 따라 필터링된 결과를 가져옴
        var filteredStocks = stockList.filter(function (stock) {
            return stock.toLowerCase().includes(inputValue.toLowerCase());
        });

        // 이 부분은 필요한 대로 화면에 표시하거나 다른 동작을 수행하면 됨
        var i = 0;
        while (i < 10) {

            var list = document.createElement('option');

            list.textContent = filteredStocks[i];

            stocks.appendChild(list);
            i++;
        }
    }, 800); //너무 많이생성되서 800ms후에 실행되도록 제한을둠 

});

stockInput.addEventListener("blur", function () {
    stocks.innerHTML = "";
}); //blur해제시 기존의 option 태그를 모두 삭제해줌 

const titleInput = document.getElementById("titleInput");
const priceInput = document.getElementById("priceInput");
const selectInput = document.getElementById("select");
const dateInput = document.getElementById("datepicker");
const contentInput = document.getElementById("summernote");


function writeCheck() { //예외처리를 위함 만약에 제목 종목 등 입력값이 제대로 안되어있을시 false 반환
    //onsubmit 으로 post 제출전 사용 예정
    console.log("확인 호출")
    console.log(stockList.value);
    if (titleInput.value.trim() == "") {
        alert('제목을입력해주세요');
        titleInput.focus();
        return false;
    } else if (stockList.value == "") {
        alert('종목명을 입력해주세요');
        stockInput.focus();
        return false;
    } else if (priceInput.value == "") {
        alert('현재가를 입력해주세요');
        priceInput.focus();
        return false;
    } else if (dateInput.value == "") {
        alert("목표일을 지정해주세요");
        dateInput.focus();
        return false;
    } else if (selectInput.value == "") {
        alert("오른다 내린다를 선택해주세요")
        return false;
    }
    else if (contentInput.value == "") {
        alert("내용을 입력해주세요");
        contentInput.focus();
        return false;
    } else if (!stockList || !stockList.includes(stockInput.value)) {
        alert("유효한 종목명을 입력해주세요");
        stockInput.focus();
        return false;
    } else {
        return true;
    }
}

const submit = document.getElementById('submit');

submit.addEventListener('click', function (event) {
    event.preventDefault(); // 기본 제출 동작을 막음
    summit();
});

// summit 함수 만들기
function summit() {
    if (writeCheck()) {

        let content = $('#summernote').summernote('code');

        const formData = new FormData(document.getElementById('write_form'));

        // 에디터 내부에 img, iframe 태그가 남아있는지 확인.
        const sommernoteWriteArea = document.getElementsByClassName("main_text")[0];
        const srcArray = [];
        // getElementsByTagName 가 반환하는 형태는 HTMLCollection 인데 실제 배열이 없어서 forEach() 가 없음..
        // 그래서 Array.from 로 array 로 만들어줌.
        const iframeTags = Array.from(sommernoteWriteArea.getElementsByTagName('iframe'));
        const imgsTags = Array.from(sommernoteWriteArea.getElementsByTagName('img'));

        // 람다 사용함. ( 공부해보시면 좋을것 같네요.. )
        iframeTags.forEach(iframe => {
            srcArray.push(iframe.src);
        });
        imgsTags.forEach(img => {
            srcArray.push(img.src);
        });

        const filesArrayLenght = filesArray.length;
        for (let i = 0; i < filesArrayLenght; i++) {
            const itrFile = filesArray[i];
            formData.append('files[]', itrFile);

            // 에디터 안에 주소가 쓰이고 있으면
            if (srcArray.includes(itrFile.name)) {

                console.log(itrFile.name);

                // 이유는 모르겠는데 서버에서 받는 파일 이름은 스키마나 baseUrl값이 없어져있었다.
                // 그래서 여기서 문자열을 변환해주도록 만들었다.
                const pathSplitArray = itrFile.name.split('/');
                content = content.replace(itrFile.name, pathSplitArray[pathSplitArray.length - 1]);

                // 왼쪽부터 (서버에서 받을때 사용할 파일 배열키, 파일)
                // 서버에서 항상 배열로 받을려면 키 뒤에 '[]' 필요.
            }
            // 이제 url 객체는 필요없으니까 메모리 해제
            URL.revokeObjectURL(itrFile.name);
        }

        formData.append("editordata", content);

        console.log(content);


        const httpRequest = new XMLHttpRequest();
        httpRequest.onreadystatechange = () => {
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                if (httpRequest.status === 200) {
                    console.log(httpRequest.response);
                    alert('등록완료');
                    location.href = "http://192.168.101.129/risingproject/board_koreaStock.php";
                } else {
                    alert("게시물 등록중 오류가 발생했습니다.");
                    submit.disabled = false;
                }
            }
        }
        httpRequest.open('post', 'insert.php', true);
        httpRequest.send(formData);


    }
}




// filesArray 는 서버로 전송하기 전에 임시로 uri들을 들고 있는 배열이다.
const filesArray = [];

// 드래그앤 드랍시 동작하는 코드
function setFiles(files) {
    const filesLenght = files.length;
    for (let i = 0; i < filesLenght; i++) {
        const file = files[i];
        if (file.type.match('image.*')) {
            // 임시 url 생성하는 부분
            const url = URL.createObjectURL(file);
            file.name = url;
            // filesArray 이름을 방금 받은 url 로 담아둔다. (나중에 서버로 파일 보낼때 필요)
            filesArray.push(new File([file], url, {
                type: file.type
            }));
            console.log("이미지삽입:" + url);
            // 에디터에 이미지 붙여넣기.
            $('#summernote').summernote('insertImage', url);


        } else if (file.type.match('video.*')) {
            // 임시 url 생성하는 부분
            const url = URL.createObjectURL(file);
            console.log(file.type);
            filesArray.push(new File([file], url, {
                type: file.type
            }));


            const videoIframe = document.createElement("iframe");
            videoIframe.src = url;
            videoIframe.width = "640px";
            videoIframe.height = "480px";
            videoIframe.frameBorder = "0";
            videoIframe.className = "note-video-clip";

            // 에디터에 영상 붙여넣기 note-editable 에 붙여넣으면 됌.
            const sommernoteWriteArea = document.getElementsByClassName("note-editable")[0];
            sommernoteWriteArea.appendChild(videoIframe);

            // 비디오나 이미지가 아니면
        } else {
            alert('지원하지 않는 파일 타입입니다.');
        }
    }
}


const stockPriceBtn = document.getElementById("searchStockPrice");
stockPriceBtn.addEventListener("click", function () {
    let stockName = document.getElementById('stockInput').value;
    let priceInput = document.getElementById("priceInput");
    let key = 'wJw%2BTdV9J5yrB4rM0HYG0YlhLtTtos5EoUBuqJwba%2FwmmwufGmUkKyoG4rS%2BQAYbycOaRarMU2fEckCLIH4wCA%3D%3D';
    let url = `https://apis.data.go.kr/1160100/service/GetStockSecuritiesInfoService/getStockPriceInfo?serviceKey=${key}&numOfRows=1&pageNo=1&resultType=json&itmsNm=${stockName}`;
    //공공데이터 센터에서 받아온 주가정보 조회 url GET으로 요청하고 json으로 반환해준다 형식은쿼리로 xml,json중에 선택가능 
    fetch(url).then(response => response.json())
        .then(
            data => {
                console.log(data);
                let price = 0;
                price = data.response.body.items.item[0]["clpr"];
                console.log(price);
                priceInput.value = price;
            }
        ).catch(error => {
            console.error("Error발생 :", error);
            throw error;
        })
});