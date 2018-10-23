<!-- 회원 프로필 수정 form-->
<!-- 사용자의 회원정보 업데이트 및 탈퇴 -->

<?php
    require_once("C:/xampp/htdocs/TermProject/tools.php");
    require_once("C:/xampp/htdocs/TermProject/member/MemberDao.php");
    
    session_start_if_none();
    $id =  sessionVar("uid");//$id 변수에 사용자의 id저장 
    if($id){    //$id에 값이 들어왔다면
        $dao = new MemberDao();
        $member = $dao->getMember($id);
    }
?>

<!DOCTYPE html>
<html lang="en">
    <title>Join Page</title>
    <link rel="stylesheet" href="./member.css">
    <link rel="stylesheet" href="/TermProject/icon/css/font-awesome.min.css">
    <script>
    function processDelete(){
        var result = confirm("회원 탈퇴를 하시겠습니까?");
        if(result){
            location.href="member_delete.php";
        }
    }

</script>
    <body>
    <div id="member-m-container">
            <?php require("C:/xampp/htdocs/TermProject/header.php") ?>
            
            <div id="member-s-container">
                
            <div class="container">
                <h3>NEITTER-회원 정보 수정</h3>
                <hr>
            </div>
            
            <div class="row">
            <div class="col-sm"> </div><!--첫번째 그리드 박스-->
        <div class="col-sm">
            
            <form action="member_profile_update.php" method="post">

                <i class="fa fa-exclamation-circle"> <label for="inputEmail">아이디</label></i>
                <input style="color:blue;" type="text" value="<?= $member["id"]?>" name="id"  class="form-control" readonly><!--autocomplete 자동완성기능 off , autofocus , required-->
                <br>
                <br>
                비밀번호 <a href="member_password_check.form.php">[ 비밀번호 변경 ]</a>
                <br>
                <br>
                <i class="fa fa-exclamation-circle"><label for="inputNickname">닉네임</label></i>
                <input style="color:blue;" type="text"  name="nickname" class="form-control" value="<?= $member["nickname"]?>" readonly>
                <br>
                <i class="fa fa-exclamation-circle"> <label for="inputEmail">이메일</label></i>
                <input style="color:blue;" type="email"  name="email" class="form-control" value="<?= $member["email"]?>" readonly >
                <br>
                <br>
                <div class="form-group">
                    <label for="comment">자기소개</label>
                    <textarea class="form-control" rows="5" id="comment" name="selfContext"><?= $member["selfContext"]?></textarea>
                </div><!--end of form-group-->
            
                <div id="joinBtnBox">
                    <button class="btn btn-outline-warning " type="submit"><i class="fa fa-pencil">수정</i></button>
                    <button class="btn btn-outline-warning " type="button"  onclick=" processDelete();"><i class="fa fa-trash">회원탈퇴</i></button>
                </div>
            </form>
        </div><!--end of col-sm-->

        <div class="col-sm">
            
        </div><!--세번재 그리드 박스-->

        </div><!--end of fow -->
        </div><!--end of member-s-container-->

        
        <?php require("../footer.php") ?> 
                
    </div> <!--end of member-m-container-->

    
</body>
</html>