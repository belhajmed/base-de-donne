<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSERTION</title>
</head>
<body>
    <?php
        ini_set("display_errors","1");
        //error_reporting('E_all');

    require_once("config.php");
   

        try{
            $nom=$_POST['nom'];
             $conn     = new PDO($dsn, $user, $password);
             echo "connection etablir <br>";
        }
        catch(PDOExerption $e){
            die( $e->getMessage());
        }
       $req="insert into publishers (name)values('$nom');";
       $res=$conn->exec($req);
       if($res==0)
            echo "probleme d'insertion <br>";
        else 
             echo "insertion terminer <br>";
             
    ?>
</body>
</html>

