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

        <!-- Head -->
        <?php include("./head.php"); ?>

        <!-- Main -->
        <div id="main">

            <!-- Form -->

            <?php
            $code = $addr = $categorypost = $date = $start = $end = "";
            $geoErr = $addrErr = $categoryErr = $dateErr = $start_timeErr = $end_timeErr = "";
            
            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {
                $code = test_input($_POST["code"]);
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
                    $categorypost = test_input($_POST["category"]);
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
                    $start = test_input($_POST["start_time"]);
                }     
                if (empty($_POST["end_time"])) {
                    $end_timeErr = "缺少結束時段　|　";
                } 
                else {
                    $end = test_input($_POST["end_time"]);
                }
                
                //經緯度
                $address = urlencode($addr);
                $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key=AIzaSyApaj14PBOXclTYt8Bg3fIJnkiSiELkMZA&language=zh-TW";
                $response_json = file_get_contents($url);
                $response = json_decode($response_json, true);
                $lat = $lng = 0;
                if($response['status'] == 'OK') {
                    $lat = $response['results'][0]['geometry']['location']['lat'];
                    $lng = $response['results'][0]['geometry']['location']['lng'];
                }
                else {
                    $geoErr = "地址輸入錯誤　|　";
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
                    <h2>修改犯罪熱點</h2>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="row gtr-uniform">
                            <!-- <p>修改編號</p> -->
                            <div class="col-12 col-12-xsmall">
                                <input type="hidden" value="<?php echo $_GET["code"] ?>" name="code" id="code"/>
                            </div>
                            <!-- <p>發生地點</p> -->
                            <div class="col-12 col-12-xsmall">
                                <input type="text" value="<?php echo $_GET["location"] ?>" name="addr" id="addr" placeholder="範例：臺北市大安區仁愛路3段1~30號" />
                            </div>
                            <div class="col-12">
                                <p>案件類別</p>
                                <select name="category" id="category">
                                    <option value="">- 類別 -</option>
                                    <option value="house_steal" <?php 
                                    $category = $_GET["category"];
                                    if($category=="house_steal") echo "selected";
                                    ?>>住宅竊盜</option>
                                    <option value="car_steal" <?php 
                                    $category = $_GET["category"];
                                    if($category=="car_steal") echo "selected";
                                    ?>>汽車竊盜</option>
                                    <option value="bike_steal" <?php 
                                    $category = $_GET["category"];
                                    if($category=="bike_steal") echo "selected";
                                    ?>>自行車竊盜</option>
                                    <option value="motorcycle_steal" <?php 
                                    $category = $_GET["category"];
                                    if($category=="motorcycle_steal") echo "selected";
                                    ?>>機車竊盜</option>
                                    <option value="random_snatch" <?php 
                                    $category = $_GET["category"];
                                    if($category=="random_snatch") echo "selected";
                                    ?>>搶奪</option>
                                    <option value="random_rob" <?php 
                                    $category = $_GET["category"];
                                    if($category=="random_rob") echo "selected";
                                    ?>>強盜</option>
                                </select>
                            </div>
                            <div class="col-6 col-12-xsmall">
                                <p>發生日期</p>
                                <input type="date" name="date" id="date" value="<?php echo $_GET["date"] ?>" placeholder="Name" />
                            </div>
                            <div class="col-3">
                                <p>起始時段</p>
                                <select name="start_time" id="start_time">
                                    <option value="">- 起始時段 -</option>
                                    <option value="0" <?php 
                                    $start_time = $_GET["start"];
                                    if($start_time==0) echo "selected";
                                    ?>>00</option>
                                    <option value="1" <?php 
                                    $start_time = $_GET["start"];
                                    if($start_time==1) echo "selected";
                                    ?>>01</option>
                                    <option value="2" <?php 
                                    $start_time = $_GET["start"];
                                    if($start_time==2) echo "selected";
                                    ?>>02</option>
                                    <option value="3" <?php 
                                    $start_time = $_GET["start"];
                                    if($start_time==3) echo "selected";
                                    ?>>03</option>
                                    <option value="4" <?php 
                                    $start_time = $_GET["start"];
                                    if($start_time==4) echo "selected";
                                    ?>>04</option>
                                    <option value="5" <?php 
                                    $start_time = $_GET["start"];
                                    if($start_time==5) echo "selected";
                                    ?>>05</option>
                                    <option value="6" <?php 
                                    $start_time = $_GET["start"];
                                    if($start_time==6) echo "selected";
                                    ?>>06</option>
                                    <option value="7" <?php 
                                    $start_time = $_GET["start"];
                                    if($start_time==7) echo "selected";
                                    ?>>07</option>
                                    <option value="8" <?php 
                                    $start_time = $_GET["start"];
                                    if($start_time==8) echo "selected";
                                    ?>>08</option>
                                    <option value="9" <?php 
                                    $start_time = $_GET["start"];
                                    if($start_time==9) echo "selected";
                                    ?>>09</option>
                                    <option value="10" <?php 
                                    $start_time = $_GET["start"];
                                    if($start_time==10) echo "selected";
                                    ?>>10</option>
                                    <option value="11" <?php 
                                    $start_time = $_GET["start"];
                                    if($start_time==11) echo "selected";
                                    ?>>11</option>
                                    <option value="12" <?php 
                                    $start_time = $_GET["start"];
                                    if($start_time==12) echo "selected";
                                    ?>>12</option>
                                    <option value="13" <?php 
                                    $start_time = $_GET["start"];
                                    if($start_time==13) echo "selected";
                                    ?>>13</option>
                                    <option value="14" <?php 
                                    $start_time = $_GET["start"];
                                    if($start_time==14) echo "selected";
                                    ?>>14</option>
                                    <option value="15" <?php 
                                    $start_time = $_GET["start"];
                                    if($start_time==15) echo "selected";
                                    ?>>15</option>
                                    <option value="16" <?php 
                                    $start_time = $_GET["start"];
                                    if($start_time==16) echo "selected";
                                    ?>>16</option>
                                    <option value="17" <?php 
                                    $start_time = $_GET["start"];
                                    if($start_time==17) echo "selected";
                                    ?>>17</option>
                                    <option value="18" <?php 
                                    $start_time = $_GET["start"];
                                    if($start_time==18) echo "selected";
                                    ?>>18</option>
                                    <option value="19" <?php 
                                    $start_time = $_GET["start"];
                                    if($start_time==19) echo "selected";
                                    ?>>19</option>
                                    <option value="20" <?php 
                                    $start_time = $_GET["start"];
                                    if($start_time==20) echo "selected";
                                    ?>>20</option>
                                    <option value="21" <?php 
                                    $start_time = $_GET["start"];
                                    if($start_time==21) echo "selected";
                                    ?>>21</option>
                                    <option value="22" <?php 
                                    $start_time = $_GET["start"];
                                    if($start_time==22) echo "selected";
                                    ?>>22</option>
                                    <option value="23" <?php 
                                    $start_time = $_GET["start"];
                                    if($start_time==23) echo "selected";
                                    ?>>23</option>
                                </select>
                            </div>

                            <div class="col-3">
                                <p>結束時段</p>
                                <select name="end_time" id="end_time">
                                    <option value="">- 結束時段 -</option>
                                    <option value="0" <?php 
                                    $end_time = $_GET["end"];
                                    if($end_time=="0") echo "selected";
                                    ?>>00</option>
                                    <option value="1" <?php 
                                    $end_time = $_GET["end"];
                                    if($end_time=="1") echo "selected";
                                    ?>>01</option>
                                    <option value="2" <?php 
                                    $end_time = $_GET["end"];
                                    if($end_time=="2") echo "selected";
                                    ?>>02</option>
                                    <option value="3" <?php 
                                    $end_time = $_GET["end"];
                                    if($end_time=="3") echo "selected";
                                    ?>>03</option>
                                    <option value="4" <?php 
                                    $end_time = $_GET["end"];
                                    if($end_time=="4") echo "selected";
                                    ?>>04</option>
                                    <option value="5" <?php 
                                    $end_time = $_GET["end"];
                                    if($end_time=="5") echo "selected";
                                    ?>>05</option>
                                    <option value="6" <?php 
                                    $end_time = $_GET["end"];
                                    if($end_time=="6") echo "selected";
                                    ?>>06</option>
                                    <option value="7" <?php 
                                    $end_time = $_GET["end"];
                                    if($end_time=="7") echo "selected";
                                    ?>>07</option>
                                    <option value="8" <?php 
                                    $end_time = $_GET["end"];
                                    if($end_time=="8") echo "selected";
                                    ?>>08</option>
                                    <option value="9" <?php 
                                    $end_time = $_GET["end"];
                                    if($end_time=="9") echo "selected";
                                    ?>>09</option>
                                    <option value="10" <?php 
                                    $end_time = $_GET["end"];
                                    if($end_time=="10") echo "selected";
                                    ?>>10</option>
                                    <option value="11" <?php 
                                    $end_time = $_GET["end"];
                                    if($end_time=="11") echo "selected";
                                    ?>>11</option>
                                    <option value="12" <?php 
                                    $end_time = $_GET["end"];
                                    if($end_time=="12") echo "selected";
                                    ?>>12</option>
                                    <option value="13" <?php 
                                    $end_time = $_GET["end"];
                                    if($end_time=="13") echo "selected";
                                    ?>>13</option>
                                    <option value="14" <?php 
                                    $end_time = $_GET["end"];
                                    if($end_time=="14") echo "selected";
                                    ?>>14</option>
                                    <option value="15" <?php 
                                    $end_time = $_GET["end"];
                                    if($end_time=="15") echo "selected";
                                    ?>>15</option>
                                    <option value="16" <?php 
                                    $end_time = $_GET["end"];
                                    if($end_time=="16") echo "selected";
                                    ?>>16</option>
                                    <option value="17" <?php 
                                    $end_time = $_GET["end"];
                                    if($end_time=="17") echo "selected";
                                    ?>>17</option>
                                    <option value="18" <?php 
                                    $end_time = $_GET["end"];
                                    if($end_time=="18") echo "selected";
                                    ?>>18</option>
                                    <option value="19" <?php 
                                    $end_time = $_GET["end"];
                                    if($end_time=="19") echo "selected";
                                    ?>>19</option>
                                    <option value="20" <?php 
                                    $end_time = $_GET["end"];
                                    if($end_time=="20") echo "selected";
                                    ?>>20</option>
                                    <option value="21" <?php 
                                    $end_time = $_GET["end"];
                                    if($end_time=="21") echo "selected";
                                    ?>>21</option>
                                    <option value="22" <?php 
                                    $end_time = $_GET["end"];
                                    if($end_time=="22") echo "selected";
                                    ?>>22</option>
                                    <option value="23" <?php 
                                    $end_time = $_GET["end"];
                                    if($end_time=="23") echo "selected";
                                    ?>>23</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <ul class="actions">
                                    <li><input type="submit" value="送出" class="primary" /></li>
                                </ul>
                            </div>

                            <blockquote>


                            <?php

                                if ($_SERVER["REQUEST_METHOD"] == "POST")
                                {
                                    if ($response['status'] != 'OK' || empty($_POST["addr"]) || empty($_POST["category"]) || empty($_POST["date"]) || empty($_POST["start_time"]) || empty($_POST["end_time"])){
                                        echo "<b style=\"color:#ff0000\">發現錯誤：".$addrErr.$categoryErr.$dateErr.$start_timeErr.$end_timeErr.$geoErr."</b>";
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
                                        

                                        $categorytxt = "";

                                        if($categorypost=="house_steal"){
                                            $categorytxt = "住宅竊盜";
                                        }elseif($categorypost=="car_steal"){
                                            $categorytxt = "汽車竊盜";
                                        }elseif($categorypost=="bike_steal"){
                                            $categorytxt = "自行車竊盜";
                                        }elseif($categorypost=="motorcycle_steal"){
                                            $categorytxt = "機車竊盜";
                                        }elseif($categorypost=="random_snatch"){
                                            $categorytxt = "搶奪";
                                        }elseif($categorypost=="random_rob"){
                                            $categorytxt = "強盜";
                                        }
                                        $sql = "UPDATE ".$categorypost." SET code=".$code.", category='".$categorytxt."', date='".$date."', time_start='".$start."', time_end='".$end."', location='".$addr."', lat='".$lat."', lng='".$lng."' WHERE code=".$code.";";
                                         

                            ?>
                            </blockquote>
                        </div>
                    </form>
            <?php
                                        if (mysqli_query($con, $sql)) {
                                            echo "插入成功";
                                            echo "<a href='./menu.php' class='button primary fit'>回到目錄</a>";
                                        } else {
                                            echo "Error: " . $sql . "<br>" . mysqli_error($con);
                                        }

                                        mysqli_close($con);
                                    }
                                }

            ?>

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
