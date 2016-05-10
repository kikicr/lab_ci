
<!-- Bootstrap 3.3.5 -->
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.min.js')?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url('assets/plugins/iCheck/icheck.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/particle-ground/jquery.particleground.min.js')?>"></script>

<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
        $('.login-page').particleground({
            dotColor: '#efefef',
            lineColor: '#efefef'
        });
        $('.pg-canvas').css({
           'z-index':0,
           'overflow-y':'hidden'
        });
        $('.login-box').css({
            'margin-top': -((($('body').height() / 2))+ 30) ,
            'z-index':9999
        });
    });

</script>