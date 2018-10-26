<?php
     require_once("C:/xampp/htdocs/TermProject/tools.php");
     require_once("./BoardDao.php");
     session_start_if_none();

     $title = requestValue("title");
     $content = requestValue("content");
     $unickname = sessionVar("unickname");  //$unickname변수에 사용자의 닉네임 저장
     $upw = sessionVar("upw");
     
     $dao = new BoardDao();
     
     if($title && $unickname && $content){
        $dao = new BoardDao();
        $dao->insertMsg($title,$unickname,$content);
        okGo("글 작성이 완료되었습니다.","board.php");
     }else{
        errorBack("모든 항목이 빈칸없이 입력되어야 합니다.");
     }
     

?>