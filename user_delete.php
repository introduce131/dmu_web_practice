<?php
    session_start();
    
    $id = $_SESSION["login_id"];
    $con = mysqli_connect("localhost", "root", "", "testdb");
    
    $query = "delete from member where id = '".$id."'";
    $result = mysqli_query($con, $query);
    mysqli_close($con);
    
    if($result === false) {
        echo "
                <script>
                    alert('탈퇴에 실패했습니다. 나중에 다시 시도해주세요.');
                    location.href = 'profile.php?id=".$id."'
                </script>
        ";
    } else {
        echo "
                <script>
                    alert('정상적으로 탈퇴 되었습니다.');
                    location.href = 'login.php';
                </script>
            ";
    }
?>

