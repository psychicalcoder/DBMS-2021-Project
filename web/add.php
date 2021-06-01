<!DOCTYPE HTML>

<html lang="zh-Hant-TW">

<head>
    <title>台北市安全防護網 | 新增熱點</title>
    <link rel="Shortcut Icon" type="image/x-icon" href="images/taipei-101.png" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
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

        <!-- Nav -->
        <nav id="nav">
            <ul>
                <li><a href="./" >網站簡介</a></li>
                <li><a href="./add.php" class="active">新增犯罪熱點</a></li>
            </ul>
        </nav>

        <!-- Main -->
        <div id="main">

            <!-- Form -->


            <?php
            $addr = $category = $date = $start_time = $end_time = "";
            $addrErr = $categoryErr = $dateErr = $start_timeErr = $end_timeErr = "";
            
            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {
                if (empty($_POST["addr"])) {
                    $addrErr = "缺少地址　|　";
                } 
                else {
                    $addr = test_input($_POST["addr"]);
                }     
                if (empty($_POST["category"])) {
                    $categoryErr = "缺少案件類別　|　";
                } 
                else {
                    $category = test_input($_POST["category"]);
                }     
                if (empty($_POST["date"])) {
                    $dateErr = "缺少日期　|　";
                } 
                else {
                    $date = test_input($_POST["date"]);
                }     
                if (empty($_POST["start_time"])) {
                    $start_timeErr = "缺少起始時段　|　";
                } 
                else {
                    $start_time = test_input($_POST["start_time"]);
                }     
                if (empty($_POST["end_time"])) {
                    $end_timeErr = "缺少結束時段　|　";
                } 
                else {
                    $end_time = test_input($_POST["end_time"]);
                }     
                           
            }
            
            function test_input($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            ?>

            <section id="form" class="main special">
                <section>
                    <h2>新增犯罪熱點</h2>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="row gtr-uniform">
                            <div class="col-12 col-12-xsmall">
                                <input type="text" name="addr" id="addr" placeholder="範例：臺北市大安區仁愛路3段1~30號" />
                            </div>
                            <div class="col-12">
                                <p>案件類別</p>
                                <select name="category" id="category">
                                    <option value="">- 類別 -</option>
                                    <option value="house_steal">住宅竊盜</option>
                                    <option value="car_steal">汽車竊盜</option>
                                    <option value="bike_steal">自行車竊盜</option>
                                    <option value="motorcycle_steal">機車竊盜</option>
                                    <option value="random_snatch">搶奪</option>
                                    <option value="random_rob">強盜</option>
                                </select>
                            </div>
                            <div class="col-6 col-12-xsmall">
                                <p>發生日期</p>
                                <input type="date" name="date" id="date" value="" placeholder="Name" />
                            </div>
                            <div class="col-3">
                                <p>起始時段</p>
                                <select name="start_time" id="start_time">
                                    <option value="">- 起始時段 -</option>
                                    <option value="0">00</option>
                                    <option value="1">01</option>
                                    <option value="2">02</option>
                                    <option value="3">03</option>
                                    <option value="4">04</option>
                                    <option value="5">05</option>
                                    <option value="6">06</option>
                                    <option value="7">07</option>
                                    <option value="8">08</option>
                                    <option value="9">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                </select>
                            </div>

                            <div class="col-3">
                                <p>結束時段</p>
                                <select name="end_time" id="end_time">
                                    <option value="">- 結束時段 -</option>
                                    <option value="0">00</option>
                                    <option value="1">01</option>
                                    <option value="2">02</option>
                                    <option value="3">03</option>
                                    <option value="4">04</option>
                                    <option value="5">05</option>
                                    <option value="6">06</option>
                                    <option value="7">07</option>
                                    <option value="8">08</option>
                                    <option value="9">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <ul class="actions">
                                    <li><input type="submit" value="送出" class="primary" /></li>
                                    <!-- <li><input type="reset" value="刷新" /></li> -->
                                </ul>
                            </div>

                            <blockquote>


                            <?php

                                if ($_SERVER["REQUEST_METHOD"] == "POST")
                                {
                                    if (empty($_POST["addr"]) || empty($_POST["category"]) || empty($_POST["date"]) || empty($_POST["start_time"]) || empty($_POST["end_time"])){
                                        echo "<b style=\"color:#ff0000\">發現錯誤：".$addrErr.$categoryErr.$dateErr.$start_timeErr.$end_timeErr."</b>";
                                    }
                                    else{


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

                                        $sql = "SELECT * FROM ".$category;
                                        $result = mysqli_query($con, $sql);
                                        $num = 0;
                                        // 獲得資料筆數
                                        if ($result) {
                                            $num = mysqli_num_rows($result);
                                            $num = $num + 1;
                                        }

                                        $category_txt = "";

                                        if($category=="house_steal"){
                                            $category_txt = "住宅竊盜";
                                        }elseif($category=="car_steal"){
                                            $category_txt = "汽車竊盜";
                                        }elseif($category=="bike_steal"){
                                            $category_txt = "自行車竊盜";
                                        }elseif($category=="motorcycle_steal"){
                                            $category_txt = "機車竊盜";
                                        }elseif($category=="random_snatch"){
                                            $category_txt = "搶奪";
                                        }elseif($category=="random_rob"){
                                            $category_txt = "強盜";
                                        }
            
                                        $sql = "INSERT INTO ".$category." (code, category, date, time_start, time_end, location)
                                        VALUES ('".$num."', '".$category_txt."', '".$date."', '".$start_time."', '".$end_time."', '".$addr."')";
                                         
                                         if (mysqli_query($con, $sql)) {
                                            echo "插入成功";
                                        } else {
                                            echo "Error: " . $sql . "<br>" . mysqli_error($con);
                                        }
                                         
                                        mysqli_close($con);
                                        
                                    }
                                }

                            ?>
                            </blockquote>
                        </div>
                    </form>
                </section>
            </section>

            


        </div>

        <!-- Footer -->
        <footer id="footer">
            <section>
                <h2>參考資料</h2>
                <p>https://www.flaticon.com/<br>
                https://html5up.net/
                </p>
            </section>
            <section>
                <h2>相關資訊</h2>
                <ul class="icons">
                    <li><a target="_blank" href="https://github.com/psychicalcoder/DBMS-2021-Project" class="icon brands fa-github alt"><span class="label">GitHub</span></a></li>
                </ul>
            </section>
        </footer>

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
