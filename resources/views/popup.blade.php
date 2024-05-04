<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>특급주식정보</title>
    <script language="JavaScript">
        function setCookie(name, value, expiredays) {
            var date = new Date();
            date.setDate(date.getDate() + expiredays); //현재 날짜에 하루를 더함 24시간 ㅇㅇ 
            document.cookie = escape(name) + "=" + escape(value) + "; expires=" + date.toUTCString(); // popupYn 이 쿠키이름, value N , 유효기간
        }

        function closePopup() {
            if (document.getElementById("check").value) {
                setCookie("popupYN", "N", 1);
                self.close();
            } //24시간 열람 안하기를 선택하면 popupYN이라는 쿠키에 N이 들어가게됨 이 N으로 팝업을 막음 
        }
    </script>
</head>

<body>

    <p style="text-align:center; font-size: 30PX ; color: darkred"><b>
            특급 주식정보 받기
        </b></p>
    <a href="https://m.stock.naver.com/worldstock/stock/PLTR.K/total" target="_blank">
        <img src="/rise_popup.png" style="width:100%; margin-top:0px" />
    </a>
    <br>

    <input type="checkbox" id="check" onclick="closePopup();">

    <span style="text-align:right; font-size: larger">24시간 동안 다시 열람하지 않습니다.</span>


</body>

</html>