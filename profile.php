
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
	
        <?php include "header.php";?>
        
        <?php
        if(!isset($_SESSION['login_id'])) {
        ?>
        	<h1>올바르지 않은 접근입니다. 로그인을 해주세요</h1>
        <?php
        }
        else {
            $con = mysqli_connect("localhost", "root", "", "testdb");
            mysqli_set_charset($con, "utf8");
            $query = "select id, birth, address, email, password, name, profileText from member where id='".$_GET["id"]."'";
            
            $result = mysqli_query($con, $query);
            $record_count = mysqli_num_rows($result);
            $row = mysqli_fetch_array($result);
            
            // 데이터가 있으면?
            if ($record_count > 0) {
                $id = $row["id"];
                $password = $row["password"];
                $name = $row["name"];
                $birth = $row["birth"];
                $address = $row["address"];
                $email = $row["email"];
                $profileText = $row["profileText"];
                
                echo "
                    <script>console.log('".$name."')</script>
                ";
            } else { 
                $name = "이름 없음";
                $profileText="";
            }
            
        ?> 
        
        <p>프로필 수정</p>
           <section>
           
                
                <div class="picture_frame">
                    <img src="./images/profile-img.jfif" class='profile_pic'/>
                </div>
                
                <form id="article" method="post" action="member_profile.php">
                    <div>
                    	<span>아이디</span>
                        <input type="text" name="user_id" value=<?=$id?> readonly></input>
                        
                        <span>비밀번호</span>
                        <input type="text" name="user_password" value=<?=$password?>></input>
                        
                        <div class="user_name">
                        	<span>이  름</span>
                        	<input type="text" name="user_name" value=<?=$name?>></input>
                        </div>
                        
                        <span>생년월일</span>
                        <input type="date" name="user_birth" value=<?=$birth?>>
                        
                        <span>주  소</span>
                        <input type="text" name="user_address" value=<?=$address?>>
                        
                        <span>E-mail</span>
                        <input type="text" name="user_email" value=<?=$email?>>
                        
                        <div class="text_frame">
                        	<span class="introdution"> 소개글</span>
                        	<textarea id="text-area" name="user_profile_text" cols="30" rows="5"><?=$profileText?></textarea><br/>
                        </div>
                        <input type="submit" value="저장"/>
                    </div>
                </form>
                
                <a href="user_delete.php" id="btn_user_delete">회원 탈퇴</a>
            </section>
        <?php 
        }
        ?>
	</div>
</body>
</html>