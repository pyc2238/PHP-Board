<?php
    //회원 로그아웃 처리 php
    
    require_once("C:/xampp/htdocs/TermProject/tools.php");

    session_start_if_none();    //session_start
    unset($_SESSION["uid"]);    //세션에 저장된 id삭제
    unset($_SESSION["unickname"]);  //세션에 저장된 닉네임 삭제

    okGo("로그아웃 완료되었습니다.","../index.php");    //삭제 완료시 메인페이지로 이동

?>