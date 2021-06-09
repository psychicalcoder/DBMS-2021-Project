<!DOCTYPE HTML>

<html lang="zh-Hant-TW">

<head>
    <title>台北市安全防護網 | 首頁</title>
    <link rel="Shortcut Icon" type="image/x-icon" href="images/taipei-101.png" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/map.css" />
    <noscript>
        <link rel="stylesheet" href="assets/css/noscript.css" />
    </noscript>

</head>

<body class="is-preload">

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Header -->
        <header id="header" class="alt">
            <span class="logo"><img src="images/taipei-101.png" alt="" /></span>
            <h1>台北市安全防護網</h1>
            <p>打造健全環境，讓你遠離犯罪熱點</p>
        </header>

        <!-- Head -->
        <?php include("./head.php"); ?>


        <!-- Main -->
        <div id="main">

            <section id="form" class="main special">
                <section>
                    <header class="major">
                        <h2>刪除狀況</h2>
                    </header>

                    <p>
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "GET") {
                            if (empty($_GET["code"]) || empty($_GET["category"])) {
                                echo "<b style=\"color:#ff0000\">提醒： 刪除資料 code 錯誤 !!!</b>";
                            } else {
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
                                    echo "連接 " . $DB_NAME . " 資料庫成功！ 開始執行刪除<br>";
                                }
                                $category = $_GET["category"];
                                $code = $_GET["code"];
                                $sql = "DELETE FROM " . $category . " WHERE code = " . $code;
                                if (mysqli_query($con, $sql)) {
                                    echo "刪除成功";
                                } else {
                                    echo "錯誤: " . $sql . "<br>" . mysqli_error($con);
                                }

                                mysqli_close($con);
                            }
                        }

                        ?>
                    </p>
                    <a href="./menu.php" class="button primary fit">回到目錄</a>
                </section>
            </section>






        </div>

        <!-- Footer -->
        <?php include("./footer.php"); ?>

    </div>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>