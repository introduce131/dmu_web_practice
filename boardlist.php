<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/boardlist.css">
</head>
<body>
    <div class="wrap">
    	<?php include "header.php";?>
    
    <br/>
    
    <p>게시판</p>
    
    
    <div class="table_wrap">
    	<Table>
    	<tr>
    		<th>게시글번호</th>
    		<th>제목</th>
    		<th>작성자</th>
    		<th>작성일자</th>
    	</tr>
    		<?php
    		    $login_id = $_SESSION["login_id"];
    		    
        		$con = mysqli_connect("localhost", "root", "", "testdb");
        		
        		$query = "select num, title, author_name, createDt from board";
        		mysqli_query($con, "set names utf8");
        		$result = mysqli_query($con, $query);
        		
        		$record_count = mysqli_num_rows($result);
        		
        		for($i=0; $i<$record_count; $i++) {
        		    mysqli_data_seek($result, $i);
        		    
        		    $row = mysqli_fetch_array($result);
        		    
        		    $num = $row["num"];
        		    $title = $row["title"];
        		    $authorName = $row["author_name"];
        		    $createDt = $row["createDt"];
        		    
        		    echo "<tr>";
        		    echo "<td>".$num."</td>";
        		    echo "<td><a href='post.php?num=".$num."'>".$title."<a/></td>";
        		    echo "<td>".$authorName."</td>";
        		    echo "<td>".$createDt."</td>";
        		    echo "</tr>";
        		}
    		?>
    </Table>
    <?php
        if(isset($_SESSION["login_id"])) {
    ?>
    	<a href="post_write.php?id=<?=$login_id?>">글쓰기</a>
    <?php 
        }
    ?>
    </div>
  
    </div>
</body>
</html>