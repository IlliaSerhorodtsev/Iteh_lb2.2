<?php
  require_once __DIR__ . "/vendor/autoload.php";
  $con = new MongoDB\Client("mongodb://localhost:27017");
  $db =$con->Lb2_Iteh;
  $tbl= $db->Library;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Lb2</title>
</head>
<body>
<div class="MyForm">
<form action="authors.php" method="post">
      <h3>Получить информацию по имени автора</h3>
      <select name='author'>
        <?php
        
        
        
           $coll=$tbl->find(["type"=>"book"],["projection"=>["_id"=>0,"authors" => 1]]);
          
          foreach ($coll as $col) {
            $nam=$col['authors'];
            var_dump($col);
            print "<option value = '$nam'>$nam</option>";
          
          }
        ?>
      </select>
      <br>
      <input type="submit" value="ok">
    </form>
    <br>
    <form action="year.php" method="post">
      <h3>Получить информацию по году</h3>
      <input name='FYear' >

      </input>
      ПО
      <input name='SYear' >

      </input>
      <br>
      <input type="submit" value="ok">
    </form>
    <br>
    <form action="publisher.php" method="post">
      <h3>Получить информацию по издательству</h3>
      <select name='publisher'>
        <?php
         $coll=$tbl->find(["publisher"=>['$exists'=>true]]);
          
         foreach ($coll as $col) {
           $nam=$col['publisher'];
           var_dump($col);
           print "<option value = '$nam'>$nam</option>";
         }
        ?>
      </select>
      <br>
      <input type="submit" value="ok">
    </form>
  </div>
 </body>
</html>
