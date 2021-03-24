<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\GuruhlarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = "Yo'nalish tanlang";
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





        <div class="row">


            <div class="col-md-8 col-xl-12 col-lg-8">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Responsive Hover Table</h3>

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
                    <div class="row">
                        <div class="col-md-6">
                            <a href="<?= Url::to(['/guruhlar/create', 'id' => $id]) ?>" class="btn btn-success" onclick="myFunction()">Guruh qo'shish </a>


                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <th>Yo'nalishlar</th>
                                    </tr>
                                    <?php foreach ($guruhlar as $index => $guruh) : ?>

                                        <tr>
                                            <td><?= $index+1 ?></td>
                                            <td><a href="<?= Url::to(['/guruhlar/ww', 'id' => $guruh->id, 'kurs_id' => $id]) ?>"> <?= $guruh->title ?> </a></td>
                                            <td><span class="label label-success">Approved</span></td>

                                        </tr>

                                    <?php endforeach ?>

                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>


    </div>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#search").keyup(function() {
                var query = $(this).val();
                if (query != "") {
                    $.ajax({
                        url: '/admin/student/index',
                        method: 'POST',
                        data: {
                            query: query
                        },
                        success: function(data) {
                            console.log(data);
                            $('#results').html(data);
                            $('#results').css('display', 'block');
                            $("#country").focusout(function() {
                                $('#results').css('display', 'none');
                            });
                            $("#country").focusin(function() {
                                $('#results').css('display', 'block');
                            });
                        }
                    });
                } else {
                    $('#results').css('display', 'none');
                }
            });
        });



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
    </script>


</div>