<?php
    session_start();
    $db = "Product_details";
    $zzz = mysqli_connect("localhost","root","",$db);
    if (isset($_POST["push"])){
        if (isset($_SESSION["mycart"])){
            $badbunny = array_column($_SESSION["mycart"],"pid");
            if (!in_array($_GET["id"],$badbunny)){
                $zelda = count($_SESSION["mycart"]);
                $hanzo = array(
                    'pid' => $_GET["id"],
                    'pname' => $_POST["hname"],
                    'pprice' => $_POST["hprice"],
                    'pq' => $_POST["quantity"],
                );
                $_SESSION["mycart"][$zelda] = $hanzo;
                echo '<script>window.location="allurashopcart.php"</script>';
            }else{
                echo '<script>alert("Product is already present in the Cart")</script>';
                echo '<script>window.location="allurashopcart.php"</script>';
            }
        }else{
            $hanzo = array(
                'pid' => $_GET["id"],
                'pname' => $_POST["hname"],
                'pprice' => $_POST["hprice"],
                'pq' => $_POST["quantity"],
            );
            $_SESSION["mycart"][0] = $hanzo;
        }
    }

    if (isset($_GET["action"])){
        if ($_GET["action"] == "delete"){
            foreach ($_SESSION["mycart"] as $keys => $value){
                if ($value["pid"] == $_GET["id"]){
                    unset($_SESSION["mycart"][$keys]);
                    echo '<script>alert("Product removed successfully!")</script>';
                    echo '<script>window.location="allurashopcart.php"</script>';
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link rel="stylesheet" href="styles.css">
</head>
<body>
    <div id ="myDiv">
    <button type="button"><a href="allurashopcart.php"><img src="carty.PNG" alt="modelphoto" id="first3"></a></button>
    </div>
    <h1>Welcome to <b>Allura</b>Shop!</h1>
    <p>This Fall, give your skin the care it deserves. Treat yourself to these revitalizing products which are gentle yet effective<br> to target troubled skin areas. Formulated to perfection with Witch hazel and Salicylic Acid to help soothe and exfoliate the skin.</p><br>
    <img src="Untitled-1.JPG" alt="modelphoto" id="first1"><br><br>
    <!--
    <button><a href='logout.php'>Click here to log out</a></button> -->
    <div class="container" style="width: 90%">

    <?php
    $find = "SELECT * FROM listing ORDER BY id ASC ";
    $extract = mysqli_query($zzz,$find);
            if(mysqli_num_rows($extract)>0) {
                while ($element = mysqli_fetch_array($extract)) {
                    ?>
                    <div class="col-md-4">
                        <form method="post" action="allurashopcart.php?action=push&id=<?php echo $element["id"]; ?>">
                              &nbsp
                            <div class="bunny">
                                <img src="<?php echo $element["image"]; ?>" class="img-responsive">
                                <h4 class="text-info"><?php echo $element["pname"]; ?></h4>
                                <h4 class="text-danger">$<?php echo $element["price"]; ?></h4>
                                <input type="text" name="quantity" class="form-control" value="1">
                                <input type="hidden" name="hname" value="<?php echo $element["pname"]; ?>">
                                <input type="hidden" name="hprice" value="<?php echo $element["price"]; ?>"><br>
                                <input type="submit" name="push" value="Add to Cart"><br>
                            </div>
                        </form>
                    </div>
                    <?php
                }
            }
        ?>
<img src="t1.JPG" alt="modelphoto" id="first2">
</div>
<!-- Footer -->

<footer class="white-section" id="footer">
    <div class="container-fluid">

        <a href="https://twitter.com/" style="color:#ffffff;"><i class="footer-icon fab fa-twitter"></i></a>
        <a href="https://www.facebook.com/" style="color:#ffffff;"><i class="footer-icon fab fa-facebook-f"></i></a>
        <a href="https://www.instagram.com/?hl=en" style="color:#ffffff;"><i class="footer-icon fab fa-instagram"></i></a>

        <p>© Copyright 2020 Allura</p>
    </div>
</footer>


</body>
</html>
