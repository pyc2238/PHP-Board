<?php
    require_once("C:/xampp/htdocs/TermProject/tools.php");
    require_once("./CommunityDao.php");

    //전달된 값 저장
    $num = requestValue("num");
    $page = requestValue("page");
    
    
    $title = requestValue("title");
    $content = requestValue("content");

    $title = str_replace("  ","&nbsp;&nbsp;",$title);
    $title = str_replace("<", "&lt", $title);
    $title = str_replace(">", "&gt", $title);

    $content = str_replace("  ","&nbsp;&nbsp;",$content);
    $content = str_replace("<", "&lt", $content);
    $content = str_replace(">", "&gt", $content);

    //모든 항목이 값이 있으면 업데이트
    if($num && $title && $content){
        $dao = new CommunityDao();
        $dao-> updateMsg($num,$title,$content);
        //글 목록 페이지로 복귀
        okGo("게시물 수정이 완료되었습니다.",bdUrl("community.php",0,$page));
    }else{
        errorBack("모든 항목이 빈칸 없이 입력되어야 합니다.");
    }

?>