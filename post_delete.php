<?php
    session_start();


    $user_id = $_SESSION['login_id'];

    $con = mysqli_connect("localhost", "root", "", "testdb");

    $num = $_GET['num'];

    $written_name = "select author_id from board where num=".$num;
    $result = mysqli_query($con, $written_name);

    $row = mysqli_fetch_array($result);

    $author_id = $row['author_id'];

    $delete_query = "delete from board where num=".$num;

    if($user_id === $author_id){
        $result = mysqli_query($con,$delete_query);

        if($result){
            echo "<script>alert('삭제 완료'); location.href='boardlist.php';</script>";
        }else{
            echo "<script>alert('삭제 실패'); history.back();</script>";
        }
    }
?>