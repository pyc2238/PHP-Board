<!-- 회원 로그인 form -->

<!DOCTYPE html>
<html lang="en">   
    <title>Login Page</title>
    <link rel="stylesheet" href="./member.css">
    <style>
        .Social {
            padding: 20px;
            font-size: 30px;
            width: 65px;
            text-align: center;
            text-decoration: none;
            margin: 5px 2px;
        }

        .Social:hover {
            opacity: 0.7;
            text-decoration:none;
        }

        .fa-facebook {
        background: #3B5998;
        color: white;
        }

        .fa-twitter {
        background: #55ACEE;
        color: white;
        }

        .fa-google {
        background: #dd4b39;
        color: white;
        }

        .fa-yahoo {
        background: #430297;
        color: white;
        }
    
    </style>
    <script>
                function show_Banner(num){
                    for(i=0;i<15;i++){
                        if(num==i){
                    Rand_Banner[i].style.dispaly="";
                 }else{
                    Rand_Banner[i].style.display="none";
                    }
                    }
                }
    </script>



    <body>     
        <div id="member-m-container">
                <?php require("C:/xampp/htdocs/TermProject/header.php") ?>
            <div id="member-s-container">
            
    <div class="container">
        <h3>NEITTER-로그인</h3>
        <hr>
        <br>
        <br>
    <div class="row">
        <div class="col-sm"></div><!--첫번 째 그리드 박스-->
        <div class="col-sm">
        
        <form action="member_login.php" method="post">
            <div class="container">
                <!-- <img src="https://stickershop.line-scdn.net/stickershop/v1/product/1274436/LINEStorePC/main@2x.png;compress=true" class="img-fluid" alt="Responsive image"> -->
                <a href="#" onfocus="this.blur();"><img id=Rand_Banner class="img-fluid" src="https://stickershop.line-scdn.net/stickershop/v1/product/1274436/LINEStorePC/main@2x.png;compress=true" alt="Responsive image"></a>
                <a href="#" onfocus="this.blur();"><img id=Rand_Banner class="img-fluid" src="https://stickershop.line-scdn.net/stickershop/v1/product/1419641/LINEStorePC/main@2x.png;compress=true" alt="Responsive image"></a>
                <a href="#" onfocus="this.blur();"><img id=Rand_Banner class="img-fluid" src="https://stickershop.line-scdn.net/stickershop/v1/product/1432005/LINEStorePC/main@2x.png;compress=true" alt="Responsive image"></a>
                <a href="#" onfocus="this.blur();"><img id=Rand_Banner class="img-fluid" src="https://stickershop.line-scdn.net/stickershop/v1/product/1439190/LINEStorePC/main@2x.png;compress=true?__=20161019" alt="Responsive image"></a>
                <a href="#" onfocus="this.blur();"><img id=Rand_Banner class="img-fluid" src="https://stickershop.line-scdn.net/stickershop/v1/product/1439496/LINEStorePC/main@2x.png;compress=true" alt="Responsive image"></a>
                <a href="#" onfocus="this.blur();"><img id=Rand_Banner class="img-fluid" src="https://stickershop.line-scdn.net/stickershop/v1/product/1448386/LINEStorePC/main@2x.png;compress=true" alt="Responsive image"></a>
                <a href="#" onfocus="this.blur();"><img id=Rand_Banner class="img-fluid" src="https://stickershop.line-scdn.net/stickershop/v1/product/1600906/LINEStorePC/main@2x.png;compress=true" alt="Responsive image"></a>
                <a href="#" onfocus="this.blur();"><img id=Rand_Banner class="img-fluid" src="https://4.bp.blogspot.com/-uQWbVG90eTI/WTraoe8kREI/AAAAAAAAAts/AhwUW2JKwvIBVpoG4uvpoA_eHE8J9RRlgCLcB/s1600/TW444618.png" alt="Responsive image"></a>
                <a href="#" onfocus="this.blur();"><img id=Rand_Banner class="img-fluid" src="https://4.bp.blogspot.com/-oQAS2K2DvOQ/WUjlgzg2qYI/AAAAAAAAMDE/OIp8oS1M-lkxca6-wE5Z_paCSNUq4kVZQCLcBGAs/s1600/TW453311.png" alt="Responsive image"></a>
                <a href="#" onfocus="this.blur();"><img id=Rand_Banner class="img-fluid" src="http://dl.stickershop.line.naver.jp/products/0/0/1/1600906/android/stickers/20394946.png" alt="Responsive image"></a>
                <a href="#" onfocus="this.blur();"><img id=Rand_Banner class="img-fluid" src="https://i.pinimg.com/originals/80/2e/6f/802e6f25b7a51f25e033d06d21235b3c.png" alt="Responsive image"></a>
                <a href="#" onfocus="this.blur();"><img id=Rand_Banner class="img-fluid" src="https://sdl-stickershop.line.naver.jp/stickershop/v1/sticker/18062306/android/sticker.png" alt="Responsive image"></a>
                <a href="#" onfocus="this.blur();"><img id=Rand_Banner class="img-fluid" src="https://i.pinimg.com/originals/da/af/77/daaf771f6eda191f52c7b11e48a9a82b.png" alt="Responsive image"></a>
                <a href="#" onfocus="this.blur();"><img id=Rand_Banner class="img-fluid" src="https://i.pinimg.com/originals/e3/e9/3a/e3e93a80b6df39f14b34a85e07d0a760.png" alt="Responsive image"></a>
                <a href="#" onfocus="this.blur();"><img id=Rand_Banner class="img-fluid" src="https://i.pinimg.com/originals/b8/a2/5f/b8a25f5c0b6923a988d7ec83b6cd296c.png" alt="Responsive image"></a>
                
                <script language="javascript">
                    var R=Math.floor(Math.random()*15);
                    show_Banner(R);
                </script>
                <h1 class="h3 mb-3 font-weight-normal text-center">Please sign in</h1>
            </div>
            <label for="inputEmail" class="sr-only">ID</label>
            <input type="text" id="inputEmail" name="id"  class="form-control" autocomplete=off placeholder="ID" required autofocus>
            <br>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" name="pw" class="form-control" autocomplete=off placeholder="Password" required>
            <br> 
            <br>
           
            <div id="loginBtnBox">
                <button class="btn btn-outline-warning " type="submit">&nbsp;&nbsp;&nbsp;로그인&nbsp;&nbsp;&nbsp;</button>
                <button class="btn btn-outline-warning" type="button" onclick="location.href='member_join_form.php'">&nbsp;&nbsp;회원가입&nbsp;&nbsp;</button>
                <button class="btn btn-outline-warning" type="button" onclick="location.href='member_find_id_pw_form.php'">ID/PW찾기</button>
            </div>

        </form>
            </div> <!--두번쨰 그리드 박스-->

            <div class="col-sm"></div> <!--세번째 그리드 박스-->
            </div><!--end of row--> 
        </div> <!--end of containar-->
    <br>

        <div class="row">
            <div class="col-sm"></div>
            <div class="col-sm text-center">                
                <!-- Add font awesome icons -->
                <a href="#"  class="fa fa-facebook Social"></a>
                <a href="#"  class="fa fa-twitter Social"></a>
                <a href="#"  class="fa fa-google Social"></a>
                <a href="#"  class="fa fa-yahoo Social"></a>
            </div>
            <div class="col-sm"></div>
        </div>



            </div><!--end of member-s-container-->
            <?php require("../footer.php") ?> 
        </div><!--end of member-m-container-->
    </body>
</html>