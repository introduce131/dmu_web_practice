<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>메인페이지</title>
    <link rel="stylesheet" href="./css/initial_page.css">
</head>
<body>
    
    <div class="wrap">
    	
<!--     	<div class="img_frame"><div class="title_img">달</div></div> -->
    
        <div class="typing-container">
            <span id="text"></span><span id="cursor"></span>
          </div>

        <div class="sub_wrap">
            <a href="login.php">로그인</a>
            <a href="join.php">회원가입</a>
        </div>
    </div>
    
   <script>

const text = "안녕하세요 환영합니다!"; 
let index = 0;
let speed = 100; 

function typeWriter() {
  if (index < text.length) {
    document.getElementById("text").textContent += text.charAt(index);
    index++;
    setTimeout(typeWriter, speed);
  }
}

typeWriter();
   </script>
</body>
</html>
