<?php
        if(isset($message)){
            echo "<h2>$message</h2>";
        }
    ?>
        <div id="goods" class="panel col-xs-12 panel-primary">
            <div class="col-xs-12 panel-heading product-header">
                รายการสินค้า
            </div>
        <?php
            $sql="SELECT * FROM products ORDER BY product_id ASC";
            $query=mysql_query($sql);

            while ($row=mysql_fetch_array($query)) {
              $item_id = "product-id".$row['product_id'];
        ?>
            <div class="col-xs-12 panel-body product-list">
              <div class="col-xs-5 product-pic center-y">
                <div class="cropper center-y">
                  <div class="checkhover center-y"></div>
                  <img class="sidepic" src="img/sidepic/<?php echo $item_id ?>.jpg" />
                </div>
                <div class="product-name center-y"><?php echo $row['name'] ?></div>
              </div>
              <div class="col-xs-3 product-description center-y"><?php echo $row['description'] ?></div>
              <div class="col-xs-2 product-price center-y"><?php echo (float)$row['price'] ?> บาท</div>
              <div class="col-xs-2 quantity-picker center-y">
                <div class="arrow arrowup noselect"><img src="img/icon/arrow-up.png" /></div>
                <input class="quantity-filler" type="text" maxlength="2" value=0 onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="<?php echo $item_id ?>">
                <div class="arrow arrowdown noselect"><img src="img/icon/arrow-down.png" /></div>
              </div>
            </div>
        <?php
            }
        ?>
            </div>
