<!-- 게시판 메인 페이지 -->
<?php 
    require_once("C:/xampp/htdocs/TermProject/tools.php");
    require_once("./BoardDao.php");
    $dao = new BoardDao();
    session_start_if_none();
    $uid = sessionVar("uid");


    define("NUM_LINES",2);  //게시글 리스트의 줄 수
    define("NUM_PAGE_LINKS",2); //화면에 표시될 페이지 링크의 수


    $page = requestValue("page"); // 현재 페이지
    
    if($page < 1){  //현재 페이지의 보정
        $page = 1;
    }

    // $numPageLinks = 10; //한페이지에 출력할 페이지 링크의 수
      // $numMsgs = 10 ; //한 페이지에 출력할 게시글 수 
    $startPage = floor(($page-1)/NUM_PAGE_LINKS)*NUM_PAGE_LINKS+1;
    $endPage = $startPage + (NUM_PAGE_LINKS-1);
  
    $startRecord = ($page - 1) * NUM_LINES;    //page는 배역과 같이 0번부터 출력해야한다. 0~9 // 10~19 
    $msgs = $dao->getManyMsgs($startRecord,NUM_LINES); 
    // $count = $dao->getNumManyMsgs();    //전체 레코드의 개수
    // $totalPages = ceil($count/$NUM_LINES);    //전체 페이지수 
    
    // if($endPage > $totalPages){
        // $endPage = $totalPages;
    // }








?>
<!DOCTYPE html>
<html lang="en">
<head>
   
<link rel="stylesheet" href="/TermProject/community/community.css"> <!--forum css-->
<link rel="stylesheet" href="/TermProject/icon/css/font-awesome.min.css">   <!--fontAresome-->
    <title>Main Page</title>
    <?php
        require("C:/xampp/htdocs/TermProject/html_head.php");
    ?>
</head>
<style>
    .container{
        border:1px solid red;
    }

    table {
    width: 100%;
    height: 200px;
  }
</style>

<script>
$(document).ready(function(){
$("#mytable #checkall").click(function () {
        if ($("#mytable #checkall").is(':checked')) {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });

        } else {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
    
    $("[data-toggle=tooltip]").tooltip();
});




</script>


<body>
    <div id="m-community-container">     
        <?php require("C:/xampp/htdocs/TermProject/header.php") ?> 
        
        <div class="row">
            <div class="col-sm-4" >
                <?php require("C:/xampp/htdocs/TermProject/community/nav.php")?>
            </div><!--end of col-sm-4-->
           
            <div class="col-sm-8" style="background-color:white">
            <br>
            <h3>지식교류</h3>
            <hr>
            <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table  class="table table-bordred table-striped">
                        <thead>
                            <!-- <th><input type="checkbox" id="checkall" /></th> -->
                            <th>번호</th>
                            <th>제목</th>
                            <th>글쓴이</th>
                            <th>날짜</th>
                            <th>조회</th>
                            <th>추천</th>
                            <!-- <th>Delete</th> -->
                            
                        </thead>
                        <tbody>
                            <?php foreach($msgs as $rows): ?>
                            <tr border="2">
                                <!-- <td><input type="checkbox" class="checkthis" /></td> -->
                                <td><?=$rows["num"]?></td>
                                <td><?=$rows["title"]?></td>
                                <td><?=$rows["writer"]?></td>
                                <td><?=$rows["regtime"]?></td>
                                <td><?=$rows["hits"]?></td>
                                <td><?=$rows["commend"]?></td>
                                <!-- 
                                <td>
                                    <p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><i class="fa fa-trash"></i></button></p>
                                </td>
                                 -->
                            </tr>
                            <?php endforeach ?>
                
                        </tbody>
                        </table>
                        








                </div>
            </div>
        </div>
        </div>



<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
            <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
         </div>
         <div class="modal-body">
            <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
         </div>
         <div class="modal-footer ">
            <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
         </div>
      </div>
      <!-- /.modal-content --> 
   </div>
   <!-- /.modal-dialog --> 
</div>










        <?php if($uid) :?> <!--로그인시 글작성 가능-->
            <div class="float-right">
                <button type="button" class="btn btn-primary " style="margin-top:20px" onclick="location.href='<?= bdUrl('board_write_form.php',0,0)?>'"><i class="fa fa-pencil">글작성</i></button>
            </div>
        <?php endif ?> 
    
            </div><!--end of col-sm-8-->
        </div><!--end of row-->
            <?php require("C:/xampp/htdocs/TermProject/footer.php") ?>  
        </div><!--m-container-->
     
</body>
</html>