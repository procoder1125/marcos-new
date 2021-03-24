<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use common\models\Kurslar;

/* @var $this yii\web\View */
/* @var $model common\models\Student */

$title = Kurslar::findOne($id);
$this->title = $title->title;
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
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
</style>
<div class="student-view">

    <div class="row">


        <div class="col-md-12">
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
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Kurs nomi</th>
                                <th>Telefon</th>
                                <th>Dars vaqti</th>
                            </tr>

                            <?php foreach ($students as $student) : ?>

                                <tr>
                                    <td><?= $student->id ?></td>
                                    <td><a href="<?= Url::to(['/student/view', 'id' => $student->id]) ?>"> <?= $student->fullname ?> </a></td>
                                    <td><a href="<?= Url::to(['/student/view', 'id' => $student->id]) ?>"> <?= Kurslar::findOne(['id' => $student->kurs_id])->title ?> </a></td>
                                    <td><a href="<?= Url::to(['/student/view', 'id' => $student->id]) ?>"> <?= $student->phone ?> </a></td>
                                    <td><a href="<?= Url::to(['/student/view', 'id' => $student->id]) ?>"> <?= $student->dars_vaqti ?> </a></td>
                                    

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
                    url: '/admin/student/view',
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