<!-- 회원 비밀번호 변경 form-->
<!-- -사용자의 비밀번호를 member_user_check.php로 넘겨주는 form-->

<?php 
    require_once("C:/xampp/htdocs/TermProject/tools.php");
        
    
    session_start_if_none();
    
    $uid =  sessionVar("uid");//$uid 변수에 사용자의 id저장 
?>

<!DOCTYPE html>
<html lang="en">
<title>User Check</title>
<link rel="stylesheet" href="./member.css">
<!--member css-->
<link rel="stylesheet" href="/TermProject/icon/css/font-awesome.min.css">
<!--fontAresome-->

<body>
    <div id="member-m-container">
        <?php require("C:/xampp/htdocs/TermProject/header.php") ?>
        <div id="member-profileCheck-container">

            <div class="container">
                <h3>NEITTER-회원 비밀번호 확인</h3>
                <hr>
                <br>
                <br>
                <br>
                <br>
                <div class="row">
                    <div class="col-sm"></div>
                    <!--첫번 째 그리드 박스-->
                    <div class="col-sm">

                        <form action="member_user_check.php" method="post">
                            <b>회원아이디</b><b style="color:blue;">
                                <?= $uid ?></b>
                            <br>
                            <br>
                            <br>
                            <label for="inputPassword">비밀번호</label>
                            <input type="password" id="inputPassword" name="pw" class="form-control" autocomplete=off
                                placeholder="Password" required>
                            <i class="fa fa-exclamation-circle"><small>회원님의 정보를 보호하기 위해 확인합니다. </small></i>

                            <div id="profileCheckBox">
                                <button class="btn btn-outline-warning" type="submit">&nbsp;&nbsp;&nbsp;&nbsp;확인&nbsp;&nbsp;&nbsp;&nbsp;</button>
                            </div>
                        </form>
                        <!--end of form-->

                    </div>
                    <!--두번쨰 그리드 박스-->

                    <div class="col-sm"></div>
                    <!--세번째 그리드 박스-->
                </div>
                <!--end of row-->
            </div>
            <!--end of containar-->

        </div>
        <!--end of member-s-container-->
        <?php require("../footer.php") ?>
    </div>
    <!--end of member-m-container-->

</body>

</html>