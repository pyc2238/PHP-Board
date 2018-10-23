<?php
    // 회원 아이디 탈퇴를 처리하는 php

    require_once("C:/xampp/htdocs/TermProject/tools.php");
    require_once("C:/xampp/htdocs/TermProject/member/MemberDao.php");

     session_start_if_none();
    
     $id = sessionVar("uid");
     
     if($id){
        $dao = new MemberDao();
        $dao->deleteMember($id);
        session_destroy();
        okGo("회원 탈퇴가 완료되었습니다.","../index.php");
       
     }

         
 ?>