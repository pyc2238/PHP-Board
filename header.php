 <!--웹 사이트의 공통 header 부분-->
 
 <?php
  require("C:/xampp/htdocs/TermProject/html_head.php");
  require_once("tools.php");

  //사용자의 아이디와 이름을 담은 세션 변수 읽기
  session_start_if_none();
  $uid = sessionVar("uid");  //$uid 변수에 사용자의 id저장
  $unickname = sessionVar("unickname");  //$unickname변수에 사용자의 닉네임 저장
 
 ?>
 
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


 <link rel="stylesheet" href="/TermProject/icon/css/font-awesome.min.css">

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

    <div class="headcontainer">
      <div class="home">
        <a  href="/TermProject/index.php"><img id="homeImg" src="/TermProject/projectImage/header/home.png" alt="homeLogo" ondragstart="return false"></a>
      </div>
      <?php if($uid) : //로그인 상태일 때 출력?> 
      <div class="userInfo">
        <a><i class="fa fa-user"><?= $unickname ?></i></a>
        <a href="/TermProject/member/member_logout.php" class=""><i class="fa fa-sign-out">로그아웃</i></a>
        <a href="/TermProject/member/member_user_check_form.php"><i class="fa fa-cogs">내정보</i></a>
        <a href=""><i class="fa fa-envelope">쪽지</i></a>
      </div>
      <?php else : //로그인 되지 않은 상태일 때 출력?>
      <div class="userInfo">
        <a href="/TermProject/member/member_login_form.php"><i class="fa fa-check">로그인</i></a> <!--member_login_form 이동-->
        <a href="/TermProject/member/member_join_form.php"><i class="fa fa-address-card">회원가입</i></a> <!--member_join_form 이동-->
        <a href="/TermProject/member/member_find_id_pw_form.php"><i class="fa fa-question-circle">아이디/비밀번호 찾기</i></a>
      </div>
      <?php endif ?>


    </div>
    <!-- 자바스크립트 옵션 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="js/custom.js"></script>
