<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE</title>
</head>
<body>
    <?php
        ini_set("display_errors","1");
        //error_reporting('E_all');

    require_once("config.php");
   
    if (isset($_POST['nom'])){
        try{
             $nom=$_POST['nom'];
             $conn = new PDO($dsn, $user, $password);
             echo "connection etablir <br>";
        }
        catch(PDOExerption $e){
            die( $e->getMessage());
        }

        $req="select * from publishers where name='$nom';";
        $res=$conn->query($req);//Il contient les donner returner par le sgbd
        if($res->rowCount()==0)
            echo "editeur introvable";
         else 
            echo"<form action='update.php' method='post'>";
              echo "nombre de linge trouver:" .$res->rowCount()."<br>";
              $ligne=$res->fetch(PDO::FETCH_NUM);
              echo "<form action='update.php' method='post'> ";
              echo " id   : <input type='text' name='id1' value='$ligne[0]'>";
              echo " name : <input type='text' name='nom2' value='$ligne[1]'>";
              echo "<input type='submit' value='modifier' >";
              echo "</form";
    }
    if(isset($_POST['nom2'])){
        try{
            $nom=$_POST['nom2'];
            $conn = new PDO($dsn, $user, $password);
            echo "connection etablir <br>";
       }
       catch(PDOExerption $e){
           die( $e->getMessage());
       }

       $req="update publishers set name='$nom';";
       $res=$conn->exec($req);//Il contient les donner returner par le sgbd
       $req2="select * from publishers where name='$nom';";
       $res2=$conn->query($req2);//Il contient les donner returner par le sgbd
       if($res2->rowCount()==0)
           echo "editeur introvable";
        else 
           echo"<form action='update.php' method='post'>";
             echo "nombre de linge modefier²    :" .$res2->rowCount()."<br>";
             $ligne=$res2->fetch(PDO::FETCH_NUM);
             echo " id   : <input type='text' name='id1' value='$ligne[0]'>";
             echo " name : <input type='text' name='nom2' value='$ligne[1]'>";


    }
    ?>
</body>
</html>