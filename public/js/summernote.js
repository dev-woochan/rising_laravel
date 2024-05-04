// 메인화면 페이지 로드 함수
$(document).ready(function () {
    $('#summernote').summernote({
        placeholder: '내용을 작성하세요',
        height: 300,
        maxHeight: 300,
        callbacks: {
            // 파일 업로드시 동작하는 코드
            // onImageUpload 이지만 비디오 드랍도 동작함.
            onImageUpload: function (files) {
                setFiles(files);
            },

            // 클립보드에 있는(윈도우 + 쉬프트 + s) 한 경우에 에디터에서 붙여넣기(컨트롤+v) 하는 경우
            // 섬머노트 기본 이미지 붙여넣기 기능을 막는 코드.
            // 없으면 이미지 2장씩 들어간다. ( 하나는 setFiles(file 형태) 로 하나는 base64(string 형태) 로 )
            onPaste: function (e) {
                const clipboardData = e.originalEvent.clipboardData;
                if (clipboardData && clipboardData.items && clipboardData.items.length) {
                    const item = clipboardData.items[0];
                    // 붙여넣는게 파일이고, 이미지면
                    if (item.kind === 'file' && item.type.indexOf('image/') !== -1) {
                        // 이벤트 막음
                        e.preventDefault();
                    }
                }
            }
        },
    });
});