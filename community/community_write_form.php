<!-- 게시판 메인 페이지 -->

<?php
    require_once("C:/xampp/htdocs/TermProject/tools.php");

    $page = requestValue("page");

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="./community.css">
    <!--forum css-->
    <link rel="stylesheet" href="/TermProject/icon/css/font-awesome.min.css">
    <!--fontAresome-->
    <script src="/TermProject/ckeditor/ckeditor.js"></script>

    <title>write_form</title>

    <?php
        require("C:/xampp/htdocs/TermProject/html_head.php");
    ?>
</head>


<style>
    form input{margin-right:20px;}
</style>

<body>
    <div id="m-community-container">
        <?php require("C:/xampp/htdocs/TermProject/header.php") ?>
        <div id="s-community-container">


            <div class="container">

                <h2>NEITTER-글 작성</h2>
                <hr>
                <form action="community_write.php" method="post">
                    <table border="2" class="table">
                        <tr>
                            <td style="text-align:center;"><b>Title</b></td>
                            <td><input type="text" class="form-control" name="title" autocomplete=off></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <textarea name="content" id="content"></textarea>
                                <script type="text/javascript">
                                    CKEDITOR.replace('content', {
                                        'filebrowserUploadUrl': '/TermProject/community/upload.php'

                                    });
                                </script>

                            </td>
                        </tr>
                    </table>
                    <hr>
                    <input class="btn btn-outline-warning float-right" type="button" value="목록" onclick="location.href='<?= bdUrl('./community.php',0,$page,0,0) ?>'">
                    <input class="btn btn-outline-primary float-right" type="submit" value="글쓰기" onclick="submitContents(this)" />
                    <br>


                </form>
            </div>
            <!--contanier-->

        </div>
        <?php require("C:/xampp/htdocs/TermProject/footer.php") ?>
    </div>
    <!--m-community-container-->

</body>

</html>