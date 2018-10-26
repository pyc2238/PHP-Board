<!-- 게시판 글 작성 form-->

<?php 
    require_once("C:/xampp/htdocs/TermProject/tools.php");
        
    session_start_if_none();
    
    $uid =  sessionVar("uid");//$uid 변수에 사용자의 id저장 
?>

<!DOCTYPE html>
<html lang="en">   
    <title>User Check</title>
    <link rel="stylesheet" href="/TermProject/community/community.css"> <!--forum css-->
    <link rel="stylesheet" href="/TermProject/icon/css/font-awesome.min.css">   <!--fontAresome-->
    <script type="text/javascript" src="/TermProject/community/naverSmartEdit/nse_files/js/HuskyEZCreator.js" charset="utf-8"></script>
   
   <style>
       form input{margin-right:20px;}
   
   </style>

    <body>     
        <div id="m-community-container">
                <?php require("C:/xampp/htdocs/TermProject/header.php") ?>
            <div id="boader-container">
                
        <div class="container">

    <h2>글 작성</h2><hr>
            <form action="board_write.php" method="post" >
            <table border="2" class="table">
                <tr>
                    <td style="text-align:center;"><b>Title</b></td>
                    <td><input type="text" class="form-control"  name="title" autocomplete=off></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <textarea name="content" id="content" class="nse_content" cols="147" rows="18"> </textarea>
                        <script type="text/javascript">
                              var oEditors = [];
                                nhn.husky.EZCreator.createInIFrame({
                                    oAppRef: oEditors,
                                    elPlaceHolder: "content",   // 에디터 홀더 . textarea의 아이디
                                    sSkinURI: "./nse_files/SmartEditor2Skin.html",
                                    fCreator: "createSEditor2"
                                });
                                function submitContents(elClickedObj) {
                                    // 에디터의 내용이 textarea에 적용됩니다.
                                    oEditors.getById["content"].exec("UPDATE_CONTENTS_FIELD", []);
                                    // 에디터의 내용에 대한 값 검증은 이곳에서 document.getElementById("ir1").value를 이용해서 처리하면 됩니다.
                                    try {
                                        elClickedObj.form.submit();
                                    } catch(e) {}
                                }
                        </script>
                    </td>
                </tr>
            </table>
            <br>
            <hr>
                <input class="btn btn-outline-warning float-right" type="button" value="목록">
                <p data-placement="top" data-toggle="tooltip" title="Delete"> <input class="btn btn-outline-primary float-right"  type="submit" value="글쓰기" data-title="Delete" data-toggle="modal" data-target="#delete" onclick="submitContents(this)" /></p>             
        </form>
  


<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
            <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
         </div>
         <div class="modal-body">
            <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
         </div>
         <div class="modal-footer ">
            <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
         </div>
      </div>
      <!-- /.modal-content --> 
   </div>
   <!-- /.modal-dialog --> 
</div>












                </div><!--end of row--> 
            </div>  <!--end of containar-->

                </div><!--end of member-s-container-->
                <?php require("C:/xampp/htdocs/TermProject/footer.php") ?>      
        </div><!--end of member-m-container-->
    </body>
</html>