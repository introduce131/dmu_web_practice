<?php
    // 세션 시작
    session_start();
    
    // 로그인 실패 횟수를 저장하는 세션 변수 'count'가 없으면 -> 세션 변수 count를 생성
    if(!isset($_SESSION['count'])) {
        $_SESSION['count'] = 0;
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Document</title>
    <script>
        // 회원가입 페이지로 이동하는 JS 코드
        function joinPage() {
            location.href = 'join.php';
        }
    </script>
</head>
<body>
    <div class="loginbox">
        <h2 style="color: #222;">Login</h2>
        <form method="post" action="member_login.php" id="login-form">
            <input type="text" name="id" placeholder="ID">
            <input type="password" name="password" placeholder="Password">
            <label for="remember-check" style="color: #222;">
                <input type="checkbox" id="remember-check" style="color: #222;"><span class="text">아이디 저장하기</span>
            </label>
            <input type="submit" value="Login" style="color: white; background-color:#222;">
            <a id="join" onclick="joinPage()">회원가입이 필요하신가요?</a>
        </form>
    </div>
</body>
</html>

    