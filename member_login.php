<?php
session_start();    // 세션 시작

$id = $_POST["id"]; // login 폼으로 부터 받아온 아이디
$password = $_POST["password"];  // login 폼으로 부터 받아온 비밀번호

$con = mysqli_connect("localhost", "root", "", "testdb");

$query = "select id, password from member where id= '".$id."'";
$result = mysqli_query($con, $query);

$record_count = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);

// id 존재여부 검색
if ($record_count > 0) {
    $pass_id = $row["id"];
    $pass_pw = $row["password"];
    
    // 로그인 성공 시,
    if ($pass_id === $id && $pass_pw === $password) {
        $_SESSION['count'] = 0;  // 로그인 성공 시 카운트 초기화
        
        $_SESSION['login_id'] = $pass_id;   // 세션에 id 저장
        
        // GET 방식으로 id를 profile.php 로 넘겨서 페이지 이동
        echo "
            <script>
                alert('로그인 성공!!');
                location.href = 'lobby.php?id=".$id."'
            </script>
        ";
    } else {
        $_SESSION['count']++;   // 로그인 실패 시 실패횟수 count 1 증가
        
        // 실패 횟수를 alert 으로 알려줌
        echo "
            <script>
                alert('로그인에 실패했습니다. 실패 횟수: (" . $_SESSION['count'] . "/3)');
                location.href = 'login.php';
            </script>
        ";
        
        // 3회 이상 실패하고 4회째는 회원가입 페이지로 이동
        if ($_SESSION['count'] > 3) {
            $_SESSION['count'] = 0;  // 실패 후 카운트 초기화

            header("Location: join.php");
            exit();  // 회원가입 페이지로 리다이렉트 후 종료
        }
    }
} else {
    // 이 곳은 데이터베이스에 아이디가 없으면 이쪽으로 빠짐
    $_SESSION['count']++; // 실패 횟수를 1씩 증가
    
    // 로그인 실패 횟수를 알려줌
    echo "
        <script>
            alert('로그인에 실패했습니다. 실패 횟수: (" . $_SESSION['count'] . "/3)');
            location.href = 'login.php';
        </script>
    ";
}

mysqli_close($con);
?>
