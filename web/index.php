<?php
include(__DIR__."/../vendor/autoload.php");

$f = new OtterFarm\Farm;

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Ferme des Loutres</title>
  <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
  <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
  
    <div class="row">    
      <h1><?php echo $f->helloMessage(); ?></h1>
    </div>
    <div class="row">
      <form method="post" action="/buy.php">
      <input type="text" name="qty" placeholder="quantité" />
      <input type="text" name="price" placeholder="price"/>
      <button type="submit" class="btn btn-large">Acheter</button>
    </form>
    </div>
  </div>
</body>
</html>



