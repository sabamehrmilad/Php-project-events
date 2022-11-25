<!doctype html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+SC" rel="stylesheet">
    <link rel="manifest" href="site.webmanifest">
    <link rel="icon" href="" type="../image/png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="../style_css_files/normalize.css">
    <link rel="stylesheet" href="../style_css_files/main.css?version=27">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="../js/particles.min.js"></script>
    <link rel="stylesheet" href="/dp/css/persianDatepicker-default.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>




</head>
<body>
<?php include '../sections/menu.php';?>
<?php require_once 'process.php'; ?>
<?php
$mysqli=new mysqli('localhost','root','','events') or die($mysqli->error);
$id = $_GET['edit'];
$result=$mysqli->query("SELECT * FROM events WHERE id='$id'") or die($mysqli->error);
if (count(array($result))==1) {
    require_once 'jdf.php';
    $row = $result->fetch_array();
    $title = $row['day_title'];
    $year = $row['year_num'];
    $month = $row['month_num'];
    $day = $row['day_num'];
    $day_type = $row['if_off'];
    $description = $row['description'];


    $miladi=$year.'/'.$month.'/'.$day;
    $current_gdate = date($miladi);

    $arr_parts = explode('/', $current_gdate);

    $gYear  = $arr_parts[0];
    $gMonth = $arr_parts[1];
    $gDay   = $arr_parts[2];

    $current_jdate = gregorian_to_jalali($gYear, $gMonth, $gDay, '/');

    $string=explode('/', $current_jdate);
    $string_year=$string[0];
    $string_month=$string[1];
    $string_day=$string[2];
    print($string_day);



}

?>



