<?php
    //Term Project의 공통 모듈

    //회원관리와 로그인 모듈을 위한 상수
    define("MAIN_PAGE","/TermProject/index.php");
    define("MEMBER_PATH","member");



    //게시판 모듈의 URL을 반환하는 함수
    function bdUrl($file, $num, $page, $searchChoice, $search){
        $join = "?";
        
        if($num){
            $file .=$join. "num=$num";
            $join = "&";
        }

        if($page){
            $file .= $join . "page=$page";
        }
        if($searchChoice) {
            $file .= '&' . "searchChoice=$searchChoice";
        }
        if($search) {
            $file .= '&' . "search=$search";
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


    function translation($papago) {
          // 네이버 Papago SMT 기계번역 Open API 
          $client_id = "XhF4hpyBJquD0uxxiIT9"; // 네이버 개발자센터에서 발급받은 CLIENT ID
          $client_secret = "v15ft5DNeN";// 네이버 개발자센터에서 발급받은 CLIENT SECRET
          $encText = urlencode($papago);
          $postvars = "source=ko&target=ja&text=".$encText;
          $url = "https://openapi.naver.com/v1/language/translate";
          $is_post = true;
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_POST, $is_post);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch,CURLOPT_POSTFIELDS, $postvars);
          $headers = array();
          $headers[] = "X-Naver-Client-Id: ".$client_id;
          $headers[] = "X-Naver-Client-Secret: ".$client_secret;
          curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
          $response = curl_exec ($ch);
          $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
          //   echo "status_code:".$status_code."<br>";
          curl_close ($ch);
          
          if($status_code == 200) {  
              $json = json_decode($response, true);
              $translation = $json['message']['result']['translatedText']; 
    
        } else {
            $translation = '점검 중';
            //   echo "Error 내용:".$response;
          }
          return  $translation;
    }
?>