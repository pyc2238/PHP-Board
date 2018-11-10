<!-- 게시판 메인 페이지 -->
<?php 
    require_once("C:/xampp/htdocs/TermProject/tools.php");
    require_once("./CommunityDao.php");
    $dao = new CommunityDao();

    $totalRecord = $dao->getNumMsgs();  //토탈 레코드 저장
    
    session_start_if_none();
    $uid = sessionVar("uid");
    
    $search = requestValue("search");
    $searchChoice = requestValue("searchChoice");

    define("NUM_LINES",10);  //게시글 리스트의 줄 수
    define("NUM_PAGE_LINKS",5); //화면에 표시될 페이지 링크의 수


    $page = requestValue("page"); // 현재 페이지
    //페이지네이션 컨트롤의 처음 / 마지막 페이지 링크 번호 계산
    
    if($page < 1){  //현재 페이지의 보정
        $page = 1;
    }

    $startPage = floor(($page-1)/NUM_PAGE_LINKS)*NUM_PAGE_LINKS+1;
    $endPage = $startPage + (NUM_PAGE_LINKS-1);
    
    //리스트에 보일 게시글 데이터 읽기
        
    $startRecord = ($page - 1) * NUM_LINES;    //page는 배역과 같이 0번부터 출력해야한다. 0~9 // 10~19
        
    $msgs = $dao->getManyMsgs($startRecord, NUM_LINES); 

    if($search){
        switch($searchChoice){
            case "title": 
                    $search = requestValue("search");
                    $totalRecord = $dao->getSearchTitleMsgs($search);  //토탈 레코드 저장
                    $msgs = $dao-> searchTitleMsg($search,$startRecord,NUM_LINES);
                    break;
            case "writer" : 
                    $search = requestValue("search");
                    $totalRecord = $dao->getSearchWriterMsgs($search);  //토탈 레코드 저장
                    $msgs = $dao-> searchWriterMsg($search,$startRecord,NUM_LINES);
                break;
                
            case "content" : 
                    $search = requestValue("search");
                    $totalRecord = $dao->getSearchContentMsgs($search);  //토탈 레코드 저장
                    $msgs = $dao-> searchContentMsg($search,$startRecord,NUM_LINES);
                break; 
            case "titleAndcotent" : 
                    $search = requestValue("search");
                    $totalRecord = $dao->getsearchTitleAndContentMsg($search);  //토탈 레코드 저장
                    $msgs = $dao-> searchTitleAndContentMsg($search,$startRecord,NUM_LINES);
                break;              
        }
    }

    $totalPages = ceil($totalRecord/NUM_LINES);    //전체 페이지수 
    //마지막 페이지에 대한 보정
    if($endPage > $totalPages){
        $endPage = $totalPages;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="/TermProject/community/community.css">
    <!--forum css-->

    <link rel="stylesheet" href="/TermProject/community/board.css">
    <!--forum css-->
    <link rel="stylesheet" href="/TermProject/icon/css/font-awesome.min.css">
    <!--fontAresome-->
    <title>Community</title>

    <?php
        require("C:/xampp/htdocs/TermProject/html_head.php");
    ?>
    <script>
        function searchBtn() {
            var searchValue = document.getElementById('inputState').value;
            var search = document.getElementById('inputText').value;
            
            var url = '/TermProject/community/community.php?search=' + search +'&searchChoice=' + searchValue;

            location.href = url;
        }
    </script>
</head>

<script>
    function choice (num,page){
        var choice = confirm("해당 게시글을 삭제하시겠습니까?");
        if(choice){
            location.href ="community_delete.php?num="+num+"&page="+page;
        }
    }


        function enterkey() {
        if (window.event.keyCode == 13) {
 
            var searchValue = document.getElementById('inputState').value;
            var search = document.getElementById('inputText').value;
            
            var url = '/TermProject/community/community.php?search=' + search +'&searchChoice=' + searchValue;

            location.href = url;
        }
    }
 
    


</script>
 
<body>
    <div id="m-community-container">
        <?php require("C:/xampp/htdocs/TermProject/header.php") ?>
        <?php if(!$msgs) :?>
        <div id="s-community-container" >
        <?php elseif($totalRecord < 5) :?>
            <div id="s-community-container" style='height:600px'>
        <?php else :?>
            <div id="s-community-container" >
        <?php endif ?>
            <h3>NEITTER-지식교류</h3>
            <hr>

            <div class="container">

                 <?php if(!$msgs): ?>
                          
                    <h1 class='text-center'>검색결과가 존재하지 않습니다.</h1>
                    <br><br><br>
                        <!-- <img src="https://stickershop.line-scdn.net/stickershop/v1/product/1274436/LINEStorePC/main@2x.png;compress=true" class="img-fluid" alt="Responsive image"> -->
                        <img id=Rand_Banner class="img-fluid" src="https://stickershop.line-scdn.net/stickershop/v1/product/1274436/LINEStorePC/main@2x.png;compress=true"
                                        alt="Responsive image">
                        <img id=Rand_Banner class="img-fluid" src="https://stickershop.line-scdn.net/stickershop/v1/product/1419641/LINEStorePC/main@2x.png;compress=true"
                                alt="Responsive image">
                        <img id=Rand_Banner class="img-fluid" src="https://stickershop.line-scdn.net/stickershop/v1/product/1432005/LINEStorePC/main@2x.png;compress=true"
                                alt="Responsive image">
                        <img id=Rand_Banner class="img-fluid" src="https://stickershop.line-scdn.net/stickershop/v1/product/1439190/LINEStorePC/main@2x.png;compress=true?__=20161019"
                                alt="Responsive image">
                        <img id=Rand_Banner class="img-fluid" src="https://stickershop.line-scdn.net/stickershop/v1/product/1439496/LINEStorePC/main@2x.png;compress=true"
                                alt="Responsive image">
                        <img id=Rand_Banner class="img-fluid" src="https://stickershop.line-scdn.net/stickershop/v1/product/1448386/LINEStorePC/main@2x.png;compress=true"
                                alt="Responsive image">
                        <img id=Rand_Banner class="img-fluid" src="https://stickershop.line-scdn.net/stickershop/v1/product/1600906/LINEStorePC/main@2x.png;compress=true"
                                alt="Responsive image">
                        <img id=Rand_Banner class="img-fluid" src="https://4.bp.blogspot.com/-uQWbVG90eTI/WTraoe8kREI/AAAAAAAAAts/AhwUW2JKwvIBVpoG4uvpoA_eHE8J9RRlgCLcB/s1600/TW444618.png"
                                alt="Responsive image">
                        <img id=Rand_Banner class="img-fluid" src="https://4.bp.blogspot.com/-oQAS2K2DvOQ/WUjlgzg2qYI/AAAAAAAAMDE/OIp8oS1M-lkxca6-wE5Z_paCSNUq4kVZQCLcBGAs/s1600/TW453311.png"
                                alt="Responsive image">
                        <img id=Rand_Banner class="img-fluid" src="http://dl.stickershop.line.naver.jp/products/0/0/1/1600906/android/stickers/20394946.png"
                                alt="Responsive image">
                        <img id=Rand_Banner class="img-fluid" src="https://i.pinimg.com/originals/80/2e/6f/802e6f25b7a51f25e033d06d21235b3c.png"
                                alt="Responsive image">
                        <img id=Rand_Banner class="img-fluid" src="https://sdl-stickershop.line.naver.jp/stickershop/v1/sticker/18062306/android/sticker.png"
                                alt="Responsive image">
                        <img id=Rand_Banner class="img-fluid" src="https://i.pinimg.com/originals/da/af/77/daaf771f6eda191f52c7b11e48a9a82b.png"
                                alt="Responsive image">
                        <img id=Rand_Banner class="img-fluid" src="https://i.pinimg.com/originals/e3/e9/3a/e3e93a80b6df39f14b34a85e07d0a760.png"
                                alt="Responsive image">
                        <img id=Rand_Banner class="img-fluid" src="https://i.pinimg.com/originals/b8/a2/5f/b8a25f5c0b6923a988d7ec83b6cd296c.png"
                                alt="Responsive image">
                        <img id=Rand_Banner class="img-fluid" src="https://3.bp.blogspot.com/-jjDIk3QGMxU/WZBHUX05-1I/AAAAAAAQ0Bs/EVbIQE3MY24cS21Hn0J7WSqn35FG9LkvQCLcBGAs/s1600/TW500793.png"
                        alt="Responsive image">

                    <?php else :?>


                <div class="row">
                    <h4 style="font:bold;"><i class="fa fa-calculator">TOTAL :
                            <?=$totalRecord?></i></h4>
                    <!-- <div class="table-responsive"> -->
                
                    <table class="table table-hover" style="table-layout:fixed">
                        <thead>
                            <tr>
                                <th class="text-center" style="width:60px;">번호</th>
                                <th style="width:50px;"></th>
                                <th>제목</th>
                                <th style="width:150px;">글쓴이</th>
                                <th style="width:55px;">날짜</th>
                                <th class="text-right" style="width:70px;">조회</th>
                                <th class="text-right" style="width:70px;">추천</th>
                                <th class="text-right" style="width:100px;">수정/삭제</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach($msgs as $rows) :?>
                            <?php if($commentCount = $dao->totalConmments($rows['num'])): ?>
                            <?php endif ?>
                            <!--게시글의 댓글 표시-->
                            <tr>
                                <td class="text-center">
                                    <?= $rows["num"] ?>
                                </td>
                                <td><img src="<?= $rows['country']?>"></td>

                                <?php if($commentCount): ?>
                                <td style="overflow:hidden;white-space:nowrap;text-overflow:ellipsis;"><a href="<?= bdUrl('community_view.php',$rows['num'],$page, $searchChoice, $search)?>">
                                        <?= $rows["title"] ?>&nbsp;&nbsp;(<?=$commentCount?>)</a></td>
                                <?php else :?>
                                <td style="overflow:hidden;white-space:nowrap;text-overflow:ellipsis;"><a href="<?= bdUrl('community_view.php',$rows['num'],$page, $searchChoice, $search)?>">
                                        <?= $rows["title"] ?></a></td>
                                <?php endif ?>

                                <td style="overflow:hidden;white-space:nowrap;text-overflow:ellipsis;">
                                    <?= $rows["writer"] ?>
                                </td>
                                <td>
                                    <?= $rows["regtime"] ?>
                                </td>
                                <td class="text-right">
                                    <?= $rows["hits"] ?>
                                </td>
                                <td class="text-right">
                                    <?= $rows["commend"] ?>
                                </td>
                                <td class="td-actions text-right">
                                    <?php if($uid) :?>
                                    <button type="button" rel="tooltip" class="btn btn-success btn-just-icon btn-sm"
                                        onclick="location.href='<?= bdUrl('community_update_form.php',$rows['num'], $page ,$searchChoice,$search)?>'">
                                        <h2><i class="fa fa-edit"></i></h2>
                                    </button>
                                    <button type="button" rel="tooltip" class="btn btn-danger btn-just-icon btn-sm"
                                        onclick="choice(<?=$rows['num']?>,<?= $page ?>);">
                                        <h2><i class="fa fa-trash"></i></h2>
                                    </button>
                                    <?php else : ?>
                                    <button type="button" rel="tooltip" class="btn btn-success btn-just-icon btn-sm"
                                        onclick="alert('사용권한이 없습니다.');">
                                        <h2><i class="fa fa-edit"></i></h2>
                                    </button>
                                    <button type="button" rel="tooltip" class="btn btn-danger btn-just-icon btn-sm"
                                        onclick="alert('사용권한이 없습니다.');">
                                        <h2><i class="fa fa-trash"></i></h2>
                                    </button>
                                    <?php endif ?>
                                </td>
                            </tr>
                            <?php endforeach?>
                           
                        </tbody>
                    </table>
                    <?php endif?>

                </div>
            </div>

            <br>
            <div class="row">

                <div class="col-sm ">
                    <div class="input-group col-md-10">
                        <select id="inputState" class="form-control" name="searchChoice" required>
                            <option selected value="title">제목</option>
                            <option value="writer">글쓴이</option>
                            <option value="content">내용</option>
                            <option value="titleAndcotent">제목+내용</option>
                        </select>
                        <input id="inputText" type="text" class="form-control" name="search" autocomplete=off onkeyup="enterkey();">
                        <button class="button" onclick="searchBtn()">검색</button>
                    </div>
                </div><!-- end of col-sm -->
                <div class="col-sm ">
                    <div class="pagination float-left">
                        <?php if($startPage > 5 ): ?>
                        <a href="<?= bdUrl(" community.php",0,1,$searchChoice, $search) ?>">처음</a>
                        <?php endif ?>

                        <?php if($startPage > 5 ): ?>
                        <a href="<?= bdUrl(" community.php",0,$page - 1,$searchChoice, $search) ?>"><</a> <?php endif ?>

                                <?php for($i = $startPage; $i <= $endPage; $i++) : ?>

                                <?php if ($i == $page) : ?>
                                <a id="choice" href="<?= bdUrl(" community.php",0,$i,$searchChoice, $search)?>"><b>
                                        <?= $i ?></b></a>
                                <?php else: ?>
                                <a href="<?= bdUrl(" community.php",0,$i,$searchChoice, $search)?>">
                                    <?= $i ?> </a>
                                <?php endif ?>

                                <?php endfor ?>

                                <?php if($endPage < $totalPages ) :?>
                                <a href="<?= bdUrl(" community.php",0,$i,$searchChoice, $search)?>">></a>
                                <?php endif ?>
                                <?php if($endPage < $totalPages ) :?>
                                <a href="<?= bdUrl(" community.php",0,$totalPages,$searchChoice, $search)?>">끝</a>
                                <?php endif ?>
                    </div>
                    <!--end of col-sm-->
                </div>
                <!--end of pagination-->
                <div class="col col-lg-2">
                    <?php if($uid) :?>
                    <button class="btn btn-outline-warning   float-right" type="button" onclick="location.href='<?= bdUrl('community_write_form.php',0,$page,$searchChoice,$search) ?>'"><i
                            class="fa fa-pencil" style="font-size:15px;">글쓰기</i></button>

                    <?php endif ?>
                    <?php if($searchChoice && $search) : ?>
                    <button class="btn btn-outline-warning  float-right" type="button" onclick="location.href='<?= bdUrl('community.php',0,0,0,0) ?>'"><i
                            class="fa fa-list" style="font-size:15px;">목록</i></button>
                    <?php endif ?>
                </div>
                <!--end of col colo-lg-2-->
            </div>
            <!--end of row-->

        </div>
        <!--"s-community-container-->
        <?php require("../footer.php") ?>
    </div>
    <!--m-community-container-->


</body>

</html>