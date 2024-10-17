<!-- بسم الله -->
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Facture Café</title>
 <link rel="stylesheet" href="style.css">
 <style>

 </style>
</head>
<body>
  

 <?php
 $dsn = 'mysql:host=localhost;dbname=cofe';
 $con = new PDO($dsn,'root','');

 function getdata(){
  global $con;
  $sql = "SELECT  * FROM article ";
  $req = $con-> prepare($sql);
  $req->execute();
  $res = $req-> fetchAll(PDO::FETCH_ASSOC);
  return $res;
 };
 $article_data = getdata();
 ?>
 
 
 <div class="card">
   <h1>GOLD CUP COFFEE</h1>
   <p>AV AL ALAOUINE</p>
   <p>06 EL JADIDA</p>
   <p>Clé wifi:zte-5G-cx7nhd:uuuxMUhGA</p>
   <p>Heure : <span id="heure"></span></p>
   <form action="" method="post">
    <p>choisissez un article</p>
    <select name="article">
            <?php
            foreach($article_data as $item){
              echo "<option value='".$item['idArticle']."'>".$item['nom']."</option>";
      
            }
            ?>
    </select>
    <p>quantite</p>
    <input type="number" name="qte" value="1"><br>
    <input type="submit" value="facturer" name="tax" class="input">
   </form>
   <p>Merci pour vote visite</p>
   <?php
       if(isset($_POST["tax"]))
       {
        $_SESSION['article'] = $_POST['article'];
        $_SESSION['qte'] = $_POST['qte'];
        header('location:facture.php');
       }
   ?>
<script src="script.js"></script>
</body>
</html>
