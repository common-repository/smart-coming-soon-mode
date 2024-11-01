<?php
if (! defined( 'ABSPATH' )){ 
  exit;
}
/* Jquery Url */
$scsm_includeurl = includes_url();
$scsm_path = $scsm_includeurl[strlen( $scsm_includeurl )-1];
if ( $scsm_path != '/' ) {
  $scsm_includeurl = $scsm_includeurl . '/';
}
$smart_csm_setting = get_option('smart_csm_option');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo esc_html($smart_csm_setting['headline']); ?></title>
  <link href="<?php echo SCSM_DIR_URL .'templates/default/css/style.css'; ?>" rel="stylesheet">
  <link href="<?php echo SCSM_DIR_URL .'templates/default/css/bootstrap.css'; ?>" rel="stylesheet">
  <link href="<?php echo SCSM_DIR_URL .'templates/default/css/font-awesome.min.css'; ?>" rel="stylesheet">
  <script type="text/javascript" src="<?php echo $scsm_includeurl.'js/jquery/jquery.js';?>"></script>
  <script type="text/javascript" src="<?php echo SCSM_DIR_URL .'templates/default/js/bootstrap.js'; ?>"></script>
  <style>
  /* Body Css */
  body {
    <?php if($smart_csm_setting['bg-setting']==1){?>
    background-color:<?php echo $smart_csm_setting['bg-color']; ?>;
    <?php } else{ ?>
      background:url("<?php echo esc_url($smart_csm_setting['bg-image']['url']); ?>");
      <?php } ?> 
     
  }
  /* Counter Css */
  #scsm-countdown > div { 
    font-family: <?php echo $smart_csm_setting['fontfamily']['font-family']; ?>;
    color: <?php echo $smart_csm_setting['countdown-color']; ?> !important;
  }

  /* Head Text Css */
  .scsm-head-title h2{
    font-size: <?php echo $smart_csm_setting['headingline-font-size']; ?>px;
    color: <?php echo $smart_csm_setting['headline-color']; ?>;
    font-family: <?php echo $smart_csm_setting['fontfamily']['font-family']; ?> !important;  
  }

  /* Description/Sub Title Css */
  .scsm-head-sub-title p{
    color: <?php echo $smart_csm_setting['description-color']; ?>;
    font-size: <?php echo $smart_csm_setting['description-font-size']; ?>px;
    font-family: <?php echo $smart_csm_setting['fontfamily']['font-family']; ?> !important;
  }

  /* Social Icon Css */
  .scsm-social-icon a i{
     color: <?php echo $smart_csm_setting['social-icon-color']; ?>;
  }
  .scsm-social-icon ul li{
    border: 1px solid <?php echo $smart_csm_setting['social-icon-color']; ?>;
  }

  /* Contact css */
  .scsm-contact-details > div > span{
    color: <?php echo $smart_csm_setting['contact-color']; ?> !important;
    font-family: <?php echo $smart_csm_setting['fontfamily']['font-family']; ?>;
  }
  .scsm-contact-details > div > i{
    color:<?php echo $smart_csm_setting['contact-color']; ?> !important;
  }
  </style>
</head>
<body>
<div class="wrapper">
    <div class="scsm-wrapper-content ">
      <div class="container">
        <div class="row">

        <?php if($smart_csm_setting['logo']!=0){?>
          <div class="col-md-12 scsm-pge-logo text-center">
            <img src="<?php if($smart_csm_setting['logo']==1) { echo esc_url($smart_csm_setting['logo-image']['url']); } ?>" alt="logo" width="150"/>
          </div>
        <?php } ?>

          <div class="col-md-12 scsm-head-title text-center">
           <h2><?php echo esc_html($smart_csm_setting['headline']); ?></h2>
         </div>
         <div class=" col-md-12 scsm-head-sub-title text-center">
          <p><?php echo esc_html($smart_csm_setting['description']); ?></p>
        </div>

        <!----- Counter Settings---------------------->
        <?php
        $date = str_replace('/', '-', $smart_csm_setting['countdown-date']);
        $orgdate=date('M d, Y', strtotime($date));
        
        if($smart_csm_setting['countdown']!=0){ ?>
        <div class="col-md-12" id="scsm-countdown" data-date="<?php echo $orgdate;?> 06:00:00">
        </div>
        <?php } ?>

      </div>
    </div>

    <?php if($smart_csm_setting['contact']!=0) {
      if($smart_csm_setting['address']!='' || $smart_csm_setting['email']!='' || $smart_csm_setting['contact-no']!='') { ?>
    <section>
      <div class="container">
       
        <div class="row text-center">
          <div class="col-md-12 scsm-contact-details">

            <?php if($smart_csm_setting['address']!='') { ?> 
            <div><i class="fa fa-home"></i><span><?php _e($smart_csm_setting['address'], 'smart-coming-soon-mode');?></span></div>
            <?php } ?>

            <?php if($smart_csm_setting['email']!='') { ?> 
            <div><i class="fa fa-envelope-o"></i><span><?php _e($smart_csm_setting['email'], 'smart-coming-soon-mode'); ?></span></div>
            <?php } ?>

            <?php if($smart_csm_setting['contact-no']!='') { ?> 
            <div><i class="fa fa-phone"></i><span><?php _e($smart_csm_setting['contact-no'], 'smart-coming-soon-mode');?></span></div>
            <?php }?>

          </div>
        </div>
      </div> 
    </section>
    <?php } } ?>

    <?php if($smart_csm_setting['social']!=0) {

      if($smart_csm_setting['facebook']!='' || $smart_csm_setting['twitter']!='' || $smart_csm_setting['linkedin']!='' || $smart_csm_setting['google']!='') { ?>
    <section>
      <div class="container">
        <div class="row text-center">
          <div class="col-md-12 scsm-social-icon">
            <ul>

             <?php if($smart_csm_setting['facebook']!=''){?>
              <li class="facebook">
                <a href="<?php echo esc_url($smart_csm_setting['facebook']); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
              </li>
            <?php }?>

            <?php if($smart_csm_setting['twitter']!=''){?>
              <li class="twitter">
                <a href="<?php echo esc_url($smart_csm_setting['twitter']); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
              </li>
              <?php }?>

              <?php if($smart_csm_setting['linkedin']!=''){?>
              <li class="linkedin">
                <a href="<?php echo esc_url( $smart_csm_setting['linkedin']); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
              </li>
              <?php }?>

              <?php if($smart_csm_setting['google']!=''){?>
              <li class="google-plus">
                <a href="<?php echo esc_url($smart_csm_setting['google']); ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
              </li>
              <?php }?>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <?php } } ?>
  </div>
</div>
<div class="<?php if($smart_csm_setting['overlay']==1){ echo 'scsm-overlay'; } ?>"></div>

<script type="text/javascript" src="<?php echo SCSM_DIR_URL .'templates/default/js/jquery.countdown.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo SCSM_DIR_URL .'templates/default/js/custom.js'; ?>"></script>
</body>
</html>