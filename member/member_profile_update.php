<?php
    // 회원 프로필 업데이트 처리 php

    require_once("C:/xampp/htdocs/TermProject/tools.php");
    require_once("C:/xampp/htdocs/TermProject/member/MemberDao.php");

    session_start_if_none();
    $id =  sessionVar("uid");//$id 변수에 사용자의 id저장 
    $selfContest = requestValue("selfContext");

    if($selfContest){
        $dao = new MemberDao();
        $dao->updateMember($id,$selfContest);
        okGo("회원 정보가 수정되었습니다.","../index.php");
    }else{
        okGo("회원 정보가 수정되었습니다.","../index.php");
    }


?>