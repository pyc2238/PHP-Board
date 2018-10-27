 <!--웹 사이트의 공통 header 부분-->
 <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
 
 <?php
  // require("C:/xampp/htdocs/TermProject/html_head.php");
  require_once("tools.php");

  //사용자의 아이디와 이름을 담은 세션 변수 읽기
  session_start_if_none();
  $uid = sessionVar("uid");  //$uid 변수에 사용자의 id저장
  $unickname = sessionVar("unickname");  //$unickname변수에 사용자의 닉네임 저장
 
 ?>
 <!-- link요소에 있어서의 CSS 미디어 쿼리 -->
<link rel="stylesheet" media="(max-width: 800px)" href="example.css" />

<!-- 스타일 이벤트 내의 CSS 미디어 쿼리 -->
<script>
var  mn = $(".main-nav");
    mns = "main-nav-scrolled";
    hdr = $('header').height();

$(window).scroll(function() {
  if( $(this).scrollTop() > hdr ) {
    mn.addClass(mns);
  } else {
    mn.removeClass(mns);
  }
});

</script>
<style>
header .main-nav{
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	z-index: 4000;
}


/*for test*/
body{
  height: 900px;
}

</style>
 <link rel="stylesheet" href="/TermProject/icon/css/font-awesome.min.css">

<!------ Include the above in your HEAD tag ---------->
      <header>
       <nav class="navbar navbar-expand-lg navbar-light bg-danger text-light py-3 main-nav">
          <div class="container">
            <a class="navbar-brand" href="/TermProject/index.php"><img src="/TermProject/projectImage/header/TESTLOGO.png" alt="Logo" ondragstart="return false"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
           
           
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



    <!-- 자바스크립트 옵션 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="js/custom.js"></script>
