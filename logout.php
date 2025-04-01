<?php
    session_start();
    
    unset($_SESSION['login_id']);
    
    session_destroy(); // 모든 세션 삭제
    
    echo "
        <script>
            alert('로그아웃 되었습니다');
            location.href='login.php';
        </script>
    ";
?>