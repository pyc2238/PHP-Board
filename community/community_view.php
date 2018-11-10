<!-- 게시판 메인 페이지 -->
<?php 
    require_once("C:/xampp/htdocs/TermProject/tools.php");
    require_once("./CommunityDao.php");
    $dao = new CommunityDao();
    session_start_if_none();
    $uid = sessionVar("uid");
    $uip = $_SERVER['REMOTE_ADDR'];
    $unickName = sessionVar('unickname');
    $num = requestValue("num");
    $page = requestValue("page"); 
    $search = requestValue("search");
    $searchChoice = requestValue("searchChoice");
    $result = $dao->getMsg($num);
    $comment = $dao->getCommentMsg($num);
    $_SESSION['boardNum'] = $num;   //세션에 게시판 넘버를 저장

    $increaseHitsIp = $dao->getHitsIp($num, $uip);  //사용자의 ip값으로 레코드를 받아온다.
    $increaseHits = $dao->getHitsId($num, $uid);    //사용자의 id값으로 레코드를 받아온다.
   
     

    if(!$uid){  // 사용자의 로그인 여부판단
       if(!$increaseHitsIp){    //해당 ip로 저장된 레코드가 존재하지않다면
           $dao->insertHitIp($uip,$num);   //데이터베이스에 ip와 게시판 번호를 저장
            $dao->increaseHits($num);   //조회수 1 증가
       } 
    }else{
        if(!$increaseHits){ //해당 id로 저장된 레코드가 존재하지 않다면
            $dao->insertHitId($uid,$num);   //데이터베이스에 id와 게시판 번호를 저장
            $dao->increaseHits($num);   //조회수 1 증가
        }
        
    }



 
    
  
    

    
?>

<script>
    function choice (num,page){
        var choice = confirm("해당 게시글을 삭제하시겠습니까?");
        if(choice){
            location.href ="community_delete.php?num="+num+"&page="+page;
        }
    }

      function choiceComment (commentNum,page){
        var choice = confirm("해당 댓글을 삭제하시겠습니까?");
        if(choice){
            location.href ="community_delete_comment.php?id="+commentNum+"&page="+page;
        }
    }
   
   </script>

       


<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="/TermProject/community/community.css">
    <!--forum css-->
    <link rel="stylesheet" href="/TermProject/community/board.css">
    <!--forum css-->
    <link rel="stylesheet" href="/TermProject/icon/css/font-awesome.min.css">
    <!--fontAresome-->
    <title>Main Page</title>

    <?php
        require("C:/xampp/htdocs/TermProject/html_head.php");
    ?>

    <style>
        /* 맨 위 페이지 버튼 */
        a#MOVE_TOP_BTN {
            position: fixed;
            right: 1%;
            bottom: 50px;
            display: none;
            z-index: 999;
        }
        /* 댓글 이동 버튼 */
         a#MOVE_COMMENT_BTN {
            position: fixed;
            right: 7%;
            bottom: 50px;
            display: none;
            z-index: 999;
        }
    </style>
</head>

        <script>
            $(document).on("click",".translation > button",function(){
                if($(this).next().css("display")=="none"){
                    $(this).next().show();
                    
                }else{
                    $(this).next().hide();
                    
                }
            });
        </script>
        <script>    //페이지 맨위로 가기 
            $(function() {  
                $(window).scroll(function() {
                    if ($(this).scrollTop() > 300) {    //스크롤이  500px보다 커질 때
                        $('#MOVE_TOP_BTN').fadeIn();
                    } else {
                        $('#MOVE_TOP_BTN').fadeOut();
                    }
                });
                
                $("#MOVE_TOP_BTN").click(function() {
                    $('html, body').animate({
                        scrollTop : 0
                    }, 400);
                    return false;
                });
            });

              $(function() {  
                $(window).scroll(function() {
                    if ($(this).scrollTop() > 300) {    //스크롤이  200px보다 커질 때
                        $('#MOVE_COMMENT_BTN').fadeIn();
                    } else {
                        $('#MOVE_COMMENT_BTN').fadeOut();
                    }
                });
            });
            function fnMove(){
             var offset = $("#commentBox").offset();
            $('html, body').animate({scrollTop : offset.top}, 400);
    }
