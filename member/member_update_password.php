<?php
  // 회원 비밀번호 수정 처리 php

  require_once("C:/xampp/htdocs/TermProject/tools.php");
  require_once("C:/xampp/htdocs/TermProject/member/MemberDao.php");

  session_start_if_none();
  $id =  sessionVar("uid");//$id 변수에 사용자의 id저장 
  $pw = requestValue("pw");
  $new_pw = requestValue("new_pw");
  $new_pw_check = requestValue("new_pw_check");
  //비밀번호 정규표현식 비밀번호 8~15자 사이에 영문,숫자,특수문자가 필수로 들어가야 할 경우
  $pattern = '/^.*(?=^.{8,15}$)(?=.*\d)(?=.*[a-zA-Z])(?=.*[!@#$%^&+=]).*$/';
  $dao = new MemberDao();
  $member = $dao->getMember($id);

  
  if($member && $member["pw"] == $pw){  //해당 아이디의 비밀번호와 현재 비밀번호가 일치할 경우 
    if(preg_match($pattern ,"$new_pw")){  //비밀번호의 패턴을 체크
      if($new_pw == $new_pw_check){ //바꿀 비밀번호와 비밀번호 체크가 맞으면
        $pw = $new_pw_check;
        $dao->updatePassword($id,$pw);
        session_destroy();  //로그아웃 후 바뀐 비밀번호로 다시 로그인
        okGo("회원정보 수정이 완료되었습니다.","../index.php");
    }else{
      errorBack("비밀번호가 일치하지 않습니다.");
    }  
  }else{
    errorBack("비밀번호의 형식이 옳바르지 않습니다.");
  }
}else{
        errorBack("현재 비밀번호가 옳바르지 않습니다.");
  }
?>