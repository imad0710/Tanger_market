<?php
    require_once('./db_conn.php');
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $reqModslc = "SELECT * FROM produit WHERE id='$id'";
        $resul = mysqli_query($conn, $reqModslc);
        $lignmod = mysqli_fetch_assoc($resul);
    }
    ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Page Modifier</title>
     <link rel="stylesheet" href="style.css" />

 </head>

 <body>
     <div id="container">
         <form name="formUpdate" method="POST" action="" class="formulaire" enctype="multipart/form-data">
             <h2 align="center">Mettre a jour une produit</h2>

             <label><b>Nom :</b></label>
             <input type="text" name="txtnom" class="zonetext" value="<?php echo $lignmod['name']; ?>" required>

             <label><b>Prix :</b></label>
             <input type="number" name="txtprix" class="zonetext" value="<?php echo $lignmod['prix']; ?>" required>

             <label><b>Quantité minimale :</b></label>
             <input type="number" name="txtqmin" class="zonetext" value="<?php echo $lignmod['Quantite_max']; ?>" required>

             <label><b>Catégory :</b></label>
             <input type="text" name="txtcatg" class="zonetext" value="<?php echo $lignmod['catagorie']; ?>" required>



             <input type="submit" name="btmodifier" value="Mettre a jour" class="submit">


             <label style="text-align:center;color:#960406">



         </form>

     </div>


     <?php
        if (isset($_POST['btmodifier'])) {
            $name = $_POST['txtnom'];
            $prix = $_POST['txtprix'];
            $qua = $_POST['txtqmin'];
            $ctg = $_POST['txtcatg'];
            $id = $_GET['id'];
            $category = $_GET['category'];



            $reqUpd = "UPDATE produit SET name='$name',prix='$prix'
                ,Quantite_max='$qua',catagorie='$ctg'
                 WHERE id='$id'";
            $resultat = mysqli_query($conn, $reqUpd);
            if ($resultat) {
                header("location:produit.php?produit=$category");
            } else {
                echo "Echec de modification des Données";
            }
        }
        ?>
 </body>

 </html>