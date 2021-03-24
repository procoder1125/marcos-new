<?php

use yii\helpers\Url;
use common\models\Messages;
use common\models\Send;
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-3">
      <a href="<?= Url::to(['/messages/compose']) ?>" class="btn btn-primary btn-block margin-bottom">Compose</a>

      <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Folders</h3>

          <div class="box-tools">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="box-body no-padding">
          <ul class="nav nav-pills nav-stacked">
            <li class="active"><a href="<?=Url::to(['/messages/index'])?>"><i class="fa fa-inbox"></i> Inbox
                <span class="label label-primary pull-right"><?=$count?></span></a></li>
            <li><a href="<?=Url::to(['/messages/send'])?>"><i class="fa fa-envelope-o"></i> Sent</a></li>
            <li><a href="#"><i class="fa fa-file-text-o"></i> Drafts</a></li>
            <li><a href="#"><i class="fa fa-filter"></i> Junk <span class="label label-warning pull-right">65</span></a>
            </li>
            <li><a href="#" ><i class="fa fa-trash-o"></i> Trash</a></li>
          </ul>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /. box -->
      <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Labels</h3>

          <div class="box-tools">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="box-body no-padding">
          <ul class="nav nav-pills nav-stacked">
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> Important</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> Promotions</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-light-blue"></i> Social</a></li>
          </ul>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Inbox</h3>

          <div class="box-tools pull-right">
            <div class="has-feedback">
              <input type="text" class="form-control input-sm" placeholder="Search Mail">
              <span class="glyphicon glyphicon-search form-control-feedback"></span>
            </div>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <?php if (empty($messages)) : ?>
        <h2>Сообшения нет</h2>
        <?php else : ?>
        <div class="box-body no-padding">
          <div class="mailbox-controls">
            <!-- Check all button -->
            <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
            </button>
            <div class="btn-group">
              <button id='delete_all' name='delete_all' type="button" class="btn btn-default btn-sm"  data-method="post" data-confirm="Are you sure to delete ?" data-container="body" title="" data-original-title="Delete">
                <i class="fa fa-trash-o"></i></button>
              <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
              <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
            </div>
            <!-- /.btn-group -->
            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
            <div class="pull-right">
              1-50/200
              <div class="btn-group">
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
              </div>
              <!-- /.btn-group -->
            </div>
            <!-- /.pull-right -->
          </div>
          <div class="table-responsive mailbox-messages">
            <table class="table table-hover table-striped">
              <tbody>



                <?php foreach ($messages as $index => $message) : ?>

                <tr>
                  <td><input type="checkbox" class='delete_checkbox' id="<?=$message->id?>"></td>
                  <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
                  <td class="mailbox-name"><a href="<?= Url::to(['read-message', 'id' => $message->id]) ?>"><?= $message->name ?></a></td>
                 
                  </td>
                  <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                  <td class="mailbox-date">4 days ago</td>
                </tr>
                <?php endforeach ?>
                <script>
                  $(document).on('click', '#check', function() {
                    if (this.checked) {
                      console.log("work");
                    }
                  });
                </script>
              </tbody>
            </table>
            <!-- /.table -->
          </div>
          <!-- /.mail-box-messages -->
          <?php endif ?>
        </div>
        <!-- /.box-body -->
        <div class="box-footer no-padding">
          <div class="mailbox-controls">
            <!-- Check all button -->
            <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
            </button>
            <div class="btn-group">
              <a href="<?= Url::to(['/messages/delete', 'id' => $message->id]) ?>" type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-method="post" data-confirm="Are you sure to delete ?" data-container="body" title="" data-original-title="Delete">
                <i class="fa fa-trash-o"></i></a>
              <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
              <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
            </div>
            <!-- /.btn-group -->
            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
            <div class="pull-right">
              1-50/200
              <div class="btn-group">
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
              </div>
              <!-- /.btn-group -->
            </div>
            <!-- /.pull-right -->
          </div>
        </div>
      </div>
      <!-- /. box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>



<script>
$(document).ready(function(){
    $('.delete_checkbox').click(function(){
        if($(this).is(':checked'))
        {
            $(this).closest('tr').addClass('removeRow');
        }
        else
        {
            $(this).closest('tr').removeClass('removeClass');
        }
    })
}) ;

$('#delete_all').click(function(){
    var checkbox = $('.delete_checkbox:checked');
    if(checkbox.length > 0){
        var checkbox_value = [];
        $(checkbox).each(function(){
            checkbox_value.push($(this).val());        
        });
        alert(checkbox_value[1].val());
    $.ajax({
        url:'<?=Url::to('/admin/messages/delete-all')?>',
        method:'POST',
        data:{checkbox_value:checkbox_value},
        success:function(res){
            console.log(res);
            $('removeRow').fadeOut(1500);
        }
    });    
    }
    else{
        alert('Kamida bitta xabarni belgilang...')
    }
})
</script>