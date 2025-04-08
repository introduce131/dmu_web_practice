<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="././css/join.css">

    <script>
        // ID 중복 확인 팝업
        function check_id() {
          window.open("id_check.php?id=" + document.member_form.id.value,
          "ID 중복 확인",
           "left=700,top=300,width=350,height=200,scrollbars=no,resizable=yes");
        }

        // 폼 검증 함수
        function check_input(event) {
            if (!document.member_form.id.value) {
                alert("아이디를 입력하세요!");    
                document.member_form.id.focus();
                event.preventDefault(); // 기본 제출 동작 막기
                return;
            }

            if (!document.member_form.password.value) {
                alert("비밀번호를 입력하세요!");    
                document.member_form.password.focus();
                event.preventDefault();
                return;
            }

            if (!document.member_form.password_confirm.value) {
                alert("비밀번호 확인을 입력하세요!");    
                document.member_form.password_confirm.focus();
                event.preventDefault();
                return;
            }

            if (document.member_form.password.value !== document.member_form.password_confirm.value) {
                alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요!");
                document.member_form.password.focus();
                document.member_form.password.select();
                event.preventDefault();
                return;
            }

            if (!document.member_form.name.value) {
                alert("이름을 입력하세요!");    
                document.member_form.name.focus();
                event.preventDefault();
                return;
            }

            if (!document.member_form.email.value) {
                alert("이메일 주소를 입력하세요!");    
                document.member_form.email.focus();
                event.preventDefault();
                return;
            }

            if (!document.member_form.address.value) {
                alert("주소를 입력하세요!");    
                document.member_form.address.focus();
                event.preventDefault();
                return;
            }

            // 모든 입력이 유효하면 폼 제출
            document.member_form.submit();
        }

        // 기본 폼 리셋 함수
        function reset_form() {
            document.member_form.id.value = "";  
            document.member_form.password.value = "";
            document.member_form.password_confirm.value = "";
            document.member_form.name.value = "";
            document.member_form.email.value = "";
            document.member_form.address.value = "";
            document.member_form.id.focus();
        }
    </script>
</head>
<body>
    <div class="wrap">
        <p>회원가입</p>

        <form name="member_form" method="post" action="member_join.php" onsubmit="check_input(event)">

            <ul class="form_wrap">
                아이디 *
                <li class="id_wrap">
                     <input type="text" id="user_id" name="id" placeholder="예)abc@gmail.com" class="email1">
                    <input type="button" id="id_duplicate" value="중복 확인" class="email2" onclick="check_id()">
                </li>
                <li>비밀번호 * <input type="password" id="user_password" name="password" placeholder="영문,숫자 조합 8~16자" ></li>
                <li>비밀번호 확인 * <input type="password" id="user_password_confirm" name="password_confirm" placeholder="비밀번호 확인" ></li>
                <li>이름 * <input type="text" id="user_name" name="name" placeholder="예) 홍길동" ></li>
                <li>이메일 * <input type="text" name="email" placeholder="예 ) chltjrals0516@naver.com" class="email"></li>
                <li>주소 * <input type="text" name="address" placeholder="주소"></li>
                <li>생년월일 * <input type="date" name="birth" value="2002-01-01" ></li>
            </ul>
            
            <div class="button_frame"><button type="submit" class="submit_button">가입하기</button></div>
            
        </form>
    </div>

</body>
</html>
