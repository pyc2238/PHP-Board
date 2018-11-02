<?php 

    $title = $_REQUEST["id"];
    $sea = $_REQUEST["sea"];

    switch($sea){

        case "title": echo "타이틀";
            break;
        case "writer" : echo  "작성자";
            break;
    }
?>