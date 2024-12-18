<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "myweb";
    $conn = new mysqli($servername, $username, $password, $database);

    if(isset($_POST['submitBtn'])){
        $name= $_POST['name'];
        $contact = $_POST['contact'];

        $conn->query("CALL call_brand('$name', '$contact')");
    }

    if(isset($_POST['addBtn'])){
        $name = $_POST['aName'];
        $price = $_POST['aPrice'];
        $aid = $_POST['productList'];

        $conn->query("CALL call_product('$name', '$price', '$aid')");
    }
    if(isset($_POST['delBtn'])){
        $aid = $_POST['delManu'];

        $conn->query("DELETE FROM brand WHERE id = '$aid'");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Table</title>
</head>
<body>
    <section>
        <form action="" method='POST'>
            <div>
                <label for="">Name</label><br>
                <input type="text" name="name" id="name"><br>
                <label for="">Contact</label><br>
                <input type="text" name="contact" id="contact"><br>
                <button name="submitBtn">Submit</button>
            </div>
        </form>
        <form method="POST" action="">
        <h2>Product Table</h2>
            <div>
                <table>
                    <tr>
                        <td><label for="">Name</label></td>
                        <td><input type="text" name="aName" id="name"></td>
                    </tr>
                    <tr>
                        <td><label for="">Price</label></td>
                        <td><input type="text" name="aPrice" id="price"></td>
                    </tr>
                    <tr>
                        <td><label for="">Product List</label></td>
                        <td>
                            <select name="productList" id="">
                                <?php
                                    $productList = $conn->query('SELECT * FROM brand');
                                    while(list($id,$name) = $productList->fetch_row()){
                                        echo "<option value= '$id'>$name</option>";
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                    
                </table>
                <button name='addBtn'>Add Product</button><br><br>
                <table>
                <tr>
                        <td><label for="">Delete Manufactur</label></td>
                        <td>
                            <select name="delManu" id="">
                                <?php
                                    $productList = $conn->query('SELECT * FROM brand');
                                    while(list($id,$name) = $productList->fetch_row()){
                                        echo "<option value= '$id'>$name</option>";
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                </table>
                <button name='delBtn'>Delete Product</button><br><br>
            </div>
        </form>
    </section>
</body>
</html>