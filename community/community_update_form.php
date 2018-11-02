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
<!-- <script type="text/javascript" src="/TermProject/community/naverSmartEdit/nse_files/js/HuskyEZCreator.js" charset="utf-8"></script> -->
<script src="ckeditor/ckeditor.js"></script>
   
    <title>update_form</title>

    <?php
        require("C:/xampp/htdocs/TermProject/html_head.php");
    ?>
</head>


<style>
    form input{margin-right:20px;}
</style>


<script>
     function choice (num,page){
        var choice = confirm("해당 게시글을 삭제하시겠습니까?");
        if(choice){
            location.href ="community_delete.php?num="+num+"&page="+page;
        }
    }
</script>


<body>
    <div id="m-community-container">     
        <?php require("C:/xampp/htdocs/TermProject/header.php") ?> 
        <div id="s-community-container">
        
    
   <div class="container">

    <h2>NEITTER-글 수정</h2><hr>
            <form action="<?= bdUrl("community_update.php",$num,$page,0,0)?>" method="post" >
            <table border="2" class="table">
                <tr>
                    <td style="text-align:center;"><b>Title</b></td>
                    <td><input type="text" class="form-control"  name="title" autocomplete=off value="<?= $member["title"] ?>"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <textarea name="content" id="content"><?= $member["content"] ?></textarea>
                        <script type="text/javascript">
                             CKEDITOR.replace('content');
                        </script>
                    </td>
                </tr>
            </table>
            <br>
            <hr>
                <input class="btn btn-outline-danger float-right" type="button" value="삭제" onclick="choice(<?= $num ?>,<?= $page ?>);">
                <input class="btn btn-outline-warning float-right" type="button" value="목록" onclick="location.href='<?= bdUrl('community.php',0,$page,0,0) ?>'">
                <input class="btn btn-outline-primary float-right" type="submit" value="수정" onclick="submitContents(this)" />             
        </form>
        </div><!--contanier-->

        </div>
            <?php require("C:/xampp/htdocs/TermProject/footer.php") ?>  
        </div><!--m-community-container-->
                 
</body>
</html>