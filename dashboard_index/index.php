
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
                <?php include '../sections/menu.php';?>
                <?php require_once 'process.php'; ?>
                <?php
                  $mysqli=new mysqli('localhost','root','','events');
                  $results=$mysqli->query("SELECT * FROM events ORDER BY miladi") or die ($mysqli->error);

                ?>

                <?php

                if(isset($_SESSION['message'])): ?>

                <div class="alert alert-<?=$_SESSION['msg_type']?>">

                <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
                ?>
                <?php endif ?>
                </div>



                <div class="container-fluid">
                    <div class="row">
                        <?php include '../sections/dashboard.php';?>
                        <div class="col col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                            <div class="box">
                                <div class="content">
                                <!--Content of the Page Starts-->

                                <!--Dear Milad, YOUE CODES ARE HERE...-->
                                    <select id="countriesDropdown" oninput="filterTable()">
                                        <option>نوع روز مورد نظر را انتخاب بکنید</option>
                                        <option>تعطیل</option>
                                        <option>تعطیل نمی باشد</option>
                                    </select>
<!--                                    <span id="sort"  class="btn btn-primary">مرتب سازی بر اساس تاریخ شمسی </span>-->

                                    <table  style='text-align: right;' class='table table-hover table-bordered' id="myTable">
                                        <thead>
                                        <tr class="table-active" id="table_header">
                                            <th scope="col">#</th>
                                            <th scope="col">عنوان</th>
                                            <th scope="col"> تاریخ شمسی</th>
                                            <th scope="col"> تاریخ میلادی</th>
                                            <th scope="col">شرح</th>
                                            <th scope="col">وضعیت</th>
                                            <th scope="col">عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody id="tbody">
                                        <?php while($row = $results->fetch_assoc()):  ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['day_title'];?></td>
                                            <td class="vote">
                                            <?php 
                                             require_once 'jdf.php';
                                            echo $row['date_total'];
                                            ?></td>
                                           <td  ><?php
                                               echo $row['miladi'];
                                               ?></td>
                                            <td><?php echo $row['description']; ?></td>
                                            <td><?php if ($row['if_off']==1) echo 'تعطیل'; else echo 'تعطیل نمی باشد'?></td>
                                            <td style="width:150px;">
                                                <a href="edit.php?edit=<?php echo $row['id']; ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                                <a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                <a href="process.php?sync=<?php echo $row['id']; ?>" class="btn btn-danger">+1</a>
                                            </td>
                                        </tr>
                                        <?php endwhile; ?>

                                        </tbody>
                                    </table>

                                <!--Content of the Page Ends-->
                                </div>    
                            </div>
                        </div>
                    </div>
                </div> 
                <br />
                <?php include '../sections/footer.php'; ?>
                <script>
                    document.getElementById("sort").addEventListener("click",()=>{
                        

                        let table_body=document.getElementById("tbody");
                        let dates_array=[];
                        let dates_content=document.getElementsByClassName("vote");
                        for (const i of dates_content) {
                            let splitted_content=i.textContent.split("-");
                            dates_array.push(splitted_content[0]);
                        }
                        console.log(dates_array);
                        dates_array=dates_array.sort();
                        let t_body=document.createElement("tbody");
                        for (const i in dates_array) {
                            for (const j of dates_content) {
                                if (j.textContent.includes(dates_array[i])) {
                                    t_body.appendChild(j.parentElement);
                                }

                            }
                        }
                        table_body.parentElement.replaceChild(t_body,table_body);
                        t_body.setAttribute("id","tbody");
                    })
                </script>
                <script src="../js/vendor/modernizr-3.6.0.min.js"></script>
                <script>
                    function filterTable() {
                        // Variables
                        let dropdown, table, rows, cells, country, filter;
                        dropdown = document.getElementById("countriesDropdown");
                        table = document.getElementById("myTable");
                        rows = table.getElementsByTagName("tr");
                        filter = dropdown.value;

                        // Loops through rows and hides those with countries that don't match the filter
                        for (let row of rows) { // `for...of` loops through the NodeList
                            cells = row.getElementsByTagName("td");
                            country = cells[5] || null; // gets the 2nd `td` or nothing
                            // if the filter is set to 'All', or this is the header row, or 2nd `td` text matches filter
                            if (filter === "نوع روز مورد نظر را انتخاب بکنید" || !country || (filter === country.textContent)) {
                                row.style.display = ""; // shows this row
                            }
                            else {
                                row.style.display = "none"; // hides this row
                            }
                        }
                    }
                </script>
                <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
                <script>window.jQuery || document.write('<script src="../js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
                <script src="../js/plugins.js"></script>
                <script src="../js/main.js"></script>
                <!-- <script src="../js/main.js"></script> -->
                    
                
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