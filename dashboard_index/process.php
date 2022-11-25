<?php
session_start();
$mysqli=new mysqli('localhost','root','','events') or die($mysqli->error);
//$title='';
//$title='';
//$description='';

if(isset($_POST['save'])) {
    require_once 'jdf.php';
    $title = $_POST['title'];
    $year = $_POST['year'];
    $month = $_POST['month'];
    $day = $_POST['day'];
    $day_type = $_POST['day_type'];
    $description = $_POST['description'];
//    if($month<10)
//    {
//        $month2='0'.$month;
//        $shamsi1=$year.'/'.$month2.'/'.$day;
//        $current_jdate = jdate($shamsi1, '', '', 'Asia/Tehran', 'en');
//
//        $arr_parts = explode('/', $current_jdate);
//
//        $jYear  = $arr_parts[0];
//        $jMonth = $arr_parts[1];
//        $jDay   = $arr_parts[2];
//
//        $current_gdate = jalali_to_gregorian($jYear, $jMonth, $jDay, '/');
//        $string=explode('/', $current_gdate);
//        $string_year=$string[0];
//        $string_month=$string[1];
//        $string_day=$string[2];

//    echo  $current_gdate;

//        $mysqli->query("INSERT INTO events(day_title,year_num,month_num,day_num,description,if_off,date_total)VALUES ('$title','$string_year','$string_month','$string_day','$description','$day_type','$shamsi1')") or
//        die($mysqli->error);
//        header("location:index.php");
//
//    }elseif($day<10){
//        $day__2='0'.$day;
//        $shamsi2=$year.'/'.$month.'/'.$day__2;
//        $current_jdate = jdate($shamsi2, '', '', 'Asia/Tehran', 'en');
//
//        $arr_parts = explode('/', $current_jdate);
//
//        $jYear  = $arr_parts[0];
//        $jMonth = $arr_parts[1];
//        $jDay   = $arr_parts[2];
//
//        $current_gdate = jalali_to_gregorian($jYear, $jMonth, $jDay, '/');
//        $string=explode('/', $current_gdate);
//        $string_year=$string[0];
//        $string_month=$string[1];
//        $string_day=$string[2];

//    echo  $current_gdate;

//        $mysqli->query("INSERT INTO events(day_title,year_num,month_num,day_num,description,if_off,date_total)VALUES ('$title','$string_year','$string_month','$string_day','$description','$day_type','$shamsi2')") or
//        die($mysqli->error);
//        header("location:index.php");
//
//    }elseif($month<10&&$day<10){
//        $month___2='0'.$month;
//        $day___2='0'.$day;
//        $shamsi3=$year.'/'.$month___2.'/'.$day___2;
//        $current_jdate = jdate($shamsi3, '', '', 'Asia/Tehran', 'en');
//
//        $arr_parts = explode('/', $current_jdate);
//
//        $jYear  = $arr_parts[0];
//        $jMonth = $arr_parts[1];
//        $jDay   = $arr_parts[2];
//
//        $current_gdate = jalali_to_gregorian($jYear, $jMonth, $jDay, '/');
//        $string=explode('/', $current_gdate);
//        $string_year=$string[0];
//        $string_month=$string[1];
//        $string_day=$string[2];

//    echo  $current_gdate;

//        $mysqli->query("INSERT INTO events(day_title,year_num,month_num,day_num,description,if_off,date_total)VALUES ('$title','$string_year','$string_month','$string_day','$description','$day_type','$shamsi3')") or
//        die($mysqli->error);
//        header("location:index.php");

    $shamsi=$year.'/'.$month.'/'.$day;
    $current_jdate = jdate($shamsi, '', '', 'Asia/Tehran', 'en');

    $arr_parts = explode('/', $current_jdate);

    $jYear  = $arr_parts[0];
    $jMonth = $arr_parts[1];
    $jDay   = $arr_parts[2];

    $current_gdate = jalali_to_gregorian($jYear, $jMonth, $jDay, '/');
    $string=explode('/', $current_gdate);
    $string_year=$string[0];
    $string_month=$string[1];
    $string_day=$string[2];
    $miladi_0=$string_year.'/'.$string_month.'/'.$string_day;
    if ($string_month<10&&$string_day<10)
    {
        $string_month_zero='0'.$string_month;
        $string_day_zero='0'.$string_day;
        $miladi_1=$string_year.'/'.$string_month_zero.'/'.$string_day_zero;
        $mysqli->query("INSERT INTO events(day_title,year_num,month_num,day_num,description,if_off,date_total,miladi)VALUES ('$title','$string_year','$string_month','$string_day','$description','$day_type','$shamsi','$miladi_1')") or
        die($mysqli->error);
        header("location:index.php");
    }elseif($string_month<10){
        $string_month_zero='0'.$string_month;
        $miladi_2=$string_year.'/'.$string_month_zero.'/'.$string_day;
        print($miladi_2);
        $mysqli->query("INSERT INTO events(day_title,year_num,month_num,day_num,description,if_off,date_total,miladi)VALUES ('$title','$string_year','$string_month','$string_day','$description','$day_type','$shamsi','$miladi_2')") or
        die($mysqli->error);
        header("location:index.php");
    }elseif($string_day<10){
        $string_month_zero='0'.$string_day;
        $miladi_3=$string_year.'/'.$string_month.'/'.$string_day_zero;
        $mysqli->query("INSERT INTO events(day_title,year_num,month_num,day_num,description,if_off,date_total,miladi)VALUES ('$title','$string_year','$string_month','$string_day','$description','$day_type','$shamsi','$miladi_3')") or
        die($mysqli->error);
        header("location:index.php");
    }

        // $mysqli->query("INSERT INTO events(day_title,year_num,month_num,day_num,description,if_off,date_total,miladi)VALUES ('$title','$string_year','$string_month','$string_day','$description','$day_type','$shamsi','$miladi_0')") or
        // die($mysqli->error);
        // header("location:index.php");
    

        


}



