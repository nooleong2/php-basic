<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        #dis {
            margin-top: 30px;
            width: 300px;
        }
        #dis img {
            min-width: 100%;
        }
    </style>
</head>
<body>
    <form id="form" action="" method="POST" enctype="multipart/form-data">
        <!-- <input type="file" name="photo" id="photo"> --> <!-- 1개 --> 
        <input type="file" name="photo[]" id="photo" multiple> <!-- n개 -->
        <input type="button" value="전송" id="upload_btn">
    </form>
    <div id="dis"></div>

    <script>
        const upload_btn = document.querySelector("#upload_btn");

        upload_btn.addEventListener("click", () => {

            const form = document.querySelector("#form");
            const formData = new FormData(form);
            const xhr = new XMLHttpRequest();

            xhr.open("POST", "./51_ajax_image.php", true);
            xhr.send(formData); // 값 전달

            // 통신 후 작업
            xhr.onload = () => {
                if (xhr.status == 200) {
                    const data = JSON.parse(xhr.responseText); // 객체로 변경
                    const dis = document.querySelector("#dis"); // 태그 접근

                    if (data.result == "success") {
                        const imgs = data.img.split("|") // 해당 문자열 기준으로 짜름
                        if (data.img.indexOf("|") != -1) { // -1이 아니면 true 찾았다는 뜻
                            for (let img of imgs) {
                                dis.innerHTML += `<img src="${img}">`; // 문자열 이어 줘야 함
                            }
                        } else {
                            dis.innerHTML = `<img src="${data.img}">`;
                        }

                    }
                } else {
                    console.log(xhr.responseText);
                }
            }
        });
    </script>
</body>
</html>