<?php
    // 회원가입 처리 php

    require_once("C:/xampp/htdocs/TermProject/tools.php");
    require_once("C:/xampp/htdocs/TermProject/member/MemberDao.php");


    // form에서 넘어온 회원정보의 값을 받는다.
    $id = requestValue("id");
    $nickname = requestValue("nickname");
    $pw = requestValue("pw");
    $gender = requestValue("gender");
    $age  = requestValue("age");
    $address = requestValue("address");
    $country = requestValue("country");
    $email = requestValue("email");

    //비밀번호 정규표현식 비밀번호 8~15자 사이에 영문,숫자,특수문자가 필수로 들어가야 할 경우
    $pattern = '/^.*(?=^.{8,15}$)(?=.*\d)(?=.*[a-zA-Z])(?=.*[!@#$%^&+=]).*$/';
    //이메일 정규표현식
    $patternEmail = '/^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/i'; 
    $dao = new MemberDao();
    $member = $dao->getMember($id);
    
   
    if($id && $nickname && $pw && $gender && $age && $address && $country && $email ){   //값이 정상적으로 들어왔을 때 
        if($id != " " && $nickname != " " && $address != " " && $email != " " ){     //공백이 아닐경우
            if(preg_match($pattern ,"$pw")){    //  비밀번호 8~15자 사이에 영문,숫자,특수문자가 포함되었을 경우
                if($member){    // 기입한 id가 현재 사용중일 경우
                    errorBack("해당 아이디는 현재 존재하므로 사용할 수 없습니다.");        
                }else{

                    if(preg_match($patternEmail ,"$email")){
                        $memberEmail = $dao->getMemberEmail($email);   //getMemberEmail을 통해 칼럼에서 입력받은 이메일과 같은 것 값을 가져온다.
                        if($memberEmail){  //해당 이메일로 이미 가입한 아이디가 있는지 체크한다.
                            errorBack("해당 이메일로 생성한 아이디가 존재합니다.");
                         }else{
                            $dao->insertMember($id,$nickname,$pw,$gender,$age,$address,$country,$email);
                            okGo("회원 가입이 완료되었습니다.","../index.php");
                         } 
                    }else{
                        errorBack("이메일의 형식이 옯바르지 않습니다.");
                    }
                }   
            }else{
                errorBack("비밀번호의 형식이 옯바르지 않습니다.");
               }
        }else{
            errorBack("공백 없이 회원 정보를 기입해 주십시오.");
        }
    }else{
        errorBack("회원정보를 확인해 주십시오.");
    }
?>