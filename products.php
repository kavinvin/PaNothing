<?php

    if(isset($_GET['action']) && $_GET['action']=="add"){

        $id=intval($_GET['id']);

        if(isset($_SESSION['cart'][$id])){

            $_SESSION['cart'][$id]['quantity']++;

        }else{

            $sql_s="SELECT * FROM products
                WHERE id_product={$id}";
            $query_s=mysql_query($sql_s);
            if(mysql_num_rows($query_s)!=0){
                $row_s=mysql_fetch_array($query_s);

                $_SESSION['cart'][$row_s['id_product']]=array(
                        "quantity" => 1,
                        "price" => $row_s['price']
                    );


            }else{

                $message="This product id it's invalid!";

            }

        }

    }

?>
    <?php
        if(isset($message)){
            echo "<h2>$message</h2>";
        }
    ?>
    <div class='container'>
        <div class="col-xs-12 panel panel-default">
            <div class="col-xs-4">ชื่อสินค้า</div>
            <div class="col-xs-3">ข้อมูลสินค้า</div>
            <div class="col-xs-3">ราคา</div>
            <div class="col-xs-2">ใส่ตระกร้า</div>
        </div>

        <?php

            $sql="SELECT * FROM products ORDER BY name ASC";
            $query=mysqli_query($conn ,$sql);

            while ($row=mysqli_fetch_array($query)) {

        ?>
            <div class="col-xs-12 panel panel-body">
                <div class="col-xs-4"><?php echo $row['name'] ?></div>
                <div class="col-xs-3"><?php echo $row['description'] ?></div>
                <div class="col-xs-3"><?php echo $row['price'] ?>$</div>
                <div class="col-xs-2"><a href="index.php?page=products&action=add&id=<?php echo $row['id_product'] ?>">Add to cart</a></div>
            </div>
        <?php

            }

        ?>

    </div>
