<?php
    //Term Project의 공통 모듈

    //회원관리와 로그인 모듈을 위한 상수
    define("MAIN_PAGE","../index.php");
    define("MEMBER_PATH","member");

    //게시판 모듈의 URL을 반환하는 함수
    function bdUrl($file,$num,$page){
        $join = "?";
        
        if($num){
            $file .=$join. "num=$num";
            $join = "&";
        }

        if($page){
            $file .=$join. "page=$page";
        }
        return $file;
    }

    //member 파일의 모듈의 UTl을 반환하는 함수.
    function memberUrl($file,$id){
        $join = "?";
        $file .=$join. "id=$id";
        
        header("Location:$file");
    }


    //세션이 시작되지 않았으면 시작하는 함수
    function session_start_if_none(){
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
    }

    //GET / POST로 전달된 값을 읽어 반환하는 함수
    //해당 값이 정의되어있지 않으면 빈 문자열 반환
    function requestValue($arg){
        return isset($_REQUEST[$arg]) ? $_REQUEST[$arg]: ""; 
    }

    //해당 session 값을 읽어 반환하는 함수
    //해당 값이 정의되어있지 않았으면 빈 문자열 반환
    function sessionVar($arg){
        return isset($_SESSION[$arg]) ? $_SESSION[$arg] : "";
        }

    //지시된 URL로 이동하는 함수
    //이 함수 호출 뒤에 있는 코드는 실행되지 않음
    function goNow($url){
        header("Location:$url");
        exit();
    }

    //경고창에 오류 메시지를 출력하고 이전 페이지로 돌아가는 함수
    function errorBack($msg){
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Document</title>
        </head>
        <body>
            <script>
                alert('<?= $msg ?>');
                history.back();
            </script>
        </body>
        </html>
    
<?php

        exit();
    }

    //경고창에 지정된 메시지를 출력하고 
    //지정된 페이지로 돌아가는 함수
    function okGo($msg,$url){
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Document</title>
        </head>
        <body>
            <script>
                alert('<?= $msg ?>');
                location.href="<?= $url ?>";
            </script>       
        </body>
        </html>
<?php
        exit();
    }
?>