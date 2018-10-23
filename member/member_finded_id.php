<?php
     require_once("C:/xampp/htdocs/TermProject/tools.php");

     $id = requestValue("id");
        
    //  echo "<script>alert('$id');</script>";
?>



<!DOCTYPE html>
<html lang="en">   
    <title>Finded ID</title>
    <link rel="stylesheet" href="./member.css"> <!--member css-->
    <link rel="stylesheet" href="/TermProject/icon/css/font-awesome.min.css">   <!--fontAresome-->
    <body>     
      
        <div id="member-m-container">
                <?php require("C:/xampp/htdocs/TermProject/header.php") ?>
            <div id="member-finded-container">
                
        <div class="container">
            <h3>NEITTER-회원 아이디 찾기 결과</h3>
            <hr>
            <br>
            <br> 
            <br>        
        <div class="row">
            <div class="col-sm">
                <hr>
                <div id="finedId">
                    <?php if($id): ?>
                        <h1><i class="fa fa-id-card"></i> 회원아이디는 <b style="color:blue;"><?= $id ?></b>입니다.</h1>
                    <?php else :?>
                        <h1><i class="fa fa-exclamation-circle"></i> 해당 이메일의 회원 아이디가 존재하지 않습니다.</h1>
                    <?php endif ?>
                   
                </div>
                <hr>
            <br>
            <br>
            <br>
                <div id="profileCheckBox">
                    <button class="btn btn-outline-warning" type="button" onclick="location.href='/TermProject/index.php'">&nbsp;&nbsp;&nbsp;&nbsp;홈으로&nbsp;&nbsp;&nbsp;&nbsp;</button>
                </div> 
        
              </div> <!--그리드 박스-->                
                </div><!--end of row--> 
            </div>  <!--end of containar-->

                </div><!--end of member-s-container-->
                <?php require("../footer.php") ?>      
        </div><!--end of member-m-container-->
       
    </body>
</html>