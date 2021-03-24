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

  

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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
</style>
<div class="student-index">

 

 

    <div class="row">


        <div class="col-md-8">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Kursni Tanlang</h3>

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
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <th>Yo'nalishlar</th>

                               
                            </tr>

                            <?php foreach ($kurslar as $index => $k) : ?>

                                <tr>
                                    <td><?= $index+1 ?></td>
                                    <td><a href="<?= Url::to(['/guruhlar/group', 'id' => $k->id]) ?>"> <?= $k->title ?> </a></td>
                                   

                                </tr>

                            <?php endforeach ?>


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
</script>


</div>
