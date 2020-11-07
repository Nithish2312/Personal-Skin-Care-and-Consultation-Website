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
                echo '<script>alert("Product already in Cart!")</script>';
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
<title>Parth Sachan | 18BCE2373</title>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
     <style>
        body{
            text-align: center;
            padding: 2px;

            background-size: 300px 300px;
        }
        .bunny6{
            color: white;
            background-color: Tomato;
            padding: 1%;
        }
        h5{
             color: #F64A8A;
        }
        h1{
            padding: 8px;
            color: white;
            background-color: Tomato;
        }
        table{
            background-color: white;
        }
        table th{
            text-align: center;
            background-color: Tomato;
        }
        button{
        background-color: Tomato;
        padding:20px;
        position: relative;
        font-size: 20px;
    }
    </style>
</head>
<body>

        <div style="clear: both"></div>
        <h2 class="bunny6">Your Cart</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
            <tr>
                <th width="25%">Product Name</th>
                <th width="10%">Quantity</th>
                <th width="15%">Item Price</th>
                <th width="10%">Total Price</th>
                <th width="20%">Remove Item</th>
            </tr>
            <?php

                if(!empty($_SESSION["mycart"])){
                    $final = 0;
                    foreach ($_SESSION["mycart"] as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $value["pname"]; ?></td>
                            <td><?php echo $value["pq"]; ?></td>
                            <td>$<?php echo $value["pprice"]; ?></td>
                            <td>
                                $ <?php echo number_format($value["pq"] * $value["pprice"], 2); ?></td>
                            <td><a href="allurashopcart.php?action=delete&id=<?php echo $value["pid"]; ?>"><span class="text-danger">REMOVE ITEM</span></a></td>
                        </tr>
                        <?php
                        $final = $final + ($value["pq"] * $value["pprice"]);
                        }
                        ?>
                        <tr>
                            <td colspan="3"></td>
                            <th align="right">TOTAL: $<?php echo number_format($final, 2); ?></th>
                            <td></td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
        </div>
    </div>
    <button><a href="allurashop.php">RETURN TO SHOP</a></button>
    <button><a href="../session_expired.php">LOGOUT</a></button>

</body>
</html>
