<?php
    // 회원 프로필 업데이트 처리 php

    require_once("C:/xampp/htdocs/TermProject/tools.php");
    require_once("C:/xampp/htdocs/TermProject/member/MemberDao.php");

    session_start_if_none();
    $id =  sessionVar("uid");//$id 변수에 사용자의 id저장 
    $selfContest = requestValue("selfContext");
    $email = requestValue("email");
    $dao = new MemberDao();
    
    if($id && $selfContest && $email){
        $dao->updateMember($id,$selfContest,$email);
        $_SESSION["uselfContest"] = $selfContest;
        okGo("회원 정보가 수정되었습니다.","../index.php");
    }else if($selfContest){
        $dao->updateMemberselfContext($id,$selfContest);
        $_SESSION["uselfContest"] = $selfContest;
        okGo("회원 정보가 수정되었습니다.","../index.php");
    }else if($email){
        $dao->updateMemberEmail($id,$email);
        okGo("회원 정보가 수정되었습니다.","../index.php");    
    }else{
        errorBack("회원 정보 수정을 할 수 없습니다.");
    }


?>