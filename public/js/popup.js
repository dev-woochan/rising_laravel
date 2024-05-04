
     function getCookie(name) {
         var cookie = document.cookie; //cookie라는 변수에 쿠키 전체값 넣기 (배열로반환됨 key=value; key2=value2; 요론식)
         if (document.cookie != "") { // 쿠키가 있는경우
             var cookie_array = cookie.split("; "); // ; 가 구분자이기때문에 key=value로 된 배열을 얻기위해 split 해준다
             for (var i = 0; i < cookie_array.length; i++) { //spilit한 것을 순회
                 var cookie_name = cookie_array[i].split("=");
                 if (cookie_name[0] == "popupYN") {
                     return cookie_name[1];
                 }
             }
         }
         return undefined;
     }
     function openPopup(url) {
         var cookieCheck = getCookie("popupYN"); //쿠키를 받아와서 24시간 열람 x 를 체크했다면 N이 들어가있으므로 팝업이 열리지 않음 
         if (cookieCheck != "N") window.open(url, '', 'width=400,height=520,left=0,top=0')
     }
