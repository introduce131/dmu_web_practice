<?php
    session_start();  // 세션 시작
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="./css/profile-style.css">
</head>
<body>
	<div class="wrap">
	
        <header>
            <ul class="gnb">
                <li><a href="logout.php">로그아웃</a></li>
            </ul>
        </header>
        
        <?php
        if(!isset($_SESSION['login_id'])) {
        ?>
        	<h1>올바르지 않은 접근입니다. 로그인을 해주세요</h1>
        <?php
        }
        else {
            $con = mysqli_connect("localhost", "root", "", "testdb");
            mysqli_set_charset($con, "utf8");
            $query = "select id, name, profileText from member where id='".$_GET["id"]."'";
            
            $result = mysqli_query($con, $query);
            $record_count = mysqli_num_rows($result);
            $row = mysqli_fetch_array($result);
            
            // 데이터가 있으면?
            if ($record_count > 0) {
                $id = $row["id"];
                $name = $row["name"];
                $profileText = $row["profileText"];
                
                echo "
                    <script>console.log('".$name."')</script>
                ";
            } else { 
                $name = "이름 없음";
                $profileText="";
            }
            
        ?> 
           <section>
                <div class="picture_frame">
                    <img src="./images/profile-img.jfif" class='profile_pic'/>
                </div>
                
                <form id="article" method="post" action="member_profile.php">
                    <div>
                        <input type="hidden" name="user_id" value=<?=$id?>></input>
                        
                        <div class=user_name">
                        	<input type="text" name="user_name" value=<?=$name?> readonly></input>
                        </div>
                        
                        <br/>
                        
                        <div class="text_frame">
                        	<span class="introdution"> 소개글</span>
                        	<textarea id="text-area" name="user_profile_text" cols="30" rows="5"><?=$profileText?></textarea><br/>
                        </div>
                        <input type="submit" value="저장"/>
                    </div>
                </form>
            </section>
        <?php 
        }
        ?>
	</div>
</body>
</html>