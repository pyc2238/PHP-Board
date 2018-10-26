<!-- 게시판 메인 페이지 -->
<?php 
    require_once("C:/xampp/htdocs/TermProject/tools.php");
    require_once("./CommunityDao.php");
    $dao = new CommunityDao();
    session_start_if_none();
    $uid = sessionVar("uid");


    define("NUM_LINES",10);  //게시글 리스트의 줄 수
    define("NUM_PAGE_LINKS",2); //화면에 표시될 페이지 링크의 수


    $page = requestValue("page"); // 현재 페이지
    
    if($page < 1){  //현재 페이지의 보정
        $page = 1;
    }

    // $numPageLinks = 10; //한페이지에 출력할 페이지 링크의 수
      // $numMsgs = 10 ; //한 페이지에 출력할 게시글 수 
    $startPage = floor(($page-1)/NUM_PAGE_LINKS)*NUM_PAGE_LINKS+1;
    $endPage = $startPage + (NUM_PAGE_LINKS-1);
  
    $startRecord = ($page - 1) * NUM_LINES;    //page는 배역과 같이 0번부터 출력해야한다. 0~9 // 10~19 
    $msgs = $dao->getManyMsgs($startRecord,NUM_LINES); 
    // $count = $dao->getNumManyMsgs();    //전체 레코드의 개수
    // $totalPages = ceil($count/$NUM_LINES);    //전체 페이지수 
    
    // if($endPage > $totalPages){
        // $endPage = $totalPages;
    // }
?>


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

  
    	
    
    </div><!--"s-community-container-->
           
   
      <?php require("C:/xampp/htdocs/TermProject/footer.php") ?>  
    </div><!--m-community-container-->   
  </body>
</html>