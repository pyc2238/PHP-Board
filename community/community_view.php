<!-- 게시판 메인 페이지 -->
<?php 
    require_once("C:/xampp/htdocs/TermProject/tools.php");
    require_once("./CommunityDao.php");
    $dao = new CommunityDao();
    session_start_if_none();
    $uid = sessionVar("uid");
    $num = requestValue("num");
    $page = requestValue("page"); 
    $result = $dao->getMsg($num);
    $search = requestValue("search");
    $searchChoice = requestValue("searchChoice");
    
    
    ?>

 <script>
     function choice (num,page){
        var choice = confirm("해당 게시글을 삭제하시겠습니까?");
        if(choice){
            location.href ="community_delete.php?num="+num+"&page="+page;
        }
    }
</script>
<!DOCTYPE html>
<html lang="en">
<head>

  <link rel="stylesheet" href="/TermProject/community/community.css"> <!--forum css-->
  <link rel="stylesheet" href="/TermProject/community/board.css"> <!--forum css-->
  <link rel="stylesheet" href="/TermProject/icon/css/font-awesome.min.css">   <!--fontAresome-->
      <title>Main Page</title>

    <?php
        require("C:/xampp/htdocs/TermProject/html_head.php");
    ?>

    <style>

    

 #sombra_fija{
    -webkit-transform: translateX(0);
    }

#sombra_fija:before{
    content: '';
    position: absolute;
    width: 90%;
    top: 100%;
    left: 5%;
    height: 10px;
    background: -webkit-radial-gradient(
        center, ellipse,
        rgba(0,0,0,0.30) 0%,
        rgba(0,0,0,0) 80%);
    -webkit-transition-duration: 0.5s;
    opacity: 0;
}

#sombra_fija:hover{
    -webkit-transform: translateY(-5px);    
}
#sombra_fija:hover:before{
    -webkit-transform: translateY(5px);
    opacity: 1;
}



    
    </style>
</head>


<body>
    <div id="m-community-container">     
        <?php require("C:/xampp/htdocs/TermProject/header.php") ?> 
        <div  class = "row" id="s-community-container_view" style="overflow:auto">
       
        <div class="col">
        <h4><img src="<?= $result["country"]?>">&nbsp;<?=$result["title"] ?></h4>
        <hr>
        <table class = "table">
                <thead>
                    <tr style="height:1px">
                        <th>글쓴이</th>
                        <th><?=$result["writer"] ?></th>
                        <th>작성일</th>
                        <th><?=$result["regtimeFul"] ?></th>
                        <th>조회</th>
                        <th><?=$result["hits"] ?></th>
                        <th>추천</th>
                        <th><?=$result["commend"] ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="6"><?=$result["content"] ?></td>
                    </tr>
                </tbody>
            </table>


        </div><!--end of /col -->
        
        
        </div><!--"s-community-container-->
        <div class="container">
            
            <!-- <div class="col" style="border:1px solid red; "></div> -->

            <div class="col text-center">
                <button class="btn btn-outline-warning" id="sombra_fija" type="button" title="추천" onclick="location.href='<?= bdUrl('increase_commend.php',$num,$page,0,0) ?>'"><h2><i class="fa fa-star"></i></h2></button>
                <button class="btn btn-outline-warning" id="sombra_fija" type="button" title="수정" onclick="location.href='<?= bdUrl('community_update_form.php',$num,$page,0,0) ?>'"><h2><i class="fa fa-pencil"></i></h2></button>
                <button class="btn btn-outline-warning" id="sombra_fija" type="button" title="삭제" onclick=" choice (<?= $num ?>,<?= $page ?>)"><h2><i class="fa fa-trash"></i></h2></button>
                <button class="btn btn-outline-warning" id="sombra_fija" type="button" title="목록" onclick="location.href='<?= bdUrl('community.php',0,$page,$searchChoice,$search) ?>'"><h2><i class="fa fa-list"></i></h2></button>
            </div>
        </div><!-- conatiner -->

      <?php require("C:/xampp/htdocs/TermProject/footer.php") ?>  
    </div><!--m-community-container-->   
  </body>
</html>