<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>아이디 중복 확인</title>
        
        <script>
        </script>
    </head>
    <body>
    	<h3>아이디 중복 확인</h3>
    	<?php
    	   session_start();
    	   
    	   $_SESSION['is_checked'] = true; // 중복 체크 여부 ok
    	   
    	   $id = $_GET["id"];
    	   
    	   if(!$id) {
    	       echo "<h4>아이디를 입력해주세요!</h4>";
    	   } else {
    	       $con = mysqli_connect("localhost", "root", "", "testdb");
    	       
    	       $query = "select id from member where id= '".$id."'";
    	       $result = mysqli_query($con, $query);
    	       
    	       $record_count = mysqli_num_rows($result);
    	      
    	       
    	       if($record_count) {
    	           echo "<h4>".$id."는 이미 사용중인 아이디 입니다.</h4>";
    	           echo "<h4>다른 아이디를 사용해주세요</h4>";
    	       } else {
    	           echo "<h4>".$id."는 사용 가능한 아이디 입니다.</h4>";
    	       }
    	       mysqli_close($con);
    	   }
    	?>
    </body>
</html>