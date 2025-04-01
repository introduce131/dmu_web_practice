<?php
    session_start();
    
    // id 중복체크를 했는지 검사하는 부분
    if(!isset($_SESSION["is_checked"])) {
        $_SESSION['is_checked'] = false;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="././css/style.css">
    <script>
    	   function check_id() {
     		window.open("id_check.php?id=" + document.member_form.id.value,
         	"ID 중복 확인",
          	"left=700,top=300,width=350,height=200,scrollbars=no,resizable=yes");
   			}
    </script>
</head>
<body>
    <div class="wrap">
        <div class="header">
            <h2>회원가입</h2>
            
        </div>

        <div class="section">
            <form name="member_form" method="post" action="member_join.php">

               <ul>
                    <li><input type="text" id="user_name" name="name" placeholder="이름" > </li>
                    <li>
                    	<input type="text" id="user_id" name="id" placeholder="아이디" class="email1">
                    	<input type="button" id="id_duplicate" value="id 중복 확인" class="email2" onclick="check_id()">
                    </li>
                    <li><input type="password" id="user_password" name="password"  placeholder="비밀번호" ></li>
                    <li><input type="text" name="email1" placeholder="이메일" class="email1">@<input type="text" name="email2" class="email2"></li>
                    <li><input type="text" name="address" placeholder="주소"></li>
                    <li><input type="date" name="birth" value="2002-01-01" ></li>
               </ul>

               <button type="submit" class="submit_button">가입하기</button>

            </form>
        </div>

        <div class="footer"></div>
    </div>

    
</body>

<script>
    function check_input()
    {
       if (!document.member_form.id.value) {
           alert("아이디를 입력하세요!");    
           document.member_form.id.focus();
           return;
       }
 
       if (!document.member_form.pass.value) {
           alert("비밀번호를 입력하세요!");    
           document.member_form.pass.focus();
           return;
       }
 
       if (!document.member_form.pass_confirm.value) {
           alert("비밀번호확인을 입력하세요!");    
           document.member_form.pass_confirm.focus();
           return;
       }
 
       if (!document.member_form.name.value) {
           alert("이름을 입력하세요!");    
           document.member_form.name.focus();
           return;
       }
 
       if (!document.member_form.email1.value) {
           alert("이메일 주소를 입력하세요!");    
           document.member_form.email1.focus();
           return;
       }
 
       if (!document.member_form.email2.value) {
           alert("이메일 주소를 입력하세요!");    
           document.member_form.email2.focus();
           return;
       }
 
       if (document.member_form.pass.value != 
             document.member_form.pass_confirm.value) {
           alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요!");
           document.member_form.pass.focus();
           document.member_form.pass.select();
           return;
       }
 
       document.member_form.submit();
    }
 
    function reset_form() {
       document.member_form.id.value = "";  
       document.member_form.pass.value = "";
       document.member_form.pass_confirm.value = "";
       document.member_form.name.value = "";
       document.member_form.email1.value = "";
       document.member_form.email2.value = "";
       document.member_form.id.focus();
       return;
    }
 </script>
</html>