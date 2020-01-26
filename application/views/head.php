<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="author" content="Techo Craft">
    <title><?php print @$title;?></title>
    	  <?php $site_description1 = @str_replace('<br>','',$site_description);
		  $site_description2 = @str_replace('<p>','',$site_description1);
		  $site_description3 = @str_replace('</p>','',$site_description2);?>
	  <meta name="description" content="<?php print @htmlentities($site_description3);?>"/>
   	  <meta name="keywords" content="Techo Craft, <?php print $siteDetail['site_name'];?>, Real Estate, House For Rent, House For Sale, For Sale, For Rent"/>
   	  <meta name="Classification" content="Real Estate Company">
      <meta name="target" content="Real Estate companies in Enugu Nigeria">
      <meta property="og:site_name" content="<?php print $siteDetail['site_name'];?>"/>
	  <meta property="og:url" content="<?php print @$page_url;?>" />
	  <meta property="og:type" content="website" />
	  <meta property="og:title" content="<?php print @$title;?>" />
	  <meta property="og:description" content="<?php print @htmlentities($site_description3);?>" />
	  <meta property="og:image" content="<?php print @$thumbnail_path;?>" />
	  <meta property="og:image:secure_url" content="<?php print @$thumbnail_path;?>" />
	  <meta property="og:image:width" content="600" />
	  <meta property="og:image:height" content="415" />
	  <meta name="twitter:card" content="<?php print $siteDetail['site_name'];?>">
	  <meta name="twitter:url" content="<?php print @$page_url;?>">
	  <meta name="twitter:title" content="<?php print @$title;?>">
	  <meta name="twitter:description" content="<?php print @htmlentities($site_description3);?>">
	  <meta name="apple-mobile-web-app-status-bar-style" content="black" />
      <meta name="GOOGLEBOT" content="index follow"/>
      <meta name="apple-mobile-web-app-capable" content="yes" />
      
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php print base_url();?>resource/icon/favicon.ico">
    <link rel="stylesheet" href="<?php print base_url();?>resource/css/jquery-ui.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <link rel="stylesheet" href="<?php print base_url();?>resource/css/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="<?php print base_url();?>resource/toast/jquery.toast.css">
    <link rel="stylesheet" href="<?php print base_url();?>resource/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?php print base_url();?>resource/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php print base_url();?>resource/revolution/css/settings.css">
    <link rel="stylesheet" href="<?php print base_url();?>resource/revolution/css/layers.css">
    <link rel="stylesheet" href="<?php print base_url();?>resource/revolution/css/navigation.css">
    <link rel="stylesheet" href="<?php print base_url();?>resource/css/search.css">
    <link rel="stylesheet" href="<?php print base_url();?>resource/css/animate.css">
    <link rel="stylesheet" href="<?php print base_url();?>resource/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php print base_url();?>resource/css/lightcase.css">
    <link rel="stylesheet" href="<?php print base_url();?>resource/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php print base_url();?>resource/css/bootstrap.css">
    <link rel="stylesheet" href="<?php print base_url();?>resource/css/slider-search2.css">
    <link rel="stylesheet" href="<?php print base_url();?>resource/css/styles.css">
    <link rel="stylesheet" id="color" href="<?php print base_url();?>resource/css/colors/orange.css">
	<link rel="stylesheet" id="color" href="<?php print base_url();?>resource/css/default.css">
	<link rel="stylesheet" href="<?php print base_url();?>resource/css/croppie.css">
	<link rel="stylesheet" href="<?php print base_url('resource/css/agents_css.css');?>">
	<script src="<?php print base_url();?>resource/js/Chart.min.js"></script>
</head>
