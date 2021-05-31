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
<p>test1</p>
<?php

$DB_NAME = "final"; // 資料庫名稱
$DB_USER = "user1"; // 資料庫管理帳號
$DB_PASS = "test123"; // 資料庫管理密碼
$DB_HOST = "localhost"; // 資料庫位址

// 連接 MySQL 資料庫伺服器
$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS);
if (empty($con)) {
    print mysqli_error($con);
    die("資料庫連接失敗！");
    exit;
}

// 選取資料庫
if (!mysqli_select_db($con, $DB_NAME)) {
    die("選取資料庫失敗！");
} else {
    echo "連接 " . $DB_NAME . " 資料庫成功！<br>";
}

// 設定連線編碼
mysqli_query($con, "SET NAMES 'UTF-8'");

// 取得資料
$sql = "SELECT * FROM bike_steal";
$result = mysqli_query($con, $sql);

// 獲得資料筆數
if ($result) {
    $num = mysqli_num_rows($result);
    echo "condb 資料表有 " . $num . " 筆資料<br>";
}

  
?>


</body>

</html>
