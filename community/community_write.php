<?php
     require_once("C:/xampp/htdocs/TermProject/tools.php");
     require_once("./CommunityDao.php");
     session_start_if_none();

     $title = requestValue("title");
     $content = requestValue("content");
     $unickname = sessionVar("unickname");  //$unickname변수에 사용자의 닉네임 저장
     $ucountry = sessionVar("ucountry"); //$country에 사용자의 국적을 저장

     
     if($ucountry == "한국"){
        $countryImg = "/TermProject/projectImage/board/korea.png"; 
     }else if($ucountry == "일본"){
        $countryImg = "/TermProject/projectImage/board/japan.png";
     }
     
    //  $title = str_replace("  ","&nbsp;&nbsp;",$title);
    //  $title = str_replace("<", "&lt", $title);
    //  $title = str_replace(">", "&gt", $title);

    //  $content = str_replace("  ","&nbsp;&nbsp;",$content);
    //  $content = str_replace("<", "&lt", $content);
    //  $content = str_replace(">", "&gt", $content);



     
     if($title && $unickname && $content && $countryImg ){
        
        $dao = new CommunityDao();
        $dao->insertMsg($countryImg,$title,$unickname,$content);
        okGo("글 작성이 완료되었습니다.","community.php");
     }else{
        errorBack("모든 항목이 빈칸없이 입력되어야 합니다.");
     }
     

?>