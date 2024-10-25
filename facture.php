<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Document</title>
 <link rel="stylesheet" href="style2.css">
</head>
<body>
 <?php
 $pdo = new PDO('mysql:host=localhost;dbname=cofe','root','');
 function getProduit(){
global $pdo;
$sql = "SELECT * FROM article WHERE idArticle = ?";
$req = $pdo->prepare($sql);
$req ->execute([$_SESSION['article']]);
$res = $req->fetch(PDO::FETCH_ASSOC);
return $res;
 }
 ?>
   <div class="card">
   <h1>GOLD CUP COFFEE</h1>
   <p>AV AL ALAOUINE</p>
   <p>06 EL JADIDA</p>
   <p>Clé wifi:zte-5G-cx7nhd:uuuxMUhGA</p>
   <p>Heure : <span id="heure"></span></p>
  
 
   
        <table id="items_list">
            <thead>
                <tr>
                    <th>QTE</th>
                    <th>ARTICLE</th>
                    <th>PRIX</th>
                </tr>
            </thead>
            <tbody>
                    <?php 
                        if(isset($_SESSION['qte']) && isset($_SESSION['article'])) {

                    ?>
                     <td>
                         <?php echo $_SESSION['qte']; ?>
                     </td>
                     <td>
                         <?php 
                            $item_data = getproduit();
                            echo $item_data['nom']; 
                         ?>
                     </td>
                     <td>
                        <?php echo $item_data['prix'] * $_SESSION['qte']; ?>
                     </td>

                <td>

                </td>
            </tbody>
            <tfoot>
                <tr>
                    <th>TOTAL :</th>
                    <th><?php echo $item_data['prix'] * $_SESSION['qte']; ?></th>
                </tr>
            </tfoot>
            <?php
                 } 
            ?>
    
        </table>
    </div>
    <!-- <script src="script.js"></script> -->

</table>
 </div>
 <script src="script.js"></script>
</body>
</html>