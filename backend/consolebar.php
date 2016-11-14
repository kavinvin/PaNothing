<div class="col-xs-12 product-list center-thing" id="admin">
    <h2 class="col-xs-12">สวัสดี <?php echo $_SESSION['login_user']; ?></h2>
</div>
<div class="col-xs-12 consolebar">
    <a href="../logout.php" class="btn btn-danger">ออกจากระบบ</a>
    <a href="order.php" class="btn btn-info <?php if ($this_page=='order') {echo 'active';} ?>">ดูรายการสั่งซื้อ</a>
    <a href="index.php" class="btn btn-info <?php if ($this_page=='product') {echo 'active';} ?>">รายการสินค้า</a>
</div>
