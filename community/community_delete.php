<?php 
    //게시판 글 삭제

    require_once("./CommunityDao.php");
    require_once("C:/xampp/htdocs/TermProject/tools.php");
    session_start_if_none();
    $unickname = sessionVar("unickname");
    $num = requestValue("num");
    $page = requestValue("page");

    $dao = new CommunityDao();
    $member = $dao->getMsg($num);

    if($member["writer"] != $unickname ){
        errorBack("해당 게시물에 대한 삭제 권한이 없습니다..");
    }

    $dao->deleteMsg($num);
    
    okGo("게시물 삭제 완료되었습니다.",bdUrl("community.php",0,$page,0,0));
?>