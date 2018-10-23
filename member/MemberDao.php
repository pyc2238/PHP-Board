<?php
    // 웹 사이트 회원 가입을 위한 MemberDao

    Class MemberDao{
        private $pdo; //데이터 베이스 PDO객체 저장 변수
        
        //DB에 접속하고 PDO객체를 $pdo에 저장
        public function __construct(){
            try{
                $this->pdo = new PDO("mysql:host=localhost;port=3308;dbname=termproject","root","password");

                $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }



        //아이디가 $id인 레코드를 반환
        public function getMember($id){
            try{
                $sql = "select * from members where id = :id";
                $pstmt = $this->pdo->prepare($sql);
                $pstmt->bindValue(":id",$id,PDO::PARAM_STR);
                $pstmt->execute();

                $result = $pstmt->fetch(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $result;
        }

           //아이디가 $id인 레코드를 반환
           public function getMemberEmail($email){
            try{
                $sql = "select email from members where email = :email";
                $pstmt = $this->pdo->prepare($sql);
                $pstmt->bindValue(":email",$email,PDO::PARAM_STR);
                $pstmt->execute();

                $result = $pstmt->fetch(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $result;
        }

        // 회원가입 
        public function insertMember($id,$nickname,$pw,$gender,$age,$address,$country ,$email){
            try{
                $sql = "insert into members (id,nickname,pw,gender,age,address,country,email ) values (:id,:nickname,:pw,:gender,:age,:address,:country,:email )";
                $pstmt = $this->pdo->prepare($sql);
                $pstmt->bindValue(":id",$id,PDO::PARAM_STR);
                $pstmt->bindValue(":nickname",$nickname,PDO::PARAM_STR);
                $pstmt->bindValue(":pw",$pw,PDO::PARAM_STR);
                $pstmt->bindValue(":gender",$gender,PDO::PARAM_STR);
                $pstmt->bindValue(":age",$age,PDO::PARAM_INT);
                $pstmt->bindValue(":address",$address,PDO::PARAM_STR);
                $pstmt->bindValue(":country",$country,PDO::PARAM_STR);
                $pstmt->bindValue(":email",$email,PDO::PARAM_STR);
                
                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }



         //아이디가 $id인 회원의 비밀번호 업데이트
         public function updatePassword($id,$pw){
            try{
                $sql ="update members set pw=:pw where id=:id ";
                $pstmt = $this->pdo->prepare($sql);
                $pstmt->bindValue(":id",$id,PDO::PARAM_STR);
                $pstmt->bindValue(":pw",$pw,PDO::PARAM_STR);

                $pstmt->execute();
                
            }catch(PDOException $e){
                exit($e->getMessage());
            }     
        }


        //아이디가 $id인 회원정보 업데이트
        public function updateMember($id,$selfContext){
            try{
                $sql ="update members set selfContext=:selfContext where id=:id ";
                $pstmt = $this->pdo->prepare($sql);
                $pstmt->bindValue(":id",$id,PDO::PARAM_STR);
                $pstmt->bindValue(":selfContext",$selfContext,PDO::PARAM_STR);

                $pstmt->execute();
                
            }catch(PDOException $e){
                exit($e->getMessage());
            }     
        }

          //$id를 가진 회원 정보 삭제
          public function deleteMember($id){
            try{
                $sql = "delete from members where id=:id";
                $pstmt = $this->pdo->prepare($sql);
                $pstmt->bindValue(":id",$id,PDO::PARAM_STR);
                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        //아이디가 $id인 레코드를 반환
        public function findId($email){
            try{
                $sql = "select id from members where email = :email";
                $pstmt = $this->pdo->prepare($sql);
                $pstmt->bindValue(":email",$email,PDO::PARAM_STR);
                $pstmt->execute();

                $result = $pstmt->fetchColumn();    // 해당 칼럼의 값을 반환
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $result;
        }



    }
?>