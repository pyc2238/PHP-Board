<?php
     require_once("C:/xampp/htdocs/TermProject/tools.php");
     require_once("C:/xampp/htdocs/TermProject/member/MemberDao.php");
     require_once('PHPMailer-master/PHPMailerAutoload.php');
     $id = requestValue("id");
     $dao = new MemberDao();  
     $pw = "@zxc123456";
     $member = $dao->getMember($id);
     
     //회원 비밀번호 변경
     $dao->updatePassword($id,$pw);
     
     $mail = new PHPMailer(true); //진짜 매개 변수는 우리가 잡아야 할 오류에 예외를 두는 것을 의미합니다
     
     $mail->IsSMTP(); // 클래스에 SMTP 사용 지시
     
     
       $mail->CharSet ="EUC_KR"; //한글 인코딩
       $mail->Encoding ="base64";  //한글 인코딩
       $mail->Host       = "smtp.naver.com"; // SMTP server
       // $mail->SMTPDebug  = 2;                     // SMTP 디버그 정보 사용
       $mail->SMTPAuth   = true;                  // SMTP 인증 사용
       $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
       $mail->Host       = "smtp.naver.com"; // 네이버 smtp서버 주소
       $mail->Port       = 465;                    // GMAIL 서버의 SMTP 포트 설정
       $mail->Username   = "pyc2238@naver.com"; //SMTP 계정 사용자 이름
       $mail->Password   = "@zxc1268618";        // SMTP 계정 사용자 패스워드
       $mail->AddAddress($member['email']);  //수신자<이메일>
       $mail->SetFrom('pyc2238@naver.com',"NEITTER"); //보낸사람<이메일>
       $mail->AddReplyTo('pyc2238@naver.com');
       $mail->FromName = iconv("UTF-8", "EUC-KR", "보근");  //발신자의 이름
       $mail->Subject = iconv("UTF-8","EUC-KR","NEITTER - 비밀번호 찾기 결과"); //제목
    //    $mail->Body = iconv("UTF-8", "EUC-KR", "<h1>This is a test</h1>");  //내용 / html파일이 첨부되지 않으면  Body파일이 전송된다.
    //    $mail->AltBody = iconv("UTF-8", "EUC-KR", "텍스트  This is text only alternative body.");
       $mail->MsgHTML(file_get_contents('mailHtml.html')); //html파일
       // $mail->AddAttachment('우마루.jpg');      // 첨부 파일 (attachment)
       // $mail->AddAttachment('test.gif'); // attachment
       // $mail->AddAttachment('우마루2.png'); // attachment
     
       if(!$mail->Send())  //$mail변수의 값이 존재하지 않는다면 전송실패
       {
         //메일 전송 실패시
          echo "Error sending: " . $mail->ErrorInfo;;
       }
       else
       {
         //메일 전송 성공시
        //   echo "Letter is sent";
       }
    
?>

<!DOCTYPE html>
<html lang="en">   
    <title>Finded ID</title>
    <link rel="stylesheet" href="../member.css"> <!--member css-->
    <link rel="stylesheet" href="/TermProject/icon/css/font-awesome.min.css">   <!--fontAresome-->
    <body>     
      
        <div id="member-m-container">
                <?php require("C:/xampp/htdocs/TermProject/header.php") ?>
            <div id="member-finded-container">
                
        <div class="container">
            <h3>NEITTER-회원 비밀번호 찾기 결과</h3>
            <hr>
            <br>
            <br> 
            <br>        
        <div class="row">
            <div class="col-sm">
                <hr>
                <div id="finedId">
                        <h1><i class="fa fa-id-email"></i>확인된 회원님의 이메일을 확인하시기 바랍니다. </h1>
                </div>
                <hr>
            <br>
            <br>
            <br>
                <div id="profileCheckBox">
                    <button class="btn btn-outline-warning" type="button" onclick="location.href='/TermProject/index.php'">&nbsp;&nbsp;&nbsp;&nbsp;홈으로&nbsp;&nbsp;&nbsp;&nbsp;</button>
                </div> 
        
              </div> <!--그리드 박스-->                
                </div><!--end of row--> 
            </div>  <!--end of containar-->

                </div><!--end of member-s-container-->
                <?php require("C:/xampp/htdocs/TermProject/footer.php") ?>      
        </div><!--end of member-m-container-->
       
    </body>
</html>