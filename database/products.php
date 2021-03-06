<?php
        if(isset($message)){
            echo "<h2>$message</h2>";
        }
    ?>
        <form id="order" method="post" action="database/purchase.php">
        <div id="goods" class="panel col-xs-12 panel-primary">
            <div class="col-xs-12 panel-heading product-header">
                รายการสินค้า
            </div>
        <?php
            $sql="SELECT * FROM products ORDER BY products.id_product ASC ";
            $query=mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_array($query)) {
              $item_id = "product-id".$row['id_product'];
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
        <div class="row">
            <div class="col-xs-12">
                <div class="product-list middle-thing" id="total_bar">
                    <div id="total" class="col-xs-10 center-y well"><h4>ยอดรวม 0 บาท</h4></div>
                    <?php if($_SESSION['login_user'] == '') { ?>
                    <div class="btn btn-danger disabled col-xs-2 center-y highest">กรุณาเข้าสู่ระบบ</div>
                    <?php } else { ?>
                    <button class="btn btn-success col-xs-2 center-y highest" type="submit">สั่งซื้อ</button>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        </form>

    <script>
        $(document).ready(function(){
            var price_list = [];
            $('.product-price').each(function(){
                price_list.push(parseFloat($(this).html()));
            });
            $('#total_bar button').attr("disabled", true);
            $('.arrow, .quantity-filler').on('click keyup', function(){
                var total = 0;
                var output = $('#order').serialize().split('&');
                var length = output.length;
                for (var i = 0; i < length; i++) {
                    var intext = output[i].split('=');
                    total = total+intext[1]*price_list[i];
                }
                $('#total h4').text("ยอดรวม "+total+" บาท");
                if (total == 0){
                    $('#total_bar button').attr("disabled", true);
                } else {
                    $('#total_bar button').removeAttr("disabled");
                }
            });
        });

        //ajax order

        $(document).ready(function(){
            $("#order").submit(function(e){
                e.preventDefault();
                $.ajax({
                url:'database/purchase.php',
                type:'post',
                data:"product_info="+$('#order').serialize().split('&')+"&total="+$('#total').text().split(' ')[1],
                success:function(){
                    alert('สั่งแล้วจ้า');
                },
                    error: function(){
                        alert('ระบบขัดข้อง');
                    }
            });
        });

    });
    </script>
