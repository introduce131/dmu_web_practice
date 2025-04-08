<?php
    $title = $_POST["title"];
    $author_id = $_POST["id"];
    $author_name = $_POST["name"];
    $content = $_POST["content"];
    
    $con = mysqli_connect("localhost", "root", "", "testdb");
    
    $query = "insert into board(title, author_id, author_name, content, createDt)";
    $query .= "values('$title', '$author_id', '$author_name', '$content', now())";
    
    mysqli_query($con, "set names utf8");
    $result = mysqli_query($con, $query);
    mysqli_close($con);
    
    if($result === false) {
        echo "
                    <script>
                        alert('글 작성에 실패했습니다.');
                    </script>
            ";
    } else {
        echo "
                    <script>
                        alert('글을 성공적으로 작성했습니다.');
                        location.href='boardlist.php';
                    </script>
                ";
    }
?>

