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

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Header -->
        <header id="header" class="alt">
            <span class="logo"><img src="images/logo.svg" alt="" /></span>
            <h1>台北市安全防護網</h1>
            <p>打造健全環境，讓你遠離犯罪熱點</p>
        </header>

        <!-- Nav -->
        <nav id="nav">
            <ul>
                <li><a href="#intro" class="active">網站簡介</a></li>
                <li><a href="#first">偵測熱點</a></li>
                <li><a href="#second">熱點地圖</a></li>
                <li><a href="#form">新增犯罪熱點</a></li>
            </ul>
        </nav>

        <!-- Main -->
        <div id="main">

            <!-- Introduction -->
            <section id="intro" class="main">
                <div class="spotlight">
                    <div class="content">
                        <header class="major">
                            <h2>網站簡介</h2>
                        </header>
                        <p>我是簡介文字</p>
                        <!--
                        <ul class="actions">
                            <li><a href="generic.html" class="button ">繼續看下去</a></li>
                        </ul>
-->
                    </div>
                    <span class="image"><img src="images/pic01.jpg" alt="" /></span>
                </div>
            </section>

            <!-- First Section -->
            <section id="first" class="main special">
                <header class="major">
                    <h2>偵測熱點</h2>
                </header>
                <section>
                    <pre><code>這是一個空格框框
                    </code></pre>
                </section>

            </section>

            <!-- Second Section -->
            <section id="second" class="main special">
                <header class="major">
                    <h2>熱點地圖</h2>
                    <p>年度最高地點與變化</p>
                </header>
                <section>
                    <pre><code>這是一個空格框框
                    </code></pre>
                </section>

                <ul class="statistics">
                    <li class="style1">
                        <span class="icon solid fa-signal"></span>
                        <strong>
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
                                // echo "連接 " . $DB_NAME . " 資料庫成功！<br>";
                            }

                            // 設定連線編碼
                            mysqli_query($con, "SET NAMES 'UTF-8'");

                            // 取得資料
                            $sql = "SELECT * FROM house_steal";
                            $result = mysqli_query($con, $sql);

                            // 獲得資料筆數
                            if ($result) {
                                $num = mysqli_num_rows($result);
                                // echo "condb 資料表有 " . $num . " 筆資料<br>";
                                echo $num;
                            }

                            
                            ?>
                        
                        </strong> 住宅竊盜
                    </li>
                    <li class="style2">
                        <span class="icon solid fa-signal"></span>
                        <strong>
                        <?php

                            // 取得資料
                            $sql = "SELECT * FROM car_steal";
                            $result = mysqli_query($con, $sql);

                            // 獲得資料筆數
                            if ($result) {
                                $num = mysqli_num_rows($result);
                                // echo "condb 資料表有 " . $num . " 筆資料<br>";
                                echo $num;
                            }

                            
                            ?>

                        
                        </strong> 汽車竊盜
                    </li>
                    <li class="style3">
                        <span class="icon solid fa-signal"></span>
                        <strong>
                        <?php

                            // 取得資料
                            $sql = "SELECT * FROM bike_steal";
                            $result = mysqli_query($con, $sql);

                            // 獲得資料筆數
                            if ($result) {
                                $num = mysqli_num_rows($result);
                                // echo "condb 資料表有 " . $num . " 筆資料<br>";
                                echo $num;
                            }
                            
                            ?>                        
                        </strong> 自行車竊盜
                    </li>
                    <li class="style4">
                        <span class="icon solid fa-signal"></span>
                        <strong>
                        <?php

                            // 取得資料
                            $sql = "SELECT * FROM motorcycle_steal";
                            $result = mysqli_query($con, $sql);

                            // 獲得資料筆數
                            if ($result) {
                                $num = mysqli_num_rows($result);
                                // echo "condb 資料表有 " . $num . " 筆資料<br>";
                                echo $num;
                            }

                            
                            ?>    
                        </strong> 機車竊盜
                    </li>
                    <li class="style5">
                        <span class="icon solid fa-signal"></span>
                        <strong>
                        <?php

                            // 取得資料
                            $sql = "SELECT * FROM random_snatch";
                            $result = mysqli_query($con, $sql);

                            // 獲得資料筆數
                            if ($result) {
                                $num = mysqli_num_rows($result);
                                // echo "condb 資料表有 " . $num . " 筆資料<br>";
                                echo $num;
                            }

                            
                            ?>    

                        
                        </strong> 搶奪
                    </li>
                    <li class="style1">
                        <span class="icon solid fa-signal"></span>
                        <strong>
                        <?php
                            // 取得資料
                            $sql = "SELECT * FROM random_rob";
                            $result = mysqli_query($con, $sql);

                            // 獲得資料筆數
                            if ($result) {
                                $num = mysqli_num_rows($result);
                                // echo "condb 資料表有 " . $num . " 筆資料<br>";
                                echo $num;
                            }

                            
                            ?>    

                        </strong> 強盜
                    </li>
                </ul>
            </section>

            <!-- Form -->
            <section id="form" class="main special">
                <section>
                    <h2>新增犯罪熱點</h2>
                    <form method="post" action="test.php">
                        <div class="row gtr-uniform">
                            <div class="col-12 col-12-xsmall">
                                <input type="text" name="addr" id="addr" value="" placeholder="範例：臺北市大安區仁愛路3段1~30號" />
                            </div>
                            <div class="col-12">
                                <p>案件類別</p>
                                <select name="category" id="category">
                                    <option value="">- 類別 -</option>
                                    <option value="1">住宅竊盜</option>
                                    <option value="2">汽車竊盜</option>
                                    <option value="3">自行車竊盜</option>
                                    <option value="4">機車竊盜</option>
                                    <option value="5">搶奪</option>
                                    <option value="6">強盜</option>
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
                                    <li><input type="reset" value="刷新" /></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </section>
            </section>



        </div>

        <!-- Footer -->
        <footer id="footer">
            <section>
                <h2>結束了</h2>
                <p>0531-0317</p>
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
