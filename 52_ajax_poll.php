<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- 간단한 투표 포로그램 -->
    <div id="poll">
        <h1>간단한 YES/NO 투표 프로그램</h1>
        <form action="">
            YES: <input type="radio" name="vote" value="0" onclick="check(this.value)"><br>
            NO: <input type="radio" name="vote" value="1" onclick="check(this.value)"><br>
        </form>
    </div>

    <script>
        function check(int) {
            const xhr = new XMLHttpRequest();
            xhr.open("GET", "./52_ajax_poll_check.php?vote=" + int, true);
            xhr.send();
            xhr.onload = function() {
                if (this.status == 200) {
                    document.querySelector("#poll").innerHTML = this.responseText;
                }
            }
        }
    </script>
</body>
</html>