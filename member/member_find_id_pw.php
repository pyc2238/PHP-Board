<?php
    require_once("C:/xampp/htdocs/TermProject/tools.php");
    require_once("C:/xampp/htdocs/TermProject/member/MemberDao.php");

    $id = requestValue("id");
    $email = requestValue("email");
    $dao = new MemberDao();
   
    if($id && $email){
        $member = $dao->getMember($id);
        if($member){    //DB에 $id와 같은 데이터가 존재할 떄
            if($member["email"] == $email){ // DB의 이메일과 회원이 입력한 이메일이 동일할 때
                echo "<script>alert('비밀번호 분실입니다.')</script>";
                memberUrl("./PHPMailer/member_finded_pw.php",$id);
            }else{
                errorBack("해당 아이디의 이메일 정보가 존재하지 않습니다..");    
            }
        }else{
            errorBack("해당 아이디가 존재하지않습니다.");
        }
        
        
    }else if($email){
        // echo "<script>alert('아이디 분실입니다.')</script>";
        $member = $dao->findId($email);
        echo "<script>alert('$member')</script>";
        memberUrl("./member_finded_id.php",$member);
    }

    
    
?>