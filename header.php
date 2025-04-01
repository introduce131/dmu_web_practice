<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="./css/profile-style.css">
</head>
<body>
        <header>
            <ul class="gnb">
            <?php
                $id = $_SESSION['login_id'];
                if($id === "admin") {
                    echo "<li><a href='admin_member.php'>관리자페이지</a></li>";
                }
            ?>
                <li><a href="logout.php">로그아웃</a></li>
            </ul>
        </header>
</body>