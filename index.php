<!-- 웹 사이트의 메인 페이지 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <link rel="stylesheet" href="./index.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.css">
    <!-- slider CDN  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="./index.js"></script>
    <title>Main Page</title>

    <?php
        require("C:/xampp/htdocs/TermProject/html_head.php");
    ?>
</head>
<body>
    <div  id="m-container">     
        <?php require("C:/xampp/htdocs/TermProject/header.php") ?> 
            <div id="s-container">
                  <?php require("sidebar.php") ?>
                <div id="m-content">
                    <div id="slider">
                        <ul class="slides">
                            <!-- 이 부분을 자신의 상황에 맞게 수정 -->
                            <!-- 5개의 이미지 목록으로 구성한 슬라이드를 만들고 싶다면, 목록 처음과 끝에 복사본을 붙여넣어야함 -->
                            <!-- 목록 처음에는 5번 이미지의 복사본을 붙여넣음  -->
                            <!-- 목록 끝에는 1번 이미지의 복사본을 붙여넣음  -->
                            <!-- 자세한 설명은 http://blog.naver.com/2woo30225/220838511483 에서 참고 -->
                            <li class="slide slide5"><img src="./projectImage/index/image5.jpg" alt="asdasd" ondragstart="return false"></li>
                            <li class="slide slide1"><img src="./projectImage/index/image1.jpg" alt="asdasd" ondragstart="return false"></li>
                            <li class="slide slide2"><img src="./projectImage/index/image2.jpg" alt="asdasd" ondragstart="return false"></li>
                            <li class="slide slide3"><img src="./projectImage/index/image3.jpg" alt="asdasd" ondragstart="return false"></li>
                            <li class="slide slide4"><img src="./projectImage/index/image4.jpg" alt="asdasd" ondragstart="return false"></li>
                            <li class="slide slide5"><img src="./projectImage/index/image5.jpg" alt="asdasd" ondragstart="return false"></li>
                            <li class="slide slide1"><img src="./projectImage/index/image1.jpg" alt="asdasd" ondragstart="return false"></li>
                            <!-- 여기까지 수정 -->
                        </ul>

                        <div id="slider-nav">
                        <div id="slider-nav-dot-con">
                            <!-- 이 부분을 자신의 상황에 맞게 수정 -->
                            <!-- 복사본을 제외한 슬라이드 개수가 5개라면 span은 5개-->
                            <!-- id는 반드시 nav-dot1 부터 시작해서 nva-dot2 nav-dot3 ... nav-dot5와 같은 형태로 작성해야 함 -->
                            <span class="slider-nav-dot" style="background:white" id="nav-dot1"></span>
                            <span class="slider-nav-dot" id="nav-dot2"></span>
                            <span class="slider-nav-dot" id="nav-dot3"></span>
                            <span class="slider-nav-dot" id="nav-dot4"></span>
                            <span class="slider-nav-dot" id="nav-dot5"></span>
                            <!-- 여기까지 수정 -->
                        </div>
                    </div>
                </div>     
            </div>
        </div>
        <?php require("./footer.php") ?>  
    </div> 
     
    
</body>
</html>