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



</head>
<body>
<?php include '../sections/menu.php';?>
<?php //require_once 'process.php'; ?>
<?php
$mysqli=new mysqli('localhost','root','','events') or die($mysqli->error);
$stmt = $mysqli->prepare("SELECT month_num FROM events");
$stmt->execute();
$array = [];
foreach ($stmt->get_result() as $row)
{
    $array[] = $row['month_num'];
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


                    <form method="POST" action="process.php">
                       <?php require_once 'jdf.php'; ?>
                        <div class="form-group">
                            <label for="formGroupExampleInput">عنوان</label>
                            <input type="text" value="" name="title" class="form-control" id="formGroupExampleInput" placeholder="عنوان">
                        </div>
                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">سال</label>
                        <select class="custom-select my-1 mr-sm-2" name="year" id="inlineFormCustomSelectPref">
                            <option value="1399" selected>1399</option>
                            <option value="1400">1400</option>
                            <option value="1401">1401</option>
                            <option value="1402">1402</option>
                            <option value="1403">1403</option>
                        </select>


                        <label class="my-1 mr-2" for="month-selector">ماه</label>
                        <select class="custom-select my-1 mr-sm-2" name="month" id="month-selector">
                            <option selected>ماه مورد نظر را انتخاب بکنید</option>
                            <option value="01">1</option>
                            <option value="02">2</option>
                            <option value="03">3</option>
                            <option value="04">4</option>
                            <option value="05">5</option>
                            <option value="06">6</option>
                            <option class="month" value="07">7</option>
                            <option class="month" value="08">8</option>
                            <option class="month" value="09">9</option>
                            <option class="month" value="10">10</option>
                            <option class="month" value="11">11</option>
                            <option class="month" id="last-month" value="12">12</option>
                        </select>
                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">روز</label>

                        <select class="custom-select my-1 mr-sm-2" name="day" id="inlineFormCustomSelectPref">
                            <option selected>روز مورد نظر را انتخاب بکنید</option>
                            <option value="01">1</option>
                            <option value="02">2</option>
                            <option value="03">3</option>
                            <option value="04">4</option>
                            <option value="05">5</option>
                            <option value="06">6</option>
                            <option value="07">7</option>
                            <option value="08">8</option>
                            <option value="09">9</option>
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
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option  value="30" id="second_last_day">30</option>
                            <option value="31" id="last_day">31</option>
                        </select>
                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">نوع روز</label>
                        <select class="custom-select my-1 mr-sm-2" name="day_type" id="inlineFormCustomSelectPref">
                            <option selected>تعطیل بودن یا نبودن روز را انتخاب کنید</option>
                            <option value="1">تعطیل</option>
                            <option value="0">غیرتعطیل</option>
                        </select>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">توضیحات</label>
                            <textarea class="form-control"  name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <button style="position:relative; top: 5px; right:10px;" type="submit" name="save" class="btn btn-primary">ثبت</button>
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
    // console.log("jgvdcjdsc");
    // let day_hidden_toggeler=document.getElementsByClassName("month");
    // console.log(day_hidden_toggeler);
    // for (const key of day_hidden_toggeler) {
    //     console.log(key);
    //     key.addEventListener("click",()=>{
    //         console.log("vjvsdv");
    //     })
    // }
    document.getElementById("month-selector").addEventListener("change",()=>{
        if (document.getElementById("month-selector").value==12) {
            document.getElementById("last_day").style.display="none";
            document.getElementById("second_last_day").style.display="none";
        }else if (document.getElementById("month-selector").value==11 ||
            document.getElementById("month-selector").value==10 ||
            document.getElementById("month-selector").value==9 ||
            document.getElementById("month-selector").value==8 ||
            document.getElementById("month-selector").value==7) {
            document.getElementById("last_day").style.display="none";
            document.getElementById("second_last_day").style.display="block";
        }else{
            document.getElementById("last_day").style.display="block";
            document.getElementById("second_last_day").style.display="block";
        }

    })

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