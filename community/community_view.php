<!-- 게시판 메인 페이지 -->
<?php 
    require_once("C:/xampp/htdocs/TermProject/tools.php");
    require_once("./CommunityDao.php");
    $dao = new CommunityDao();
    session_start_if_none();
    $uid = sessionVar("uid");
    $unickName = sessionVar('unickname');
    $num = requestValue("num");
    $page = requestValue("page"); 
    $result = $dao->getMsg($num);
    $search = requestValue("search");
    $searchChoice = requestValue("searchChoice");
    $comment = $dao->getCommentMsg($num);

    $_SESSION['boardNum'] = $num;   //세션에 게시판 넘버를 저장

    
    
    
    ?>

<script>
    function choice (num,page){
        var choice = confirm("해당 게시글을 삭제하시겠습니까?");
        if(choice){
            location.href ="community_delete.php?num="+num+"&page="+page;
        }
    }

      function choiceComment (commentNum){
        var choice = confirm("해당 댓글을 삭제하시겠습니까?");
        if(choice){
            location.href ="community_delete_comment.php?id="+commentNum;
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

<!-- <script>
    //id와 comment값을 넘겨주어야한다. 
    // 댓글마다 생성되어야한다.
    //x클릭시 jquery 생성 제거

    $(document).ready(function(){
        
       var updateTextArea = "<div class='row'><div class='col' id='comments'>"
       +"<form class='form-group' action='community_comment_update.php' method='post'>"
       +"<div class='row'>"
       +"<input type='hidden' name='boardNum' value=''>" 
       +"<div class='col-10'><textarea name='comment' class='form-control' id='commentText' rows='3' required></textarea></div>"
       + "<div class='col-2'><input type='submit' class='btn btn-outline-danger' value='수정' id='commentWrite'><a id='close' class='float-right'>x</a></div>"
       +"</form>"
       +"</div>"
       +"</div>";
       $(".updateBtn").one('click',(function(){
            $(".commentBoxsecound").append(updateTextArea);
            $('#close').removeAttr('append');
       }));

   });
</script> -->
    <style>

#close:hover{
    color:red;
    text-decoration:none;
}

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
        <div class="row" id="s-community-container_view" style="overflow:auto">

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
                            <th>조회</th>
                            <th>
                                <?=$result["hits"] ?>
                            </th>
                            <th>추천</th>
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


            </div>
            <!--end of /col -->


        </div>
        <!--"s-community-container-->
        <div class='container'>
            <?php if($comment) :?>
            <?php foreach($comment as $row) : ?>

            <div class="row" style='margin-top:5px;'>

                <div class="col commentBoxfirst" style='height:27px'>

                    <p style='font-size:15px; display:inline-block;'><img src="<?= $row['country']?>" alt="country">
                        <?= $row['writer'] ?>
                    </p>
                    <p class='float-right' style='font-size:15px; '>
                        <?= $row['comment_time']?>
                        <?php if($unickName == $row['writer']): ?>
                            <i class="fa fa-edit updateBtn" id='updateBtn<?=$row['id']?>'></i>
                            <i class="fa fa-trash" style='color:red' onclick="choiceComment(<?= $row['id'] ?>)"></i>       
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
                        updateTextArea = "<div class='row'><div class='col' id='comments<?=$row['id']?>'>"
                        +"<form class='form-group' action='community_comment_update.php' method='post'>"
                        +"<input type='hidden' name='id' value='<?= $row['id']?>'>"
                        +"<div class='row'>"
                        +"<input type='hidden' name='boardNum' value=''>" 
                        +"<div class='col-10'><textarea name='comment' class='form-control' id='commentText' rows='3' required> <?=$row['comment']?></textarea></div>"
                        + "<div class='col-2'><input type='submit' class='btn btn-outline-danger' value='수정' id='commentWrite'><i id='closeBtn<?=$row['id']?>' class='float-right'>x</i></div>"
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
            <?php endforeach ?>

            <?php endif ?>
    <?php if($uid): ?>
            <div class="row">
                <div class="col" id="comments">
                    <form class="form-group" action="community_comment.php" method='post'>
                        <div class="row">
                            <input type="hidden" name='boardNum' value='<?= $num ?>'>
                            <div class="col-10"><textarea name="comment" class='form-control' id='commentText' rows="3" required></textarea></div>
                            <div class="col-2"><input type="submit" class="btn btn-outline-info" value='글쓰기' id='commentWrite'></div>
                    </form>
                </div>
            </div>
      <?php endif ?>      
        </div>
        <!--end of row-->
        <!-- <div class="col" style="border:1px solid red; "></div> -->

        <div class="col text-center">
            <button class="btn btn-outline-warning" id="sombra_fija" type="button" title="추천" onclick="location.href='<?= bdUrl('increase_commend.php',$num,$page,0,0) ?>'">
                <h2><i class="fa fa-star"></i></h2>
            </button>
            <button class="btn btn-outline-warning" id="sombra_fija" type="button" title="수정" onclick="location.href='<?= bdUrl('community_update_form.php',$num,$page,0,0) ?>'">
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