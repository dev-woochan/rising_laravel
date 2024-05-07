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