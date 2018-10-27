<!-- 게시판 메인 페이지 -->
<?php 
    require_once("C:/xampp/htdocs/TermProject/tools.php");
    require_once("./CommunityDao.php");
    $dao = new CommunityDao();
    $totalRecord = $dao->getNumMsgs();  //토탈 레코드 저장
    session_start_if_none();
    $uid = sessionVar("uid");


    define("NUM_LINES",10);  //게시글 리스트의 줄 수
    define("NUM_PAGE_LINKS",5); //화면에 표시될 페이지 링크의 수


    $page = requestValue("page"); // 현재 페이지
    
    if($page < 1){  //현재 페이지의 보정
        $page = 1;
    }

    //페이지네이션 컨트롤의 처음 / 마지막 페이지 링크 번호 계산
    $startPage = floor(($page-1)/NUM_PAGE_LINKS)*NUM_PAGE_LINKS+1;
    $endPage = $startPage + (NUM_PAGE_LINKS-1);
  
    //리스트에 보일 게시글 데이터 읽기
    $startRecord = ($page - 1) * NUM_LINES;    //page는 배역과 같이 0번부터 출력해야한다. 0~9 // 10~19 
    $msgs = $dao->getManyMsgs($startRecord,NUM_LINES); 
    
    $totalPages = ceil($totalRecord/NUM_LINES);    //전체 페이지수 
    
    //마지막 페이지에 대한 보정
    if($endPage > $totalPages){
        $endPage = $totalPages;
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>

  <link rel="stylesheet" href="/TermProject/community/community.css"> <!--forum css-->

  <link rel="stylesheet" href="/TermProject/community/board.css"> <!--forum css-->
  <link rel="stylesheet" href="/TermProject/icon/css/font-awesome.min.css">   <!--fontAresome-->
      <title>Community</title>

    <?php
        require("C:/xampp/htdocs/TermProject/html_head.php");
    ?>

</head>

 <script>
     function choice (num,page){
        var choice = confirm("해당 게시글을 삭제하시겠습니까?");
        if(choice){
            location.href ="community_delete.php?num="+num+"&page="+page;
        }
    }
</script>

<body>
    <div id="m-community-container">     
        <?php require("C:/xampp/htdocs/TermProject/header.php") ?> 
        <div id="s-community-container">
        <h3>NEITTER-지식교류</h3>
        <hr>

  <div class="container">
              

    	<div class="row">
        <h4 style="font:bold"><i class="fa fa-calculator">TOTAL : <?=$totalRecord?></i></h4>
            <!-- <div class="table-responsive"> -->
              <table class="table table-hover" style="table-layout:fixed">
                <thead>
                  <tr>
                    <th class="text-center">번호</th>
                    <th></th>
                    <th>제목</th>
                    <th>글쓴이</th>
                    <th>날짜</th>
                    <th class="text-right">조회</th>
                    <th class="text-right">추천</th>
                    <th class="text-right">수정/삭제</th>
                 </tr>
                </thead>
                <tbody>
                <?php foreach($msgs as $rows) :?>
                  <tr>
                    <td class="text-center"><?= $rows["num"] ?></td>
                    <td><img src="<?= $rows["country"]?>"></td>
                    <td style="overflow:hidden;white-space:nowrap;text-overflow:ellipsis;"><a href="<?= bdUrl('community_view.php',$rows["num"],$page)?>'"><?= $rows["title"] ?></a></td>
                    <td style="overflow:hidden;white-space:nowrap;text-overflow:ellipsis;"><?= $rows["writer"] ?></td>
                    <td><?= $rows["regtime"] ?></td>
                    <td class="text-right"><?= $rows["hits"] ?></td>
                    <td class="text-right"><?= $rows["commend"] ?></td>
                    <td class="td-actions text-right">
                    <?php if($uid) :?>
                      <button type="button" rel="tooltip" class="btn btn-success btn-just-icon btn-sm" onclick="location.href='<?= bdUrl('community_update_form.php',$rows['num'],$page)?>'" >
                        <h2><i class="fa fa-edit"></i></h2>
                      </button>
                      <button type="button" rel="tooltip" class="btn btn-danger btn-just-icon btn-sm" onclick="choice(<?=$rows['num']?>,<?= $page ?>);">
                        <h2><i class="fa fa-trash"></i></h2>
                      </button>
                    <?php else : ?>
                      <button type="button" rel="tooltip" class="btn btn-success btn-just-icon btn-sm" onclick="alert('사용권한이 없습니다.');" >
                        <h2><i class="fa fa-edit"></i></h2>
                      </button>
                      <button type="button" rel="tooltip" class="btn btn-danger btn-just-icon btn-sm" onclick="alert('사용권한이 없습니다.');">
                        <h2><i class="fa fa-trash"></i></h2>
                      </button>
                    <?php endif ?>
                    </td>
                  </tr>
                  <?php endforeach?>
                </tbody>
              </table>
 
        </div>
      </div>
      
      <br>
      <div class="row">

    <div class="col-sm ">
          <form action="#">
            <div class="input-group col-md-10">
                <select id="inputState" class="form-control" name="country" required>		      
                    <option selected value="writer">제목</option>
                    <option value="title">글쓴이</option>
                    <option value="title">내용</option>
                    <option value="title">제목+내용</option>
                </select>
                <input type="text" class="form-control">
                <input type="submit" value="검색" class="button">
            </div>
          </form>
      </div><!-- end of col-sm -->
    
    <div class="col-sm ">
    <div class="pagination float-left">  
          <?php if($startPage > 5 ): ?>
                <a href="<?= bdUrl("community.php",0,1) ?>">처음</a>
            <?php endif ?>    
    
            <?php if($startPage > 5 ): ?>
                <a href="<?= bdUrl("community.php",0,$page - 1) ?>"><</a>
            <?php endif ?>    
    
            <?php for($i = $startPage; $i <= $endPage; $i++) : ?>

                <?php if ($i == $page) : ?>
                    <a id="choice" href="<?= bdUrl("community.php",0,$i)?>"><b><?= $i ?></b></a>
                <?php else: ?>
                    <a href="<?= bdUrl("community.php",0,$i)?>"> <?= $i ?> </a>
                <?php endif ?>
                    
            <?php endfor ?>

            <?php if($endPage < $totalPages ) :?>
                <a href="<?= bdUrl("community.php",0,$i)?>">></a>
            <?php endif ?>    
            <?php if($endPage < $totalPages ) :?>
                <a href="<?= bdUrl("community.php",0,$totalPages)?>">끝</a>
            <?php endif ?> 
         </div><!--end of col-sm-->
    </div><!--end of pagination-->
    <div class="col col-lg-2">
    <?php if($uid) :?>
          <button class="btn btn-outline-warning   float-right" type="button" onclick="location.href='<?= bdUrl('community_write_form.php',0,$page) ?>'"><i class="fa fa-pencil" style="font-size:15px;">글쓰기</i></button>
        <?php endif ?>
    </div><!--end of col colo-lg-2-->
  </div>  <!--end of row-->

    </div><!--"s-community-container-->
    <?php require("C:/xampp/htdocs/TermProject/footer.php") ?>       
    </div>
      
    </div><!--m-community-container-->   
  </body>
</html>