<div class="container-fluid">
    <div class="row">
        <?php include '../sections/dashboard.php';?>
        <div class="col col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
            <div class="box">
                <div class="content">
                    <!--Content of the Page Starts-->
                    <!--Dear Milad, YOUR CODES ARE HERE...-->

                    <form method="POST" action="process.php" >
                        <input type="hidden" value="<?php echo $id ?>" name="id">
                        <div class="form-group">
                            <label for="formGroupExampleInput">عنوان</label>
                            <input type="text" value="<?php echo $title ; ?>" name="title" class="form-control" id="formGroupExampleInput" placeholder="عنوان">
                        </div>



                        <label for="formGroupExampleInput">سال</label>
                        <select class="form-control js-example-tags"  name="year" >
                            <option  value="<?php echo $string_year ?>" selected="selected"><?php echo $string_year ?></option>
                            <option value="1400">1400</option>
                            <option value="1401">1401</option>
                            <option value="1402">1402</option>
                            <option value="1403">1403</option>
                        </select>




                        <br>
                        <br>

                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">ماه</label>
                        <select class="custom-select my-1 mr-sm-2" name="month" id="inlineFormCustomSelectPref">
                            <option >ماه مورد نظر را انتخاب بکنید</option>
                            <option value="1"<?php if ($string_month == '01') echo ' selected="selected"'; ?>>1</option>
                            <option value="2"<?php if ($string_month == '02') echo ' selected="selected"'; ?>>2</option>
                            <option value="3"<?php if ($string_month == '03') echo ' selected="selected"'; ?>>3</option>
                            <option value="4"<?php if ($string_month == '04') echo ' selected="selected"'; ?>>4</option>
                            <option value="5"<?php if ($string_month == '05') echo ' selected="selected"'; ?>>5</option>
                            <option value="6"<?php if ($string_month == '06') echo ' selected="selected"'; ?>>6</option>
                            <option value="7"<?php if ($string_month == '07') echo ' selected="selected"'; ?>>7</option>
                            <option value="8"<?php if ($string_month == '08') echo ' selected="selected"'; ?>>8</option>
                            <option value="9"<?php if ($string_month == '09') echo ' selected="selected"'; ?>>9</option>
                            <option value="10"<?php if ($string_month == '10') echo ' selected="selected"'; ?>>10</option>
                            <option value="11"<?php if ($string_month == '11') echo ' selected="selected"'; ?>>11</option>
                            <option value="12"<?php if ($string_month == '12') echo ' selected="selected"';?>>12</option>
                        </select>
                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">روز</label>
                        <select class="custom-select my-1 mr-sm-2" name="day" id="inlineFormCustomSelectPref">
                            <option selected>روز مورد نظر را انتخاب بکنید</option>
                            <?php if ($string_month=='01'|| $string_month=='02'|| $string_month=='03'||$string_month=='04'||$string_month=='05'||$string_month=='06'){ ?>
                            <option value="1"<?php if ($string_day == '01') echo ' selected="selected"'; ?>>1</option>
                            <option value="2"<?php if ($string_day == '02') echo ' selected="selected"'; ?>>2</option>
                            <option value="3"<?php if ($string_day == '03') echo ' selected="selected"'; ?>>3</option>
                            <option value="4"<?php if ($string_day == '04') echo ' selected="selected"'; ?>>4</option>
                            <option value="5"<?php if ($string_day == '05') echo ' selected="selected"'; ?>>5</option>
                            <option value="6"<?php if ($string_day == '06') echo ' selected="selected"'; ?>>6</option>
                            <option value="7"<?php if ($string_day == '07') echo ' selected="selected"'; ?>>7</option>
                            <option value="8"<?php if ($string_day == '08') echo ' selected="selected"'; ?>>8</option>
                            <option value="9"<?php if ($string_day == '09') echo ' selected="selected"'; ?>>9</option>
                            <option value="10"<?php if ($string_day == '10') echo ' selected="selected"'; ?>>10</option>
                            <option value="11"<?php if ($string_day == '11') echo ' selected="selected"'; ?>>11</option>
                            <option value="12"<?php if ($string_day == '12') echo ' selected="selected"'; ?>>12</option>
                            <option value="13"<?php if ($string_day == '13') echo ' selected="selected"'; ?>>13</option>
                            <option value="14"<?php if ($string_day == '14') echo ' selected="selected"'; ?>>14</option>
                            <option value="15"<?php if ($string_day == '15') echo ' selected="selected"'; ?>>15</option>
                            <option value="16"<?php if ($string_day == '16') echo ' selected="selected"'; ?>>16</option>
                            <option value="17"<?php if ($string_day == '17') echo ' selected="selected"'; ?>>17</option>
                            <option value="18"<?php if ($string_day == '18') echo ' selected="selected"'; ?>>18</option>
                            <option value="19"<?php if ($string_day == '19') echo ' selected="selected"'; ?>>19</option>
                            <option value="20"<?php if ($string_day == '20') echo ' selected="selected"'; ?>>20</option>
                            <option value="21"<?php if ($string_day == '21') echo ' selected="selected"'; ?>>21</option>
                            <option value="22"<?php if ($string_day == '22') echo ' selected="selected"'; ?>>22</option>
                            <option value="23"<?php if ($string_day == '23') echo ' selected="selected"'; ?>>23</option>
                            <option value="24"<?php if ($string_day == '24') echo ' selected="selected"'; ?>>24</option>
                            <option value="25"<?php if ($string_day == '25') echo ' selected="selected"'; ?>>25</option>
                            <option value="26"<?php if ($string_day == '26') echo ' selected="selected"'; ?>>26</option>
                            <option value="27"<?php if ($string_day == '27') echo ' selected="selected"'; ?>>27</option>
                            <option value="28"<?php if ($string_day == '28') echo ' selected="selected"'; ?>>28</option>
                            <option value="29"<?php if ($string_day == '29') echo ' selected="selected"'; ?>>29</option>
                            <option  value="30" <?php if ($string_day == '30') echo ' selected="selected"'; ?>>30</option>
                            <option  value="31" <?php if ($string_day == '31') echo ' selected="selected"'; ?>>31</option>
                            <?php } ?>
                            <?php if ($string_month=='7'|| $string_month=='8'|| $string_month=='9'||$string_month=='10'||$string_month=='11'){ ?>
                                <option value="1"<?php if ($string_day == '1') echo ' selected="selected"'; ?>>1</option>
                                <option value="2"<?php if ($string_day == '2') echo ' selected="selected"'; ?>>2</option>
                                <option value="3"<?php if ($string_day == '3') echo ' selected="selected"'; ?>>3</option>
                                <option value="4"<?php if ($string_day == '4') echo ' selected="selected"'; ?>>4</option>
                                <option value="5"<?php if ($string_day == '5') echo ' selected="selected"'; ?>>5</option>
                                <option value="6"<?php if ($string_day == '6') echo ' selected="selected"'; ?>>6</option>
                                <option value="7"<?php if ($string_day == '7') echo ' selected="selected"'; ?>>7</option>
                                <option value="8"<?php if ($string_day == '8') echo ' selected="selected"'; ?>>8</option>
                                <option value="9"<?php if ($string_day == '9') echo ' selected="selected"'; ?>>9</option>
                                <option value="10"<?php if ($string_day == '10') echo ' selected="selected"'; ?>>10</option>
                                <option value="11"<?php if ($string_day == '11') echo ' selected="selected"'; ?>>11</option>
                                <option value="12"<?php if ($string_day == '12') echo ' selected="selected"'; ?>>12</option>
                                <option value="13"<?php if ($string_day == '13') echo ' selected="selected"'; ?>>13</option>
                                <option value="14"<?php if ($string_day == '14') echo ' selected="selected"'; ?>>14</option>
                                <option value="15"<?php if ($string_day == '15') echo ' selected="selected"'; ?>>15</option>
                                <option value="16"<?php if ($string_day == '16') echo ' selected="selected"'; ?>>16</option>
                                <option value="17"<?php if ($string_day == '17') echo ' selected="selected"'; ?>>17</option>
                                <option value="18"<?php if ($string_day == '18') echo ' selected="selected"'; ?>>18</option>
                                <option value="19"<?php if ($string_day == '19') echo ' selected="selected"'; ?>>19</option>
                                <option value="20"<?php if ($string_day == '20') echo ' selected="selected"'; ?>>20</option>
                                <option value="21"<?php if ($string_day == '21') echo ' selected="selected"'; ?>>21</option>
                                <option value="22"<?php if ($string_day == '22') echo ' selected="selected"'; ?>>22</option>
                                <option value="23"<?php if ($string_day == '23') echo ' selected="selected"'; ?>>23</option>
                                <option value="24"<?php if ($string_day == '24') echo ' selected="selected"'; ?>>24</option>
                                <option value="25"<?php if ($string_day == '25') echo ' selected="selected"'; ?>>25</option>
                                <option value="26"<?php if ($string_day == '26') echo ' selected="selected"'; ?>>26</option>
                                <option value="27"<?php if ($string_day == '27') echo ' selected="selected"'; ?>>27</option>
                                <option value="28"<?php if ($string_day == '28') echo ' selected="selected"'; ?>>28</option>
                                <option value="29"<?php if ($string_day == '29') echo ' selected="selected"'; ?>>29</option>
                                <option  value="30" <?php if ($string_day == '30') echo ' selected="selected"'; ?>>30</option>
                            <?php } ?>
                            <?php if ($string_month=='12'){ ?>
                                <option value="1"<?php if ($string_day == '1') echo ' selected="selected"'; ?>>1</option>
                                <option value="2"<?php if ($string_day == '2') echo ' selected="selected"'; ?>>2</option>
                                <option value="3"<?php if ($string_day == '3') echo ' selected="selected"'; ?>>3</option>
                                <option value="4"<?php if ($string_day == '4') echo ' selected="selected"'; ?>>4</option>
                                <option value="5"<?php if ($string_day == '5') echo ' selected="selected"'; ?>>5</option>
                                <option value="6"<?php if ($string_day == '6') echo ' selected="selected"'; ?>>6</option>
                                <option value="7"<?php if ($string_day == '7') echo ' selected="selected"'; ?>>7</option>
                                <option value="8"<?php if ($string_day == '8') echo ' selected="selected"'; ?>>8</option>
                                <option value="9"<?php if ($string_day == '9') echo ' selected="selected"'; ?>>9</option>
                                <option value="10"<?php if ($string_day == '10') echo ' selected="selected"'; ?>>10</option>
                                <option value="11"<?php if ($string_day == '11') echo ' selected="selected"'; ?>>11</option>
                                <option value="12"<?php if ($string_day == '12') echo ' selected="selected"'; ?>>12</option>
                                <option value="13"<?php if ($string_day == '13') echo ' selected="selected"'; ?>>13</option>
                                <option value="14"<?php if ($string_day == '14') echo ' selected="selected"'; ?>>14</option>
                                <option value="15"<?php if ($string_day == '15') echo ' selected="selected"'; ?>>15</option>
                                <option value="16"<?php if ($string_day == '16') echo ' selected="selected"'; ?>>16</option>
                                <option value="17"<?php if ($string_day == '17') echo ' selected="selected"'; ?>>17</option>
                                <option value="18"<?php if ($string_day == '18') echo ' selected="selected"'; ?>>18</option>
                                <option value="19"<?php if ($string_day == '19') echo ' selected="selected"'; ?>>19</option>
                                <option value="20"<?php if ($string_day == '20') echo ' selected="selected"'; ?>>20</option>
                                <option value="21"<?php if ($string_day == '21') echo ' selected="selected"'; ?>>21</option>
                                <option value="22"<?php if ($string_day == '22') echo ' selected="selected"'; ?>>22</option>
                                <option value="23"<?php if ($string_day == '23') echo ' selected="selected"'; ?>>23</option>
                                <option value="24"<?php if ($string_day == '24') echo ' selected="selected"'; ?>>24</option>
                                <option value="25"<?php if ($string_day == '25') echo ' selected="selected"'; ?>>25</option>
                                <option value="26"<?php if ($string_day == '26') echo ' selected="selected"'; ?>>26</option>
                                <option value="27"<?php if ($string_day == '27') echo ' selected="selected"'; ?>>27</option>
                                <option value="28"<?php if ($string_day == '28') echo ' selected="selected"'; ?>>28</option>
                                <option value="29"<?php if ($string_day == '29') echo ' selected="selected"'; ?>>29</option>
                            <?php } ?>


                        </select>
                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">نوع روز</label>
                        <select class="custom-select my-1 mr-sm-2" name="day_type" id="inlineFormCustomSelectPref">
                            <option selected>تعطیل بودن یا نبودن روز را انتخاب کنید</option>
                            <option value="1"<?php if ($row['if_off'] == '1') echo ' selected="selected"'; ?>>تعطیل</option>
                            <option value="0"<?php if ($row['if_off'] == '0') echo ' selected="selected"'; ?>>غیرتعطیل</option>
                        </select>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">توضیحات</label>
                            <textarea class="form-control"  name="description" id="exampleFormControlTextarea1" rows="3"><?php echo $description ?></textarea>
                        </div>

                        <button style="position:relative; top: 5px; right:10px;"  type="submit" name="update" value="update" class="btn btn-primary" >ویرایش</button>
                    </form>

                    <!--Content of the Page Ends-->
                </div>
            </div>
        </div>
    </div>
</div>
<br />

<?php include '../sections/footer.php'; ?>
<script>
    $(".js-example-tags").select2({
        tags: true
    });
</script>
<script src="../js/vendor/modernizr-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
<script src="../js/plugins.js"></script>
<script src="../js/main.js"></script>
<script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview')
</script>

<script src="https://www.google-analytics.com/analytics.js" async defer></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
