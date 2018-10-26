 <!--웹 사이트의 공통 header 부분-->
 
 <?php
  require("C:/xampp/htdocs/TermProject/html_head.php");
  require_once("tools.php");

  //사용자의 아이디와 이름을 담은 세션 변수 읽기
  session_start_if_none();
  $uid = sessionVar("uid");  //$uid 변수에 사용자의 id저장
  $unickname = sessionVar("unickname");  //$unickname변수에 사용자의 닉네임 저장
 
 ?>
 <!-- link요소에 있어서의 CSS 미디어 쿼리 -->
<link rel="stylesheet" media="(max-width: 800px)" href="example.css" />

<!-- 스타일 이벤트 내의 CSS 미디어 쿼리 -->
<style>
@media (max-width: 600px) {
  #userInfo a {
    padding-left:40px;
    color:red;    
}
  }
  </style>

 <link rel="stylesheet" href="/TermProject/icon/css/font-awesome.min.css">

      <header>
       <nav class="navbar navbar-expand-lg navbar-light bg-danger text-light py-3 main-nav">
          <div class="container">
            <a class="navbar-brand" href="/TermProject/index.php"><img src="/TermProject/projectImage/header/TESTLOGO.png" alt="Logo" ondragstart="return false"></a>
              <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item active">
                    <a class="nav-link text-uppercase" href="index.html">Penpal <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-uppercase" href="/TermProject/community/community.php">community</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-uppercase" href="#team">Forum</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-uppercase" href="#works">Club</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-uppercase" href="#people-say">ALBUM</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link  text-uppercase" href="#contact">contact</a>
                  </li>
                </ul>
              </div>
          </div>
        </nav>
    </header>

 <!-- Columns are always 50% wide, on mobile and desktop -->
            

  </div>
  <div class="row" id="homeHeader">
        <div class="col-xl-4 col-md-12">
        <div id="homeLog">
            <a  href="/TermProject/index.php"><img id="homeImg" src="/TermProject/projectImage/header/home.png" alt="homeLogo" ondragstart="return false"></a>
        </div>
        </div>



        <div class="col-xl-8 col-md-12 test-center" id="userInfo">
            <a href=""><i class="fa fa-envelope">쪽지</i></a>
            <a href="/TermProject/member/member_user_check_form.php"><i class="fa fa-cogs">내정보</i></a>
            <a href="/TermProject/member/member_logout.php" class=""><i class="fa fa-sign-out">로그아웃</i></a>
            <a><i class="fa fa-user"><?= $unickname ?></i></a>
        </div>
    </div>


    <!-- 자바스크립트 옵션 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="js/custom.js"></script>
