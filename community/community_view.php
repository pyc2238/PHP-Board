<!-- 게시판 메인 페이지 -->
<?php 
    require_once("C:/xampp/htdocs/TermProject/tools.php");
    require_once("./CommunityDao.php");
    $dao = new CommunityDao();
    session_start_if_none();
    $uid = sessionVar("uid");
    $num = requestValue("num");
    $page = requestValue("page"); 
    

    $result = $dao->getMsg($num);

    ?>

<style>
.col{
    border:1px solid red;
}


</style>
<!DOCTYPE html>
<html lang="en">
<head>

  <link rel="stylesheet" href="/TermProject/community/community.css"> <!--forum css-->

  <link rel="stylesheet" href="/TermProject/community/board.css"> <!--forum css-->
  <link rel="stylesheet" href="/TermProject/icon/css/font-awesome.min.css">   <!--fontAresome-->
      <title>Main Page</title>

    <?php
        require("C:/xampp/htdocs/TermProject/html_head.php");
    ?>
</head>


<body>
    <div id="m-community-container">     
        <?php require("C:/xampp/htdocs/TermProject/header.php") ?> 
        <div id="s-community-container">
        <h3>지식교류</h3>
        <hr>
        <div class="col">
            <table class = "table" border="2">
                <thead>
                    <tr>
                        <th>글쓴이</th>
                        <th><?=$result["writer"] ?></th>
                        <th>작성일</th>
                        <th><?=$result["regtimeFul"] ?></th>
                        <th>조회</th>
                        <th><?=$result["hits"] ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="6"><?=$result["content"] ?></td>
                    </tr>
                </tbody>
            </table>
        </div><!--end of col-->
    
    </div><!--"s-community-container-->
           
   
      <?php require("C:/xampp/htdocs/TermProject/footer.php") ?>  
    </div><!--m-community-container-->   
  </body>
</html>