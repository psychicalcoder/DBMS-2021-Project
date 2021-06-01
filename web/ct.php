<!DOCTYPE HTML>

<html>

<head>
    <title>台北市安全防護網</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <noscript>
        <link rel="stylesheet" href="assets/css/noscript.css" />
    </noscript>
</head>

<body class="is-preload">
<?php



$DB_NAME = "final"; 
$DB_USER = "user1"; 
$DB_PASS = "test123"; 
$DB_HOST = "localhost"; 

// 連接 MySQL 資料庫伺服器
$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS);
if (empty($con)) {
    print mysqli_error($con);
    die("連接失敗，原因: " . mysqli_connect_error());
    exit;
}

// 選取資料庫
if (!mysqli_select_db($con, $DB_NAME)) {
    die("選取資料庫失敗！");
} else {
    echo "連接 " . $DB_NAME . " 資料庫成功！<br>";
}

echo "成功";

$sql = "INSERT INTO random_rob (code, category, date, time_start, time_end, location)
VALUES ('21', '強盜', '0110-04-24', '10', '11', '大安區錦安里和平東路1段129號前自行車停車格')";
 
 if (mysqli_query($con, $sql)) {
    echo "新记录插入成功";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
 
mysqli_close($con);



?>


</body>

</html>
