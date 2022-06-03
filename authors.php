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
<?php
if (isset($_POST['author'])) $author = $_POST['author'];
  else $author = 'Джозеф Конрад';

  print "<table border ='1'>";
    print " <tr><td><b>Назва</td><td><b>ISBN</td><td><b>Рік</td><td><b>Видавництво</td><td><b>Кількість сторінок</td></tr>";
    $coll=$tbl->find(["authors"=>$author],["projection"=>["_id"=>0]]);
          
    foreach ($coll as $col) {
      $nam=$col['name'];
      $isb=$col['ISBN'];
      $yea=$col['year'];
      $pub=$col['publisher'];
      $qua=$col['quantity'];
      print " <tr><td>$nam</td><td>$isb</td><td>$yea</td><td>$pub</td><td>$qua</td></tr>";
    
    }
?>
<input type="button" value="Повернутися" onclick="history.back();return false;" />
</body>
</html>
<!--  -->