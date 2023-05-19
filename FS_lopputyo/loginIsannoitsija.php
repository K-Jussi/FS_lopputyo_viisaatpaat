<?php
    session_start();

    require "conn.php";

    if(isset($_POST['submit'])){

        $asoy = $_POST['asoy'];
        $salasana = $_POST['salasana'];

        $login = $yhteys->query("SELECT * FROM taloyhtio WHERE asoy = '$asoy' AND salasana = '$salasana'");
        $login->execute();
        $data = $login->fetch(PDO::FETCH_ASSOC);

        if($login->rowCount() > 0){
            //echo $login->rowCount();//
            $_SESSION['asoyid'] = $data['asoyid'];
            //echo $_SESSION['asuntoid'];
            header("location: vikaasoy.php");
            

        }else{
            echo "Nimi ja/tai salasana on väärin";
        }

    }

?>