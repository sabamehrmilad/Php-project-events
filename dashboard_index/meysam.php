
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />

</head>
<body>





<div class="container-fluid">
    <div class="row">
        <div class="col col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
            <div class="box">
                <div class="content">
                    <!--Content of the Page Starts-->

                    <!--Dear Milad, YOUE CODES ARE HERE...-->
                    <label class="my-1 mr-2" for="month-selector"></label>
                    <select class="custom-select my-1 mr-sm-2" name="month" id="nameselect" style="width:400px">
                        <option selected value="-1">تعطیلی یا غیر تعطیلی روزها را انتخاب بکنید</option>
                        <option value="0">تعطیل</option>
                        <option value="1">غیر تعطیل</option>
                    </select>

                    <table  style='text-align: right;' class='table table-hover table-bordered' id="myTable">
                        <thead>
                        <tr class="table-active" id="table_header">
                            <th scope="col">#</th>
                            <th scope="col">عنوان</th>
                            <th scope="col">تاریخ</th>
                            <th scope="col">شرح</th>
                            <th scope="col">وضعیت</th>
                            <th scope="col">عملیات</th>
                        </tr>
                        </thead>
                        <tbody id="">
                            <tr>
                                <td>59</td>
                                <td>شهادت امام حسن عسگری و آغاز امامت حضرت ولی عصر</td>
                                <td style="width:200px;" class="vote">1403/8/4-2024/10/25</td>
                                <td><textarea disabled style="width: 400px; height:100px;"></textarea></td>
                                <td>تعطیل</td>
                                <td style="width:150px;">
                                    <a href="edit.php" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                    <a href="process.php" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    <a href="process.php" class="btn btn-danger">+1</a>
                                </td>
                            </tr>
                            <tr>
                                <td>58</td>
                                <td>شهادت امام رضا</td>
                                <td style="width:200px;" class="vote">1400/7/26-2021/10/18</td>
                                <td><textarea disabled style="width: 400px; height:100px;"></textarea></td>
                                <td>تعطیل</td>
                                <td style="width:150px;">
                                    <a href="edit.php" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                    <a href="process.php" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    <a href="process.php" class="btn btn-danger">+1</a>
                                </td>
                            </tr>
                            <tr>
                                <td>57</td>
                                <td>رحلت حضرت رسول اکرم و شهادت حضرت امام حسن مجتبی	</td>
                                <td style="width:200px;" class="vote">1400/7/25-2021/10/17</td>
                                <td><textarea disabled style="width: 400px; height:100px;"></textarea></td>
                                <td>تعطیل نمی باشد</td>
                                <td style="width:150px;">
                                    <a href="edit.php" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                    <a href="process.php" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    <a href="process.php" class="btn btn-danger">+1</a>
                                </td>
                            </tr>
                            <tr>
                                <td>56</td>
                                <td>اربعین حسینی 	</td>
                                <td style="width:200px;" class="vote">1399/7/17-2021/10/8</td>
                                <td><textarea disabled style="width: 400px; height:100px;"></textarea></td>
                                <td>تعطیل نمی باشد</td>
                                <td style="width:150px;">
                                    <a href="edit.php" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                    <a href="process.php" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    <a href="process.php" class="btn btn-danger">+1</a>
                                </td>
                            </tr>
                            <tr>
                                <td>55</td>
                                <td>عاشورای حسینی 	</td>
                                <td style="width:200px;" class="vote">1400/6/8-2021/8/3</td>
                                <td><textarea disabled style="width: 400px; height:100px;"></textarea></td>
                                <td>تعطیل </td>
                                <td style="width:150px;">
                                    <a href="edit.php" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                    <a href="process.php" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    <a href="process.php" class="btn btn-danger">+1</a>
                                </td>
                            </tr>
                            <tr>
                                <td>54</td>
                                <td>عاشورای حسینی 	</td>
                                <td style="width:200px;" class="vote">1400/6/8-2021/8/3</td>
                                <td><textarea disabled style="width: 400px; height:100px;"></textarea></td>
                                <td>تعطیل </td>
                                <td style="width:150px;">
                                    <a href="edit.php" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                    <a href="process.php" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    <a href="process.php" class="btn btn-danger">+1</a>
                                </td>
                            </tr>
                            <tr>
                                <td>53</td>
                                <td>تاسوعای حسینی 	</td>
                                <td style="width:200px;" class="vote">1400/6/7-2021/8/29</td>
                                <td><textarea disabled style="width: 400px; height:100px;"></textarea></td>
                                <td>تعطیل نمی باشد </td>
                                <td style="width:150px;">
                                    <a href="edit.php" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                    <a href="process.php" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    <a href="process.php" class="btn btn-danger">+1</a>
                                </td>
                            </tr>
                            <tr>
                                <td>52</td>
                                <td>عید سعید غدیر خم 	</td>
                                <td style="width:200px;" class="vote">1401/5/8-2022/7/30</td>
                                <td><textarea disabled style="width: 400px; height:100px;"></textarea></td>
                                <td>تعطیل  </td>
                                <td style="width:150px;">
                                    <a href="edit.php" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                    <a href="process.php" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    <a href="process.php" class="btn btn-danger">+1</a>
                                </td>
                            </tr>
                            <tr>
                                <td>51</td>
                                <td>عید سعید قربان	 	</td>
                                <td style="width:200px;" class="vote">1400/5/9-2021/7/31</td>
                                <td><textarea disabled style="width: 400px; height:100px;"></textarea></td>
                                <td>تعطیل نمی باشد  </td>
                                <td style="width:150px;">
                                    <a href="edit.php" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                    <a href="process.php" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    <a href="process.php" class="btn btn-danger">+1</a>
                                </td>
                            </tr>
                            <tr>
                                <td>50</td>
                                <td>شهادت حضرت امام جعفر صادق	 	</td>
                                <td style="width:200px;" class="vote">1399/3/28-2020/6/17</td>
                                <td><textarea disabled style="width: 400px; height:100px;"></textarea></td>
                                <td>تعطیل نمی باشد  </td>
                                <td style="width:150px;">
                                    <a href="edit.php" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                    <a href="process.php" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    <a href="process.php" class="btn btn-danger">+1</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <!--Content of the Page Ends-->
                </div>
            </div>
        </div>
    </div>
</div>
<br />
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