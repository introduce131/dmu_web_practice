<?php 
     session_start();

     if(isset($_POST['comment']) && !empty($_POST['comment'])){
        $board_num = $_GET['num']; 
        $author_id = $_SESSION['login_id'];  
        $author_name = $_SESSION['user_name'];  
        $content = $_POST['comment'];  
        


        $con = mysqli_connect("localhost", "root", "", "testdb");
        mysqli_set_charset($con, "utf8");
        $createDt = $row["createDt"];
   
        $query = "INSERT INTO comment (board_num, author_id, author_name, content, createDt) 
          VALUES ('$board_num', '$author_id', '$author_name', '$content', NOW())";


        $result = mysqli_query($con, $query);
       
        if($result){
            echo " <script>
                alert('성공!!');
                location.href = 'post.php?num=".$board_num."'
            </script>";
            echo"";
        }else{
            echo "<script>alert('댓글 달기 실패.');</script>";
        }

         mysqli_close($con);
    }
    
     
?>