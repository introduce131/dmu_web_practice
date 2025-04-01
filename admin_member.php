<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="././css/login.css">
        <title>관리자 페이지</title>
        <style>
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
                padding: 5px;
            }
            th {
                background-color: #008b8b;
                color:white;
            }
        </style>
    </head>
    <body>
    <?php
    if(!isset($_SESSION['login_id'])) {
        echo "<h1>잘못된 접근입니다.</h1>";
    }
    if(isset($_SESSION['login_id'])) {
        $id = $_SESSION["login_id"];
        if($id != "admin") {
            echo "<h1>권한이 없습니다!</h1>";
        }
        else { // start else
    ?>
    	<h1>회원가입 상황</h1><br/>
    	<table>
    		<tr>
    			<th>아이디</th>
    			<th>비밀번호</th>
    			<th>이  름</th>
    			<th>생년월일</th>
    			<th>주  소</th>
    			<th>E-mail</th>
    			<th>등록일</th>
    			<th>소개글</th>
    		</tr>
    		<?php
        		$con = mysqli_connect("localhost", "root", "", "testdb");
        		
        		$query = "select * from member";
        		mysqli_query($con, "set names utf8");
        		$result = mysqli_query($con, $query);
        		
        		$record_count = mysqli_num_rows($result);
        		
        		for($i=0; $i<$record_count; $i++) {
        		    mysqli_data_seek($result, $i);
        		    
        		    $row = mysqli_fetch_array($result);
        		    
        		    $id = $row["id"];
        		    $password = $row["password"];
        		    $name = $row["name"];
        		    $birth = $row["birth"];
        		    $address = $row["address"];
        		    $email = $row["email"];
        		    $createDt = $row["createDt"];
        		    $profileText = $row["profileText"];
        		    
        		    echo "<tr>";
        		    echo "<td>".$id."</td>";
        		    echo "<td>".$password."</td>";
        		    echo "<td>".$name."</td>";
        		    echo "<td>".$birth."</td>";
        		    echo "<td>".$address."</td>";
        		    echo "<td>".$email."</td>";
        		    echo "<td>".$createDt."</td>";
        		    echo "<td>".$profileText."</td>";
        		    echo "</tr>";
        		}
    		?>
    	</table>
    	<?php
        } // end else
    	?>
    <?php
    }
    ?>
    </body>
</html>