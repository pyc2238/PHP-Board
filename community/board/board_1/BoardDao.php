<?php 
    //게시판을 위한 DAO클래스
    //객체가 생성되면 이 생성자는 데이터베이스에 접속하고 PDO 객체를 이 클래스의 private프로퍼티인 $pdo에 저장한다.ㄴ
    Class BoardDao{
        private $pdo;   //pdo객체를 저장하기 위한 변수

        public function __construct(){
            try{
                $this->pdo = new PDO("mysql:host=localhost;port=3308;dbname=termproject","root","password");
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }


        //게시판 전체 글 수 (전체 레코드 수 )반환
        //게시판의 전체글 수 ,즉 boardtest의 테이블의 젠체 레코드 수를 반환한다. 테이블에 들어있는 레코드의 개수를 알아내기 위해
        //"select count(*) from boardtest"를 사용하였다. 이 쿼리를 사용하면 하나의 값(테이블의 전체레코드 개수)만 반환되므로,
        //fetchColumn()메서드로 그 값을 읽어 레코드의 수를 구한다.
        public function getNumMsgs(){
            try{
                $sql = "select count(*) from boardtest";
                $pstmt = $this->pdo->prepare($sql);
                $pstmt->execute();
                
                $numMsgs = $pstmt->fetchColumn();   // 결과 세트의 다음 행에 있는 단일 컬럼을 리턴합니다.
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $numMsgs;
        }




        //$num번 게시글의 데이터 반환
        //지정된 번호의 게시글 데이터를 하나의 연관 배열로 만들어 반환한다. 연관 배열의 인덱스는 필드명이다.
        public function getMsg($num){
            try{
                $sql = "select * from boardtest where num = :num";
                $pstmt = $this->pdo->prepare($sql);
                $pstmt->bindValue(":num",$num,PDO::PARAM_INT);
                $pstmt->execute();

                $msg = $pstmt->fetch(PDO::FETCH_ASSOC); //레코드를 연관배열로 담아 반환한다.

            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $msg;
        }

        //$star번부터 $rows개의 게시글 데이터 반환(2차원 배열)
        //이 함수는 게시판 메인 화면에서 게시글들의 리스트를 출력할 때, 현재 페이지에 보여줄 게시글 데이터들을 읽어오기 위해 사용한다.
        //limit 읽어오기 시작할 레코드 번호 , 읽어올 레코드 개수
        //ordet by 필드명 desc = 레코드들이 내림차순으로 정렬
        //글번호가 역순으로 나오는 것은 최신 게시글을 보여주기 위해
        public function getManyMsgs($start,$rows){
            try{
                $sql = "select * from board_1 order by num desc limit :start, :rows";

                $pstmt = $this->pdo->prepare($sql);
                $pstmt->bindValue(":start",$start,PDO::PARAM_INT);
                $pstmt->bindValue(":rows",$rows,PDO::PARAM_INT);
                $pstmt->execute();

                $msgs = $pstmt->fetchAll(PDO::FETCH_ASSOC);

            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $msgs;
        }

        //새 글을 DB에 추가
        //새 글을 저장 하기 위해,주어진 데이터로 insert 쿼리를 실행한다.
        public function insertMsg($writer,$title,$content){
            try{
                $sql = "insert into board_1 (writer,title,content,regtime,hits,commend) values(:writer,:title,:content,:regtime,0,0)";
                $pstmt = $this->pdo->prepare($sql);
                
                $regtime = date("m-d");
                $pstmt->bindValue(":writer",$writer,PDO::PARAM_STR);
                $pstmt->bindValue(":title",$title,PDO::PARAM_STR);
                $pstmt->bindValue(":content",$content,PDO::PARAM_STR);
                $pstmt->bindValue(":regtime",$regtime,PDO::PARAM_STR);
                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }


        //$num번쨰 게시글 업데이트
        //게시글 데이터를 수정하기 위해,주어진 데이터로 update쿼리를 실행한다.
        public function updateMsg($num,$writer,$title,$content){
            try{
                $sql = "update boardtest set writer=:writer,title=:title,content=:content where num = :num";
                $pstmt = $this->pdo->prepare($sql);
                $pstmt->bindValue(":num",$num,PDO::PARAM_INT);
                $pstmt->bindValue(":writer",$writer,PDO::PARAM_STR);
                $pstmt->bindValue(":title",$title,PDO::PARAM_STR);
                $pstmt->bindValue(":content",$content,PDO::PARAM_STR);
                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }


        //$num번 게시글 삭제
        //게시글을 삭제하기 위해, $num번쨰 레코드에 delete 쿼리를 실행한다.
        public function deleteMsg($num){
            try{
                $sql = "delete from boardtest where num= :num";
                $pstmt = $this->pdo->prepare($sql);
                $pstmt->bindValue(":num",$num,PDO::PARAM_INT);
                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        //$num번 게시글 조회수 1증가
        //게시글 조회수를 1증가시키기 휘해 hits 필드에 대해 update 쿼리를 실행한다.
        public function increaseHits($num){
            try{
                
                $sql ="update boardtest set hits=hits+1 where num = :num";
                $pstmt = $this->pdo->prepare($sql);
                $pstmt->bindValue(":num",$num,PDO::PARAM_INT);
                
                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }


    }
?>