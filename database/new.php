<?php
function formOutput($error) {
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.3/velocity.min.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" href="../css/custom.css"/>
    <link rel="stylesheet" href="../css/product.css"/>
    <link rel="stylesheet" href="../backend/backend.css"/>
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <title>เพิ่มสินค้า | PaNothing</title>
</head>

<body>

    <div class="fullheight">
    <div class="container middle-thing well">

<?php
    if ($error != '') {
        echo '<div class="alert alert-warning">
                <strong>'.$error.'</strong>
              </div>';
    }
?>



<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
    <strong>ชื่อสินค้า: *</strong> <input class="form-control" type="text" name="name"/><br/>
    <strong>คำอธิบาย: *</strong> <input class="form-control" type="text" name="description"/><br/>
    <strong>ราคา: *</strong> <input class="form-control" type="number" name="price"/><br/>
    <strong>รูปภาพ: *</strong> <input class="form-control" type="file" name="fileToUpload" id="fileToUpload"/><br/>
    <p>* ต้องใส่ครบทุกช่อง</p>
    <input class="btn btn-default" type="submit" name="submit" value="Submit">
</div>
</form>

</body>

</html>

<?php

}

include('connection.php');
$sql="SELECT product_id FROM products ORDER BY product_id DESC LIMIT 1";
$data=mysql_query($sql);
$last=mysql_fetch_array($data);
$id = $last['product_id']+1;


if (isset($_POST['submit'])) {
    $name = mysql_real_escape_string(htmlspecialchars($_POST['name']));
    $description = mysql_real_escape_string(htmlspecialchars($_POST['description']));
    $price = mysql_real_escape_string(htmlspecialchars($_POST['price']));
    $_FILES["fileToUpload"]["name"] = "product-id".$id.'.jpg';
    echo $_FILES["fileToUpload"]["name"];
    $target_dir = "../img/sidepic/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 50000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg") {
        echo "Sorry, only JPG is allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

if ($name == '' || $description == '' || $price == '') {
    $error = 'กรุณาใส่ข้อมูลทุกช่อง';
    formOutput($error);
    } else {
        mysql_query("INSERT products SET name='$name', description='$description', price='$price'") or die(mysql_error());
        // header("Location: ../backend/index.php");
        }
} else {
    formOutput('');
}

?>
    </div>
    </div>
