<?php
$controllermenu=$this->router->fetch_class();
$functionmenu=$this->router->fetch_method();
?>
  <!-- Favicon -->
  <link rel="icon" type="image/png" href="<?php echo base_url('assets/images/icons/favicon.png');?>">

<!-- WebFont.js -->
<script>
    WebFontConfig = {
        google: { families: ['Poppins:400,500,600,700,800'] }
    };
    (function (d) {
        var wf = d.createElement('script'), s = d.scripts[0];
        wf.src = "<?php echo base_url('assets/js/webfont.js');?>";
        wf.async = true;
        s.parentNode.insertBefore(wf, s);
    })(document);
</script>

 <link rel="preload" href="<?php echo base_url('assets/vendor/fontawesome-free/webfonts/fa-regular-400.woff2');?>" as="font" type="font/woff2"
    crossorigin="anonymous">
<link rel="preload" href="<?php echo base_url('assets/vendor/fontawesome-free/webfonts/fa-solid-900.woff2');?>" as="font" type="font/woff2"
    crossorigin="anonymous">
<link rel="preload" href="<?php echo base_url('assets/vendor/fontawesome-free/webfonts/fa-brands-400.woff2');?>" as="font" type="font/woff2"
        crossorigin="anonymous">
<link rel="preload" href="<?php echo base_url('assets/fonts/wolmart.ttf?png09e');?>" as="font" type="font/ttf" crossorigin="anonymous">

<!-- Vendor CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css');?>">

<!-- Plugins CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/owl-carousel/owl.carousel.min.css');?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/animate/animate.min.css');?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/magnific-popup/magnific-popup.min.css');?>">

<!-- Default CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/demo7.min.css');?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.min.css');?>"> 

<style>

</style>
<input type="hidden" id="hidebaseurl" value="<?php echo base_url(); ?>">