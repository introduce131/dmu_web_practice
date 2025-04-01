<?php
    $profileText = $_POST["user_profile_text"];
    $user_id = $_POST["user_id"];
    
    $con = mysqli_connect("localhost", "root", "", "testdb");
    $query = "update member set profileText = '".$profileText."' where id='".$user_id."'";
    
    mysqli_query($con, "set names utf8");
    $result = mysqli_query($con, $query);
    mysqli_close($con);
    
    if($result === true) {
        echo "
                <script>
                    alert('성공적으로 저장 되었습니다.');
                    location.href = 'profile.php?id=".$user_id."';
                </script>
        ";
    } else {
        echo "
                <script>
                    alert('저장에 실패했습니다!');
                    location.href = 'profile.php?id=".$user_id."';
                </script>
            ";
    }
?>