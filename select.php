<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SELECT</title>
</head>
<body>
    <?php
        ini_set("display_errors","1");
        //error_reporting('E_all');

    require_once("config.php");
   

        try{
             $conn     = new PDO($dsn, $user, $password);
             echo "connection etablir <br>";
        }
        catch(PDOExerption $e){
            die( $e->getMessage());
        }
       $req="select * from publishers ;";
       $res=$conn->query($req);//Il contient les donner returner par le sgbd
       if($res->rowCount()==0)
            echo "la table est vide  <br>";
        else 
             echo "nombre de linge trouver:" .$res->rowCount()."<br>";
             echo "<table  border='1px'> ";
             echo"<tr> <td>ID</td> <td>Name</td> </tr> ";
             while($ligne=$res->fetch(PDO::FETCH_NUM)){
                echo "<tr><td>";
                echo $ligne[0];
                echo "</td><td>";
                echo $ligne[1];
                echo "</td></tr>";

             }
            echo "</table";
    ?>
</body>
</html>

