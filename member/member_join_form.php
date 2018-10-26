<!--회원가입위한 form php-->

<!DOCTYPE html>
<html lang="en">
    <title>Join Page</title>
    <link rel="stylesheet" href="./member.css">
    <link rel="stylesheet" href="/TermProject/icon/css/font-awesome.min.css">
<body>


        <script>
            //아이디 중복 체크 
            function checkid(){

                // 만들 팝업창 좌우 크기의 1/2 만큼 보정값으로 빼주었음
                var popupX = (window.screen.width / 2) - (345 / 2);
                // 만들 팝업창 상하 크기의 1/2 만큼 보정값으로 빼주었음
                var popupY= (window.screen.height /2) - (300 / 2);

                var userid = document.getElementById("uid").value;  //uid의 id값을 가진 elements객체의 값을 userid변수에 저장
                if(userid)  
                {
                    url = "member_join_id_check.php?userid="+userid;   //userid의 값을 joinCheck.php에 넘겨준다.
                        //팝업창 설정
                        window.open(url,"chkid",'status=no, width=300, height=100, left='+ popupX +
                                     ', top='+ popupY + ', screenX='+ popupX + ', screenY= '+ popupY);
                    }else{
                        alert("아이디를 입력하세요");
                    }
                }
        </script>

    <div id="member-m-container">
            <?php require("C:/xampp/htdocs/TermProject/header.php") ?>
            
            <div id="member-s-container">
                
            <div class="container">
                <h3>NEITTER-회원가입</h3>
                <hr>
            </div>
            <br>
            
            <div class="row">
            <div class="col-sm"> </div><!--첫번째 그리드 박스-->
        <div class="col-sm">
            
            <form action="member_join.php" method="post">

                <label for="inputEmail">아이디</label>
                <input type="text" id="uid" name="id"  class="form-control" autocomplete=off placeholder="ID" required autofocus><!--autocomplete 자동완성기능 off , autofocus , required-->
                <br>
                <label for="inputPassword">비밀번호</label>
                <input type="password"  name="pw" class="form-control" placeholder="Password" required>
                <small style="color:red"><i class="fa fa-exclamation-circle">8~15자,영문,숫자,특수문자가 들어가야 합니다.</i></small>
                <br>
                <label for="inputNickname">닉네임</label>
                <input type="text"  name="nickname" class="form-control" autocomplete=off placeholder="Nickname" required>
                <br>
                <label for="inputEmail">이메일</label>
                <input type="email"  name="email" class="form-control" autocomplete=off placeholder="Email" required>
                <br>


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>나이</label>
                        <input type="number" class="form-control" name="age" min="1" max="120" required>
                    </div> <!-- form-group end.// -->
                    <div class="form-group col-md-6">
                        <label>성별</label>
                        <select id="inputState" class="form-control" name="gender" required>		      
                            <option selected value="남자">남자</option>
                            <option value="여자">여자</option>
                        </select>
                    </div> <!-- form-group end.// -->
                </div> <!-- form-row.// -->


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>거주지</label>
                        <input type="text" class="form-control" name="address" autocomplete=off required>
                    </div> <!-- form-group end.// -->
                    <div class="form-group col-md-6">
                        <label>국적</label>
                        <select id="inputState" class="form-control" name="country" required>		      
                            <option selected value="한국">한국</option>
                            <option value="일본">일본</option>
                        </select>
                    </div> <!-- form-group end.// -->
                </div> <!-- form-row.// -->                

                <br>
                
                <div id="joinBtnBox">
                    <button class="btn btn-outline-warning " type="submit"><i class="fa fa-pencil">가입</i></button>
                    <button class="btn btn-outline-warning " type="reset"><i class="fa fa-eraser">다시쓰기</i></button>
                </div>
            </form>
        </div><!--end of col-sm-->

        <div class="col-sm">
            <div id="checkId">
                <input type="button" value="중복검사" onclick="checkid();" class="btn btn-primary" />
                <input type="hidden" value="0" name="chs" />
            </div>
        </div><!--세번재 그리드 박스-->

        </div><!--end of fow -->
        </div><!--end of member-s-container-->

        
        <?php require("../footer.php") ?> 
                
    </div> <!--end of member-m-container-->

    
</body>
</html>