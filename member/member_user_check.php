<?php
    // 회원의 비밀번호 체크를 처리하는 php
    //-넘겨받은 값을 받고 해당 비밀번호가 데이터베이스의 비밀번호와 일치할 경우 member_profile.php로 이동-
    require_once("C:/xampp/htdocs/TermProject/tools.php");
    require_once("C:/xampp/htdocs/TermProject/member/MemberDao.php");

    session_start_if_none();
    $id =  sessionVar("uid");//$id 변수에 사용자의 id저장 
    $pw = requestValue("pw");

    if($pw){    // $pw값이 존재하면
        $dao = new MemberDao();
        $member = $dao->getMember($id);
        if($member && $member["pw"] == $pw){    //db사용자의 아이디의 비밀번호와 $pw가 일치한다면
            goNow("member_profile.php");
        }else{
            errorBack("비밀번호가 올바르지 않습니다.");    
        }
    }else{
        errorBack("비밀번호를 입력하십시오.");
    }
?>