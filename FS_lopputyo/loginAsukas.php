<?php
    session_start();

    require "conn.php";

    if(isset($_POST['submit'])){

        $asunto = $_POST['asunto'];
        $salasana = $_POST['salasana'];

        $login = $yhteys->query("SELECT * FROM asunnot WHERE asunto = '$asunto' AND salasana = '$salasana'");
        $login->execute();
        $data = $login->fetch(PDO::FETCH_ASSOC);

        if($login->rowCount() > 0){
            //echo $login->rowCount();//
            $_SESSION['asuntoid'] = $data['asuntoid'];
            //echo $_SESSION['asuntoid'];
            header("location: vikailm2.php");
            

        }else{
            echo "Nimi ja/tai salasana on väärin";
        }

    }




?>