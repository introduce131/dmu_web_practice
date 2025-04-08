<?php
    session_start();
    
    $num = $_GET['num'];
    
    $con = mysqli_connect("localhost", "root", "", "testdb");
    mysqli_set_charset($con, "utf8");
    $query = "select title, content, author_name, DATE_FORMAT(createDt,'%Y-%m-%d') 'createDt' from board where num=".$num;
    
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
</body>