if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   $mysqli->query("DELETE FROM events WHERE id=$id") or die($mysqli->error);
   $_SESSION['message']="تاریخ مورد نظر حذف شد!";
   $_SESSION['msg_type']="danger";
   header("location:index.php");

}

if(isset($_GET['sync'])) {
    require_once 'jdf.php';
    $id = $_GET['sync'];
    $result = $mysqli->query("SELECT * FROM events WHERE id='$id'") or die($mysqli->error);
    if (count(array($result)) == 1) {
        $row = $result->fetch_array();
        $title = $row['day_title'];
        $miladi=$row['miladi'];
        $day_type = $row['if_off'];
        $description = $row['description'];
        $arr_parts=explode('/',$miladi);
        $year=$arr_parts[0];
        $month=$arr_parts[1];
        $day=$arr_parts[2];
        $later_year=$year+1;
        $miladi=$later_year.'/'.$month.'/'.$day;
        $current_gdate = date($miladi);
 
        $arr_parts = explode('/', $current_gdate);
 
       $gYear  = $arr_parts[0];
       $gMonth = $arr_parts[1];
       $gDay   = $arr_parts[2];
 
       $current_jdate = gregorian_to_jalali($gYear, $gMonth, $gDay, '/');
 
    echo $current_gdate . ' - ' . $current_jdate;
        $mysqli->query("UPDATE events SET day_title='$title'  ,year_num='$later_year'  ,month_num='$month'  ,day_num='$day'  ,description='$description'   ,if_off='$day_type', date_total='$current_jdate',miladi='$miladi' WHERE id='$id'")or die($mysqli->error);
        $_SESSION['message']="تاریخ مورد نظر ویرایش شد!";
        $_SESSION['msg_type']="warning";
        header("location:index.php");

    }
}

if(isset($_POST['update'])){
    require_once 'jdf.php';
    $id = $_POST['id'];
    $title=$_POST['title'];
    $year=$_POST['year'];
    $month=$_POST['month'];
    $day=$_POST['day'];
    $day_type=$_POST['day_type'];
    $description=$_POST['description'];
    $shamsi=$year.'/'.$month.'/'.$day;
    
    $current_jdate = jdate($shamsi, '', '', 'Asia/Tehran', 'en');

    $arr_parts = explode('/', $current_jdate);

    $jYear  = $arr_parts[0];
    $jMonth = $arr_parts[1];
    $jDay   = $arr_parts[2];

    $current_gdate = jalali_to_gregorian($jYear, $jMonth, $jDay, '/');

    $string=explode('/', $current_gdate);
    $string_year=$string[0];
    $string_month=$string[1];
    $string_day=$string[2];
    if ($string_month<10&&$string_day<10)
    {
        $string_month_zero='0'.$string_month;
        $string_day_zero='0'.$string_day;
        $miladi_1=$string_year.'/'.$string_month_zero.'/'.$string_day_zero;
        print ($miladi_1);
        $mysqli->query("UPDATE events SET day_title='$title'  ,year_num='$string_year'  ,month_num='$string_month'  ,day_num='$string_day'  ,description='$description'   ,if_off='$day_type',date_total='$shamsi', miladi='$miladi_1' WHERE id='$id'")or die($mysqli->error);
        $_SESSION['message']="تاریخ مورد نظر ویرایش شد!";
        $_SESSION['msg_type']="warning";
        header("location:index.php");
    }elseif($string_month<10){
        $string_month_zero='0'.$string_month;
        $miladi_2=$string_year.'/'.$string_month_zero.'/'.$string_day;
        print($miladi_2);
       $mysqli->query("UPDATE events SET day_title='$title'  ,year_num='$string_year'  ,month_num='$string_month'  ,day_num='$string_day'  ,description='$description'   ,if_off='$day_type',date_total='$shamsi', miladi='$miladi_2' WHERE id='$id'")or die($mysqli->error);
       $_SESSION['message']="تاریخ مورد نظر ویرایش شد!";
       $_SESSION['msg_type']="warning";
       header("location:index.php");
    }elseif($string_day<10){
        $string_month_zero='0'.$string_day;
        $miladi_3=$string_year.'/'.$string_month.'/'.$string_day_zero;
        print($miladi_3);

        $mysqli->query("UPDATE events SET day_title='$title'  ,year_num='$string_year'  ,month_num='$string_month'  ,day_num='$string_day'  ,description='$description'   ,if_off='$day_type',date_total='$shamsi', miladi='$miladi_3' WHERE id='$id'")or die($mysqli->error);
        $_SESSION['message']="تاریخ مورد نظر ویرایش شد!";
        $_SESSION['msg_type']="warning";
        print("xlkjdfgb;kxjdfgb;");
        header("location:index.php");
    }

    
    
}

