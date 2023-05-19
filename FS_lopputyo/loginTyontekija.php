<?php
    session_start();

    require "conn.php";

    if(isset($_POST['submit'])){

        $email = $_POST['email'];
        $salasana = $_POST['salasana'];

        $login = $yhteys->query("SELECT * FROM tyontekijat WHERE sposti = '$email' AND salasana = '$salasana'");
        $login->execute();
        $data = $login->fetch(PDO::FETCH_ASSOC);

        if($login->rowCount() > 0){
            //echo $login->rowCount();//
            $_SESSION['tyontekijaid'] = $data['tyontekijaid'];
            //echo $_SESSION['asuntoid'];
            header("location: huoltotyoIndex2.php");
            

        }else{
            echo "Sähköposti ja/tai salasana on väärin";
        }

    }