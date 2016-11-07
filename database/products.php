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
        <div id="goods" class="panel col-xs-12 panel-primary">
            <div class="col-xs-12 panel-heading">
                <div class="col-xs-4">ชื่อสินค้า</div>
                <div class="col-xs-3">ข้อมูลสินค้า</div>
                <div class="col-xs-3">ราคา</div>
                <div class="col-xs-2">ใส่ตระกร้า</div>
            </div>

        <?php

            $sql="SELECT * FROM products ORDER BY name ASC";
            $query=mysql_query($sql);

            while ($row=mysql_fetch_array($query)) {

        ?>
            <div class="col-xs-12 panel-body product-list">
                <div class="col-xs-4 product-name"><?php echo $row['name'] ?></div>
                <div class="col-xs-4 product-description"><?php echo $row['description'] ?></div>
                <div class="col-xs-3"><?php echo (float)$row['price'] ?> บาท</div>
                <div class="col-xs-1 quantity-picker">
                  <img class="arrow arrowup" src="img/icon/arrow-up.png" /><br>
                  <input type="text" maxlength="2" value=0 onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="quantity-filler" name="product-id<?php echo $row['id_product'] ?>"><br>
                  <img class="arrow arrowdown" src="img/icon/arrow-down.png" />
                </div>
            </div>
        <?php
            }
        ?>
            </div>