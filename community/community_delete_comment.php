<?php
    require_once("C:/xampp/htdocs/TermProject/tools.php");
    require_once("./CommunityDao.php");
    session_start_if_none();
    $dao = new CommunityDao();
    $commentNum = requestValue('id');
    $boardNum = sessionVar('boardNum');
    
    $dao->deleteComennt($commentNum);

    goNow(bdUrl('community_view.php',$boardNum,0,0,0));

?>