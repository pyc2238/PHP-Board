<?php
      require_once("C:/xampp/htdocs/TermProject/tools.php");
      require_once("./CommunityDao.php");
      session_start_if_none();
      
      $dao = new CommunityDao();
      $uid = sessionVar('uid');
      $num = requestValue('num');
      $page = requestValue("page"); 
      $search = requestValue("search");
      $searchChoice = requestValue("searchChoice");

      $commendId = $dao->getCommendId($num, $uid);
      
     if($uid){
        if($commendId){ 
            errorBack('이미 추천을 누른 게시물입니다.');
        }else{
            $dao->insertCommentId($uid,$num);
            $dao->increaseCommend($num);
            goNow(bdUrl('community_view.php',$num,$page,$searchChoice,$search));
            
        }
    }else{
        errorBack('로그인후 이용가능합니다.');
    } 
      

?>