<?php
    $con = mysqli_connect("localhost", "root", "", "testdb");
    mysqli_set_charset($con, "utf8");
    $query = "select id, name from member where id='".$_GET["id"]."'";
    
    $result = mysqli_query($con, $query);
    $record_count = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);
    
    // 데이터가 있으면?
    if ($record_count > 0) {
        $id = $row["id"];
        $name = $row["name"];
    } else {
        $name = "이름 없음";
    }
?>
<!doctype html>
    <head>
        <meta charset="UTF-8">
        <title>게시판</title>
        <link rel="stylesheet" href="./css/post_write_style.css">
    </head>
	<body>
        <div id="board_write">
        <h1><a href="/">자유게시판</a></h1>
        <h4>글을 작성하는 공간입니다.</h4>
        
            <div id="write_area">
                <form action="write_ok.php" method="post">
                	
                	<input type="hidden" name="id" value=<?=$id?>>
                	<input type="hidden" name="name" value=<?=$name?>>
                	
                    <div id="in_title">
                    	<textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required></textarea>
                    </div>
                    
                    <div class="wi_line"></div>
                    <div id="in_content">
                    	<textarea name="content" id="ucontent" placeholder="내용" required></textarea>
                    </div>
                    
                    <div class="bt_se">
                    	<button type="submit">글 작성</button>
                    </div>
                </form>
            </div>
        </div>
	</body>
</html>