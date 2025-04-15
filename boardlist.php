<?php
	 
	 $con = mysqli_connect("localhost", "root", "", "testdb");
	 mysqli_query($con, "set names utf8");
 
	 // 현재 페이지 번호 가져오기
	 // url주소에 page번호 없으면 초기페이지 1로설정
	 if (isset($_GET['page'])) {
		 $page = (int)$_GET['page'];
	 } else {
		 $page = 1;
	 }
 
	 $limit = 10; // 한 페이지에 보여줄 게시물 수 10개

	 
	 $offset = ($page - 1) * $limit;
 
	 // 전체 게시글 수 구하기
	 $count_query = "SELECT COUNT(*) as count FROM board";


	 $count_result = mysqli_query($con, $count_query);

	 //결과 배열로 받음
	 $count_row = mysqli_fetch_array($count_result);

	 // count_row는 카운트해서 숫자로 반환함 그래서 원래 count_query랑
	 // 결과가 같아서 저걸 쓰려했는데 문자열로 저장되서 씀

	 $total_posts = $count_row['count'];

	 // 여기서 위에 받은 게시물 수를 받아서 10으로 나눈다 22개 있으면 22/10 그리고 2.2 ceil메서드로 올림해서 3
	 $total_pages = ceil($total_posts / $limit);
?>


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
        
    ?>

<?php 
        
    ?>
    		<?php
    		    $login_id = $_SESSION["login_id"];
    		    
        		$con = mysqli_connect("localhost", "root", "", "testdb");
        		
				// offset 으로 출력 offset 0이면 1~10 10이면 11~20 내림차순으로 함
        		$query = "SELECT num, title, author_name, createDt FROM board ORDER BY num DESC LIMIT $limit OFFSET $offset";

        		mysqli_query($con, "set names utf8");

        		$result = mysqli_query($con, $query);
        		
				// 10개의 값을 가져옴
        		$record_count = mysqli_num_rows($result);

				if(isset($_SESSION["login_id"])) {
        			echo "<a class='writing_button' href='post_write.php?id=".$login_id."'>글쓰기</a>";
				}
        		for($i=0; $i<$record_count; $i++) {
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
    echo "<div class='indi_wrap'>";
    for ($i = 1; $i <= $total_pages; $i++) {
        
		echo "<a class='indicator' href='?page=".$i."'>".$i."</a> ";
    }
    echo "</div>";
?>

		
    
    </div>
  
    </div>
</body>
</html>