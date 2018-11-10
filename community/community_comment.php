<?php
    require_once("C:/xampp/htdocs/TermProject/tools.php");
    require_once("./CommunityDao.php");
    session_start_if_none();
    $boardNum = requestValue('boardNum');
    $writer = sessionVar('unickname');
    $country = sessionVar("ucountry");
    $comment = requestValue('comment');
    $page = requestValue('page');
   

    $comment = str_replace("  ","&nbsp;&nbsp;",$comment);
    $comment = str_replace("<", "&lt", $comment);
    $comment = str_replace(">", "&gt", $comment);


    if($country == "한국"){
        $countryImg = "/TermProject/projectImage/board/korea2.png"; 
     }else if($country == "일본"){
        $countryImg = "/TermProject/projectImage/board/japan2.png";
     }


    $dao = new CommunityDao();

    $dao->insertComment($boardNum,$writer,$comment,$countryImg);
    goNow(bdUrl('community_view.php',$boardNum,$page,0,0));
  
    
?>