<?php

use common\models\Guruhlar;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\GuruhlarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Guruhlar::findOne(['kurs_id' => $id])->title;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="guruhlar-index">



    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <style>
        #search_container {
            text-align: center;
        }

        #results {
            text-align: left;
            border: solid 1px #777;
            display: none;
            margin: 0 auto;
            width: 180px;
        }

        .result {
            background-color: #f2f2f2;
            position: absolute;
            z-index: 999;
            top: 100%;
            left: 0;
        }

        .result p {
            margin: 0;
            padding: 7px 10px;
            border: 1px solid #CCCCCC;
            border-top: none;
            cursor: pointer;
        }

        .result p:hover {
            background: #ccccff;
        }

        #myDIV {
            width: 90%;
            padding: 20px 0;
            text-align: center;
            background-color: '';
            margin-top: 20px;
            transition-duration: 2s;
        }

        #myDIV2 {
            width: 90%;
            padding: 50px 0;
            text-align: center;
            background-color: lightblue;
            margin-top: 20px;
            transition-duration: 2s;
        }
    </style>
    <div class="student-index">





        <div class="row box-body table-responsive no-padding">


            <div class="col-md-12 col-xl-12 col-lg-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?=$this->title = Guruhlar::findOne(['kurs_id' => $id])->title;?> guruhi talabalari</h3>

                        <div class="box-tools">
                            <div class="input-group input-group-sm search-box" style="width: 150px;">
                                <input type="text" name="table_search" id="search" class="form-control pull-right search" placeholder="Search">
                                <div style="width:200px;" id='results' class='result' class='form-control pull-right'></div>
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="row " style="margin-bottom: 5%;">
                        <div class="col-md-6">
                            <button class="btn btn-success" onclick="myFunction()">Talaba qo'shish </button>

                            <div id="myDIV" class="" style="display: none;">

                                <select id="select" name="select" class="form-control" style="width: 80%; margin-left:10%;">

                                    <?php foreach ($students as $student) : ?>
                                        <option value="<?= $student->id ?>"><?= $student->fullname ?></option>
                                    <?php endforeach ?>

                                </select>
                                <button style="margin-top:5%; text-align:right;" class="btn btn-primary">добавить</button>



                            </div>

                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-success" onclick="myFunction2()">Tugatilgan darslik </button>

                            <div id="myDIV2" style="display: none;">

                            </div>

                        </div>

                    </div>

                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <th>Category name</th>
                                    <th>Telefon</th>

                                </tr>

                                <?php foreach ($crstudents as $index => $crs) : ?>

                                    <tr>
                                        <td><?= $index+1 ?></td>
                                        <td><p> <?= $crs->name ?> </p></td>
                                        <td><p> <?= $crs->telefon ?> </p></td>
                                        <td><span class="label label-success">Approved</span></td>

                                    </tr>

                                <?php endforeach ?>
                                <tr id="server-results">
                                    <td></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

        </div>


    </div>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script type="text/javascript">
        function myFunction() {
            var x = document.getElementById("myDIV");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function myFunction2() {
            var x = document.getElementById("myDIV2");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        $("#myDIV button").click(function() {
            var data = $('#select').val();
            var guruh_id = <?= $id ?>;
            // event.preventDefault(); //prevent default action 
            // var post_url = $(this).attr("action"); //get form action url
            // var request_method = $(this).attr("method"); //get form GET/POST method
            // var form_data = $('#select').val(); //Encode form elements for submission

            $.ajax({
                url: "/admin/guruhlar/create-student",
                type: "POST",
                data: {
                    data: data,
                    guruh_id: guruh_id
                },
            }).done(function(response) { //
                console.log(response);
                $("#server-results").html(response);
            });
        });
    </script>


</div>