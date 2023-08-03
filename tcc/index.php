<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css do projeto -->
    <link rel="stylesheet" href="css/style.css">
    <!-- css do bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- titulo do projeto -->
    <title>A Boa</title>
</head>

<body class="shrink">
  <div class="container">

    <?php
      include("base/pages.php");
    ?>    
    
  </div> <!-- container -->

  
  <!-- script jquery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- script -->
  <script src="js/script.js"></script>
  <!-- script do bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>