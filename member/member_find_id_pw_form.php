
<!DOCTYPE html>
<html lang="en">   
    <title>Find ID / PW</title>
    <link rel="stylesheet" href="./member.css"> <!--member css-->
    <link rel="stylesheet" href="/TermProject/icon/css/font-awesome.min.css">   <!--fontAresome-->
    <body>     
        <script>
            
            //체크 박스의 아이디가 체크된 상태와 체크되지 않은 상태일 때 uid의 id값의 input태그를 readonly상태로 만든다.
            function findCheckId(chkbox){
                if ( chkbox.checked == true ){
                    var userid = document.getElementById("uid").readOnly = true;
                }else{
                    var userid = document.getElementById("uid").readOnly = false;
                }
            }

        </script>

        <div id="member-m-container">
                <?php require("C:/xampp/htdocs/TermProject/header.php") ?>
            <div id="member-profileCheck-container">
                
        <div class="container">
            <h3>NEITTER-회원 아이디 / 비밀번호 찾기</h3>
            <hr>
            <br>
            <br> 
            <br>
        <div class="row">
            <div class="col-sm"></div><!--첫번 째 그리드 박스-->
            <div class="col-sm">
            
            <form action="member_find_id_pw.php" method="post">
                
                <i class="fa fa-user"><label for="inputPassword">회원 아이디</label></i>
                <input type="text"  id="uid" name="id" name="id" class="form-control" autocomplete=off required>
                <br>
                <br>
                <i class="fa fa-envelope"><label for="inputPassword">이메일</label></i>
                <input type="email" id="uemail" name="email" class="form-control" autocomplete=off  required>

                <div id="profileCheckBox">
                    <button class="btn btn-outline-warning" type="submit">&nbsp;&nbsp;&nbsp;&nbsp;확인&nbsp;&nbsp;&nbsp;&nbsp;</button>
                </div>
            </form> <!--end of form-->

                </div> <!--두번쨰 그리드 박스-->

                <div class="col-sm">
                    <div id="checkIdbox">
                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="customControlInline"  name="find_check_id" value="1" onClick="findCheckId(this);">
                            <label class="custom-control-label" for="customControlInline"><b style="color:blue;">아이디 분실</b></label>
                        </div>
                    </div><!--end of checkIdbox-->   
                </div> <!--세번째 그리드 박스-->
                </div><!--end of row--> 
            </div>  <!--end of containar-->

                </div><!--end of member-s-container-->
                <?php require("../footer.php") ?>      
        </div><!--end of member-m-container-->
       
    </body>
</html>