</script>

        

<body>
    <div id="m-community-container">
        <?php require("C:/xampp/htdocs/TermProject/header.php") ?>
        <div class="row" id="s-community-container_view">

        <a id="MOVE_TOP_BTN" href="#"><img src="/TermProject/projectImage/board/top.png" alt="back-to-top"></a>
        <a id="MOVE_COMMENT_BTN" href="#commentBox" style='color:red' onclick='fnMove()'><img src="/TermProject/projectImage/board/comment.png" alt="back-to-comment"></a>
        
            <div class="col">
               
                <h4><img src="<?= $result["country"]?>">&nbsp;
                            <?=$result["title"] ?>
                </h4>

                <hr>

                <table class="table">
                    <thead>
                        <tr style="height:1px">
                            <th>글쓴이</th>
                            <th>
                                <?=$result["writer"] ?>
                            </th>
                            <th>작성일</th>
                            <th>
                                <?=$result["regtimeFul"] ?>
                            </th>
                            <th style="width:55px;">조회</th>
                            <th>
                                <?=$result["hits"] ?>
                            </th>
                            <th style="width:55px;">추천</th>
                            <th>
                                <?=$result["commend"] ?>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="6">
                                <?=$result["content"] ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                

                <div class="col translation float-right">
                    <button class='btn btn-warning'><b>일본어로 보기</b></button>
                    <div style="display:none; border:1px dashed gray;"> 
                        <div>
                            <h4><?= translation($result["title"]) ?></h4>
                            <br>
                            <br>
                            <br>
                            <br>
                            <?=  translation($result['content']) ?>
                        </div>
                    </div>
                </div>

                    
                </div><!--end of col -->
            </div><!--end of row -->


        <div class='container' id='commentBox'>
            <?php if($comment) :?>
            <?php foreach($comment as $row) : ?>
            <?php  $translation = translation($row['comment']);?>
            
            <div class="row" style='margin-top:5px;'>

                <div class="col commentBoxfirst" style='height:27px'>

                    <p style='font-size:15px; display:inline-block;'><img src="<?= $row['country']?>" alt="country">
                        <?= $row['writer'] ?>
                    </p>
                    <p class='float-right' style='font-size:15px; '>
                        <?= $row['comment_time']?>
                        <?php if($unickName == $row['writer']): ?>
                            <i class="fa fa-edit updateBtn pnt" style='color:blue' title='수정' id='updateBtn<?=$row['id']?>'></i>
                            <i class="fa fa-trash pnt" style='color:red' title='삭제' onclick="choiceComment(<?= $row['id'] ?>,<?= $page ?>)"></i>
                            <i class="fa fa-exchange pnt" style='color:#06f890' title='번역' id='translation<?=$row['id']?>'></i>  
                        <?php else: ?>
                            <i class="fa fa-exchange pnt" style='color:#06f890' title='번역' id='translation<?=$row['id']?>'></i>
                            <i class="fa fa-bullhorn pnt" style='color:red' title='신고'></i>
                        <?php endif?>
                    </p>
                    
                </div>

                <div class="w-100"></div>

                <div class="col commentBoxsecound" id='comment<?=$row['id']?>' >
                    <p>
                        <?=$row['comment']?>
                    </p>
                
                </div>
       
            </div>
            
         <script>    
                        (function () {
                        var updateTextArea = "";
                        updateTextArea = "<div class='row'>"
                            +"<div class='col' id='comments<?=$row['id']?>'>"
                                +"<form class='form-group' action='<?= bdUrl('community_comment_update.php',$num,$page,0,0) ?>' method='post'>"
                                    +"<input type='hidden' name='id' value='<?= $row['id']?>'>"
                                    +"<div class='row'>"
                                        +"<div class='col-10'>"
                                            +"<textarea name='comment' class='form-control' style='resize: none;' id='commentText' rows='3' required> <?=$row['comment']?></textarea>"
                                        +"</div>"
                                        + "<div class='col-2'><input type='submit' class='btn btn-outline-danger' value='수정' id='commentWrite'>"
                                            +"<i id='closeBtn<?=$row['id']?>' title='닫기' class='float-right pnt'>x</i>"
                                        +"</div>"
                                +"</form>"
                            +"</div>"
                        +"</div>";
                        $("#updateBtn<?=$row['id']?>").on('click',function(){   //updateBtn클릭시
                            if($('#comments<?=$row['id']?>').length == 0){  //comments가 생성되지않았다면
                                $("#comment<?=$row['id']?>").append(updateTextArea);    //comment라는 id를 가진 dom의 안에 생성
                                $("#closeBtn<?=$row['id']?>").on('click',function(){    // closeBtn클릭시 
                                $('#comments<?=$row['id']?>').remove(); //comments 취소
                                });
                            }else {
                                return ;
                            } 
                        });
                            
                    })();
                </script>
                <script>    
                    (function () {
                    var updateTextArea = "";
                    updateTextArea = "<div class='row'>"
                    +"<div class='col' id='comments<?=$row['id']?>'>"
                            +"<div class='form-group'>" 
                                +"<div class='row'>"
                                    +"<div class='col-11'>"
                                        +"<textarea name='comment' class='form-control' style='resize: none; background-color:#f6faf8;' id='commentText' rows='1' readonly required> <?=$translation?></textarea>"
                                    +"</div>"
                                    + "<div class='col-1'>"
                                    +"<i id='closeBtn<?=$row['id']?>' title='닫기' class='pnt'>x</i>"
                                +"</div>"
                            +"</div>"            
                        +"</div>"
                    +"</div>";
                    $("#translation<?=$row['id']?>").on('click',function(){   //updateBtn클릭시
                        if($('#comments<?=$row['id']?>').length == 0){  //comments가 생성되지않았다면
                            $("#comment<?=$row['id']?>").append(updateTextArea);    //comment라는 id를 가진 dom의 안에 생성
                            $("#closeBtn<?=$row['id']?>").on('click',function(){    // closeBtn클릭시 
                            $('#comments<?=$row['id']?>').remove(); //comments 취소
                            });
                        }else {
                            return ;
                        } 
                    });
                        
                })();
            </script>
        <?php endforeach ?>

            <?php endif ?>
    <?php if($uid): ?>
            <div class="row">
                <div class="col" id="comments">
                    <form class="form-group" action="<?= bdUrl('community_comment.php',0,$page,0,0) ?>" method='post'>
                        <input type="hidden" name='boardNum' value='<?= $num ?>'>
                        <div class="row">
                            <div class="col-10"><textarea name="comment" class='form-control' style='resize: none;' id='commentText' rows="3" placeholder='댓글을 작성하세요...' required></textarea></div>
                            <div class="col-2"><input type="submit" class="btn btn-outline-info" value='글쓰기' id='commentWrite'></div>
                    </form>
                </div>
            </div>
      <?php endif ?>      
        </div>
        <!--end of row-->
        <!-- <div class="col" style="border:1px solid red; "></div> -->
        <?php if(!$uid):?>
        <div class="col text-center" style='margin-top:243px'>
        <?php else :?>
        <div class="col text-center">
        <?php endif?>
            <button class="btn btn-outline-warning" id="sombra_fija" type="button" title="추천" onclick="location.href='<?= bdUrl('community_increase_commend.php',$num,$page,$searchChoice,$search) ?>'">
                <h2><i class="fa fa-star"></i></h2>
            </button>
            <button class="btn btn-outline-warning" id="sombra_fija" type="button" title="수정" onclick="location.href='<?= bdUrl('community_update_form.php',$num,$page,$searchChoice,$search) ?>'">
                <h2><i class="fa fa-pencil"></i></h2>
            </button>
            <button class="btn btn-outline-warning" id="sombra_fija" type="button" title="삭제" onclick=" choice (<?= $num ?>,<?= $page ?>)">
                <h2><i class="fa fa-trash"></i></h2>
            </button>
            <button class="btn btn-outline-warning" id="sombra_fija" type="button" title="목록" onclick="location.href='<?= bdUrl('community.php',0,$page,$searchChoice,$search) ?>'">
                <h2><i class="fa fa-list"></i></h2>
            </button>
        </div>
    </div><!-- conatiner -->
         <?php require("C:/xampp/htdocs/TermProject/footer.php") ?>
    </div>
    <!--m-community-container-->
</body>

</html>