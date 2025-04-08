

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/modified_profile.css">
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
        
           <p>프로필</p>
           <section>
           
                
                <div class="picture_frame">
                    <img src="./images/profile-img.jfif" class='profile_pic'/>
                </div>

    
               
                    <ul class="user_info">
                        <!-- <li><span>아이디</span> <?=$id?></li> -->
                        <!-- <li><span>비밀번호</span> <?=$password?></li> -->
                        <li><span>이름 : </span> <?=$name?></li>
                        <li><span>생년월일 : </span> <?=$birth?></li>
                        <li><span>주소 : </span> <?=$address?></li>
                        <li><span>이메일 : </span> <?=$email?></li>
                        <li id="text_cover"><span class="pro">프로필 소개</span> <span id="text"><?=$profileText?></span></li>
                    </ul>
            
                    <a href="profile.php?id=<?= $id; ?>" class="modify">프로필 수정</a>

              
                
            </section>
            
        <?php 
        }
        ?>
	</div>
    
</body>
</html>