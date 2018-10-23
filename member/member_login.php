<?php
    // 회원 로그인 처리 php

    require_once("C:/xampp/htdocs/TermProject/tools.php");
    require_once("C:/xampp/htdocs/TermProject/member/MemberDao.php");


    // form에서 넘어온 id와 pw 값을 받아온다.
    $id = requestValue("id");
    $pw = requestValue("pw");


    if($id && $pw){ //$id와 $pw에 값이 잘 넘어왔는지 확인
        if($id != " " && $pw != " " ){  //$id와 $pw가 공백문자인지 확인
              $dao = new MemberDao();   
              $member = $dao->getMember($id);
              if($member && $member["pw"] == $pw){ //$member의 값으로 회원의 아이디가 존재하고 db의 pw의 값과 $pw의 값이 일치하는지 확인
                session_start_if_none();
                $_SESSION["uid"] = $id;
                $_SESSION["unickname"] = $member["nickname"];
                okGo("로그인 완료되었습니다.","../index.php");
              }else{
                errorBack("회원정보가 존재하지 않습니다.");      
              }
        }else{
            errorBack("아이디와 비밀번호에 공백을 포함할 수 없습니다.");
        }
    }else{
        errorBack("아이디와 비밀번호를 입력하시오.");
    }
?>