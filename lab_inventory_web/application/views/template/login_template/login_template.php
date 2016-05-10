<!DOCTYPE html>
<html>
<head>
   <?php echo $template['meta'];?>
    <title>  Lab Inventory | <?php echo $pages['actionTitle']?> </title>

   <?php echo $template['stylesheet']?>
  <?php echo $template['scripts']?>
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
       <!-- <a href="../../index2.html"><b><i class="fa fa-2x fa-flask"></i> Lab </b>Inventory</a>-->
    </div><!-- /.login-logo -->
    <div class="login-box-body">
    <p class="login-box-msg"><img src="<?php echo base_url('/assets/images/sltp-logo.png')?>" style="border-radius: 100%;max-width:150px;border:4px solid #ececec;"/></p>
      <h4 class="login-box-msg"><strong>Inventaris Lab</strong></h4>
      <?php echo $template['content'];?>

    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->
<?php echo $template['footerScripts'];?>
</body>
</html>
