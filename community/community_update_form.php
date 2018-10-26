<!-- 게시판 수정 페이지 -->
<?php
    require_once("C:/xampp/htdocs/TermProject/tools.php");
    require_once("./CommunityDao.php");
    session_start_if_none();
    $unickname = sessionVar("unickname");
    $num = requestValue("num");
    $page = requestValue("page");
    $dao = new CommunityDao();
    $member = $dao->getMsg($num);

    if($member["writer"] != $unickname ){
        errorBack("해당 게시물에 대한 수정권한이 없습니다.");
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
   
<link rel="stylesheet" href="./community.css"> <!--forum css-->
<link rel="stylesheet" href="/TermProject/icon/css/font-awesome.min.css">   <!--fontAresome-->
<script type="text/javascript" src="/TermProject/community/naverSmartEdit/nse_files/js/HuskyEZCreator.js" charset="utf-8"></script>
   
    <title>update_form</title>

    <?php
        require("C:/xampp/htdocs/TermProject/html_head.php");
    ?>
</head>


<style>
    form input{margin-right:20px;}
</style>

<body>
    <div id="m-community-container">     
        <?php require("C:/xampp/htdocs/TermProject/header.php") ?> 
        <div id="s-community-container">
        
    
   <div class="container">

    <h2>NEITTER-글 수정</h2><hr>
            <form action="<?= bdUrl("community_update.php",$num,$page)?>" method="post" >
            <table border="2" class="table">
                <tr>
                    <td style="text-align:center;"><b>Title</b></td>
                    <td><input type="text" class="form-control"  name="title" autocomplete=off value="<?= $member["title"] ?>"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <textarea name="content" id="content" class="nse_content" cols="147" rows="20"><?= $member["content"] ?> </textarea>
                        <script type="text/javascript">
                              var oEditors = [];
                                nhn.husky.EZCreator.createInIFrame({
                                    oAppRef: oEditors,
                                    elPlaceHolder: "content",   // 에디터 홀더 . textarea의 아이디
                                    sSkinURI: "./nse_files/SmartEditor2Skin.html",
                                    fCreator: "createSEditor2"
                                });
                                function submitContents(elClickedObj) {
                                    // 에디터의 내용이 textarea에 적용됩니다.
                                    oEditors.getById["content"].exec("UPDATE_CONTENTS_FIELD", []);
                                    // 에디터의 내용에 대한 값 검증은 이곳에서 document.getElementById("ir1").value를 이용해서 처리하면 됩니다.
                                    try {
                                        elClickedObj.form.submit();
                                    } catch(e) {}
                                }
                        </script>
                    </td>
                </tr>
            </table>
            <br>
            <hr>
                <input class="btn btn-outline-warning float-right" type="button" value="목록" onclick="location.href='<?= bdUrl('community.php',0,$page) ?>'">
                <input class="btn btn-outline-primary float-right" type="submit" value="수정" onclick="submitContents(this)" />             
        </form>
        </div><!--contanier-->

        </div>
            <?php require("C:/xampp/htdocs/TermProject/footer.php") ?>  
        </div><!--m-community-container-->
                 
</body>
</html>