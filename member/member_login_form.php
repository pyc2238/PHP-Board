<!-- 회원 로그인 form -->

<!DOCTYPE html>
<html lang="en">   
    <title>Login Page</title>
    <link rel="stylesheet" href="./member.css">
    <body>     
        <div id="member-m-container">
                <?php require("C:/xampp/htdocs/TermProject/header.php") ?>
            <div id="member-s-container">
            
    <div class="container">
        <h3>NEITTER-로그인</h3>
        <hr>
        <br>
        <br> 
        <br>
    <div class="row">
        <div class="col-sm"></div><!--첫번 째 그리드 박스-->
        <div class="col-sm">
        
        <form action="member_login.php" method="post">
            <div class="container">
                <img src="https://ncache.ilbe.com/files/attach/new/20161117/14357299/6250112177/9044007580/16938089c93c1bd5711fb23f40703756.jpg" class="img-fluid" alt="Responsive image">
                <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
            </div>

            <label for="inputEmail" class="sr-only">ID</label>
            <input type="text" id="inputEmail" name="id"  class="form-control" autocomplete=off placeholder="ID" required autofocus>
            <br>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" name="pw" class="form-control" autocomplete=off placeholder="Password" required>
            <br> 
            <br>
           
            <div id="loginBtnBox">
                <button class="btn btn-outline-warning " type="submit">&nbsp;&nbsp;&nbsp;로그인&nbsp;&nbsp;&nbsp;</button>
                <button class="btn btn-outline-warning" type="button" onclick="location.href='member_join_form.php'">&nbsp;&nbsp;회원가입&nbsp;&nbsp;</button>
                <button class="btn btn-outline-warning" type="button" onclick="location.href='member_find_id_pw_form.php'">ID/PW찾기</button>
            </div>

        </form>
            </div> <!--두번쨰 그리드 박스-->

            <div class="col-sm"></div> <!--세번째 그리드 박스-->
            </div><!--end of row--> 
        </div> <!--end of containar-->

            </div><!--end of member-s-container-->
            <?php require("../footer.php") ?> 
        </div><!--end of member-m-container-->
    </body>
</html>