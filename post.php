<?php
    session_start();
    
    $user_num = $_GET['num'];
    
    $con = mysqli_connect("localhost", "root", "", "testdb");
    mysqli_set_charset($con, "utf8");
    $query = "select title, content, author_name, createDt from board where num=".$user_num;
    
    $result = mysqli_query($con, $query);
    $record_count = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);
    
    // 데이터가 있으면?
    if ($record_count > 0) {
        $title = $row["title"];
        $content = $row["content"];
        $authorName = $row["author_name"];
        $createDt = $row["createDt"];
    } else {
        echo "<h1>게시글을 찾을 수 없습니다!</h1>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <style>
        .post {
            margin-top: 30px;
            margin-left: 10px;
            margin-bottom: 30px;
        }
        
        .content {
            margin-top: 50px;
            padding-left: 10px;
            font-size: 20px;
            margin: 0 auto;
        }
        
        a {
            padding-left: 10px;
        }
    </style>
</head>
<body>
	<div class="post">
    	<h1><?=$title?></h1>
    	<span><b><?=$authorName?></b> · <?=$createDt?></span>
	</div>
	<div class="content">
		<span>
			<?=$content?>
		</span>
	</div>
	<br/><br/>
	<a href="boardlist.php">목록으로</a>
    
    <?php 
        $session_id =  $_SESSION['login_id'];
        $written_name = "select author_id from board where num=".$user_num;
        $result = mysqli_query($con, $written_name);

        $row = mysqli_fetch_array($result);

        $author_id = $row['author_id'];

        if($session_id === $author_id){
            echo "<a href='post_delete.php?num=".$user_num."'>삭제</a>";

            
        }
    ?>


    <div>
        <?php
            $comment_query = "SELECT * FROM comment WHERE board_num = $user_num";

            $result = mysqli_query($con, $comment_query);
            $record_count = mysqli_num_rows($result);

            echo"<ul>";
            for($i=0; $i<$record_count; $i++) {
                $row = mysqli_fetch_array($result);

                $num = $row["comment_id"];
                $authorName = $row["author_name"];
                $comment = $row["content"];
                $createDt = $row["createDt"];

                echo "<li>";

                echo "<div>$authorName</div>";
                echo "<div>$comment <span>$createDt</span> </div>";
              
            }


            echo" </ul>";

        ?>
    </div>
 
    <div>댓글달기</div>
    <form action="comment_proc.php?num=<?php echo $user_num; ?>" method="post">
        <input name="comment" type="text">
        <input type="submit" >
    </form>


    <a href='boardlist.php'>이전으로</a>


    
</body>