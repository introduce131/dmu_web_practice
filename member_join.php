<?php
    $id = $_POST["id"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $birth = $_POST["birth"];
    $address = $_POST["address"];
    $email1 = $_POST["email1"];
    $email2 = $_POST["email2"];
    
    $email = $email1."@".$email2;
    
    date_default_timezone_set("Asia/Seoul");
    $createDt = date("Y-m-d H:i:s");
    
    $con = mysqli_connect("localhost", "root", "", "testdb");
    
    $query = "insert into member(id, password, name, birth, address, email, createDt)";
    $query .= "values('$id', '$password', '$name', '$birth', '$address', '$email', '$createDt')";
    
    mysqli_query($con, "set names utf8");
    $result = mysqli_query($con, $query);
    mysqli_close($con);
    
    if($result === false) {
        echo "
                <script>
                    alert('가입에 실패했습니다.');
                    location.href = 'join.php';
                </script>
        ";
    } else {
        echo "
                <script>
                    alert('정상적으로 가입 되었습니다');
                    location.href = 'login.php';
                </script>
            ";
    }
?>