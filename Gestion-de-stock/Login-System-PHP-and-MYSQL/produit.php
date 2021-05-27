<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<?php

include "./db_conn.php";
$produit = $_GET['produit'];

$sql = "SELECT *  FROM produit WHERE  catagorie='$produit'";
$res = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./style1.css">
</head>

<body>
    <div class="container">

        <h1 class="text-center">Produit</h1>
        <div class="row ">
            <?php if (mysqli_num_rows($res)) { ?>



                <?php
                $i = 0;
                while ($rows = mysqli_fetch_assoc($res)) {
                    $i++;
                ?>
                    <br>
                    <div class="col-lg-4 mb-5 ">
                        <div class="card ">

                            <img src="<?= $rows['img'] ?>" class="img-fluid" alt="">
                            <h5 class="font-weight-bold px-3"> <?= $rows['name'] ?> </h5>
                            <p class="font-weight-bold px-3">Quantité max:<?= $rows['Quantite_max']; ?></p>
                            <p class="font-weight-bold px-3">Quantité min:<?= $rows['Quantite_min']; ?></p>
                            <p class="font-weight-bold px-3">Prix:<?= $rows['prix']; ?></p>
                            <div class="d-flex">
                                <a href="delete_produit.php?id=<?= $rows['id'] ?>&category=<?= $rows['catagorie'] ?>" class="btn btn-danger">Delete</a>
                                <a href="./update_produit.php?id=<?= $rows['id'] ?>&category=<?= $rows['catagorie'] ?>" class="btn btn-success">Update</a>
                            </div>


                        </div>

                    </div>




                <?php } ?>
            <?php } ?>
        </div>
    </div>
</body>

</html>