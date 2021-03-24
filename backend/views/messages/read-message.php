<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>
<section class="content">
  <div class="row">
    <div class="col-md-3">
      <a href="<?= Url::to(['compose']) ?>" class="btn btn-primary btn-block margin-bottom">Compose</a>

      <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Folders</h3>

          <div class="box-tools">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>e
        </div>
        <div class="box-body no-padding">
          <ul class="nav nav-pills nav-stacked">
            <li><a href="mailbox.html"><i class="fa fa-inbox"></i> Inbox
                <span class="label label-primary pull-right">12</span></a></li>
            <li><a href="#"><i class="fa fa-envelope-o"></i> Sent</a></li>
            <li><a href="#"><i class="fa fa-file-text-o"></i> Drafts</a></li>
            <li><a href="#"><i class="fa fa-filter"></i> Junk <span class="label label-warning pull-right">65</span></a>
            </li>
            <li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li>
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
          <h3 class="box-title">Read Mail</h3>

          <div class="box-tools pull-right">
            <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Previous"><i class="fa fa-chevron-left"></i></a>
            <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Next"><i class="fa fa-chevron-right"></i></a>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <div class="mailbox-read-info">
            <h3>Message Subject Is Placed Here</h3>
            <h5>From: <?= $message->from ?>
              <span class="mailbox-read-time pull-right">15 Feb. 2016 11:03 PM</span></h5>
          </div>
          <!-- /.mailbox-read-info -->
          <div class="mailbox-controls with-border text-center">
            <div class="btn-group">
              <a href="<?= Url::to(['/messages/delete', 'id' => $message->id]) ?>" type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-method="post" data-confirm="Are you sure to delete ?" data-container="body" title="" data-original-title="Delete">
                <i class="fa fa-trash-o"></i></a>
              <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="" data-original-title="Reply">
                <i class="fa fa-reply"></i></button>
              <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="" data-original-title="Forward">
                <i class="fa fa-share"></i></button>
            </div>
            <!-- /.btn-group -->
            <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="" data-original-title="Print">
              <i class="fa fa-print"></i></button>
          </div>
          <!-- /.mailbox-controls -->
          <div class="mailbox-read-message">


            <p><?= $message->description ?></p>


          </div>

          <!-- /.mailbox-read-message -->
        </div>

        <!-- /.box-body -->

        <!-- /.box-footer -->
        <div class="box-footer">
          <div class="pull-right">
            <button type="button" class="btn btn-default"><i class="fa fa-reply"></i> Reply</button>
            <button type="button" class="btn btn-default"><i class="fa fa-share"></i> Forward</button>
          </div>
          <a href="<?= Url::to(['/messages/delete', 'id' => $message->id]) ?>" type="button" class="btn btn-default" data-method="post" data-confirm="Are you sure to delete ?"><i class="fa fa-trash-o"></i> Delete</a>
          <button type="button" class="btn btn-default"><i class="fa fa-print"></i> Print</button>
        </div>
        <!-- /.box-footer -->
      </div>
      <!-- /. box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>