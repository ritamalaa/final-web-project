<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Produktet</title>
        <link rel="stylesheet" href="css/products.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    </head>
    <body>
        <main>
<?php 
include "header.php"; 
include "ProdController.php"; 
?>


<div id="all">
    <?php 
        $produktet = new ProdController;
        $all = $produktet->readData();
        $counter = 0;
        $num_prod_teShfaqura = 0;
        foreach ($all as $product) {
            if ($num_prod_teShfaqura == 28) {
                break; 
            }
            if ($counter % 4 == 0) {
                echo '<div class="rreshti">';
            }
            echo '<div class="p"><img src="' . $product["prod_foto"] . '" class="k"><div class="pershkrimi">' . $product["prod_pershkrimi"] . '<br><b>' . $product["prod_cmimi"] . '€</b></div><a href="login.php"><button class="blej">JOIN THE WAITLIST</button></a></div>';
            $counter++;
            if ($counter % 4 == 0) {
                echo '</div>';
            }
            $num_prod_teShfaqura++;
        }
        if ($counter % 4 != 0) {
            echo '</div>';
        }
    ?>
</div>
        </main>
       <?php 
    include "footer.php";  
?>
    </body>
    </html>