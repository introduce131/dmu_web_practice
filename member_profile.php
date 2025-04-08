<?php
    $user_id = $_POST["user_id"];
    $user_password = $_POST["user_password"];
    $user_name = $_POST["user_name"];
    $user_birth = $_POST["user_birth"];
    $user_address = $_POST["user_address"];
    $user_email = $_POST["user_email"];
    $profileText = $_POST["user_profile_text"];
    
    $con = mysqli_connect("localhost", "root", "", "testdb");
    $query = "update member set password='".$user_password."', profileText = '".$profileText."', ";
    $query .= "name = '".$user_name."', birth='".$user_birth."', address='".$user_address."', email='".$user_email."'";
    $query .=" where id='".$user_id."'";
    
    mysqli_query($con, "set names utf8");
    $result = mysqli_query($con, $query);
    mysqli_close($con);
    
    if($result === true) {
        echo "
                <script>
                    alert('성공적으로 저장 되었습니다.');
                    location.href = 'profile_modified.php?id=".$user_id."';
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