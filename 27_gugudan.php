
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>FORM 구구단</h3>
    <form name="form1" action="<?php $_SERVER["PHP_SELF"] ?>" method="GET">
        <select name="dan" id="dan">
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
        </select>
        <button type="button" onclick="submit_btn()">출력</button>
    </form>    

    <script>

        function submit_btn() {
            const dan = document.querySelector("#dan");
            dan.options[dan.options.selectedIndex].selected = true
            // return true;
        }
        // function clicked() {
        //     const submit_btn = document.querySelector("#dan");
        //     dan.options[dan.options.selectedIndex].selected = true;
        //     dan.submit();
        // }
        
    </script>
</body>
</html>
<?php

    // form 태그를 이용한 입력값 구구단 만들기
    
    $dan = $_GET["dan"];

    if (isset($_GET["dan"])) {
        for ($j = 1; $j < 10; $j++) {
            echo $dan."x".$j."=".$dan * $j."<br>";
        }
    } else {
        echo "단을 지정해주세요<br>";
    }
    
?>