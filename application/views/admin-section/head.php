<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
      
	<title><?php print @$title;?></title>
	<link rel="shortcut icon" type="image/x-icon" href="<?php print base_url();?>resource/icon/favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php print base_url();?>resource/admin_assets/global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
	<link href="<?php print base_url();?>resource/admin_assets/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php print base_url();?>resource/admin_assets/assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
	<link href="<?php print base_url();?>resource/admin_assets/assets/css/layout.min.css" rel="stylesheet" type="text/css">
	<link href="<?php print base_url();?>resource/admin_assets/assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="<?php print base_url();?>resource/admin_assets/assets/css/colors.min.css" rel="stylesheet" type="text/css">
	<script src="<?php print base_url();?>resource/admin_assets/global_assets/js/main/jquery.min.js"></script>
	<script src="<?php print base_url();?>resource/admin_assets/global_assets/js/main/bootstrap.bundle.min.js"></script>
	<script src="<?php print base_url();?>resource/admin_assets/global_assets/js/plugins/loaders/blockui.min.js"></script>
	<script src="<?php print base_url();?>resource/admin_assets/global_assets/js/plugins/ui/ripple.min.js"></script>
	<script src="<?php print base_url();?>resource/admin_assets/global_assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script src="<?php print base_url();?>resource/admin_assets/global_assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script src="<?php print base_url();?>resource/admin_assets/global_assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="<?php print base_url();?>resource/admin_assets/global_assets/js/plugins/ui/moment/moment.min.js"></script>
	<script src="<?php print base_url();?>resource/admin_assets/global_assets/js/plugins/pickers/daterangepicker.js"></script>
	<script src="<?php print base_url();?>resource/admin_assets/assets/js/app.js"></script>
	<script src="<?php print base_url();?>resource/admin_assets/global_assets/js/demo_pages/dashboard.js"></script>
	<script src="<?php print base_url();?>resource/admin_assets/global_assets/js/demo_charts/pages/dashboard/light/streamgraph.js"></script>
	<script src="<?php print base_url();?>resource/admin_assets/global_assets/js/demo_charts/pages/dashboard/light/sparklines.js"></script>
	<script src="<?php print base_url();?>resource/admin_assets/global_assets/js/demo_charts/pages/dashboard/light/lines.js"></script>	
	<script src="<?php print base_url();?>resource/admin_assets/global_assets/js/demo_charts/pages/dashboard/light/areas.js"></script>
	<script src="<?php print base_url();?>resource/admin_assets/global_assets/js/demo_charts/pages/dashboard/light/donuts.js"></script>
	<script src="<?php print base_url();?>resource/admin_assets/global_assets/js/demo_charts/pages/dashboard/light/bars.js"></script>
	<script src="<?php print base_url();?>resource/admin_assets/global_assets/js/demo_charts/pages/dashboard/light/progress.js"></script>
	<script src="<?php print base_url();?>resource/admin_assets/global_assets/js/demo_charts/pages/dashboard/light/heatmaps.js"></script>
	<script src="<?php print base_url();?>resource/admin_assets/global_assets/js/demo_charts/pages/dashboard/light/pies.js"></script>
	<script src="<?php print base_url();?>resource/admin_assets/global_assets/js/demo_charts/pages/dashboard/light/bullets.js"></script>
	<script src="<?php print base_url();?>resource/js/Chart.min.js"></script>
	<script src="<?php print base_url();?>resource/css/datatables/datatables.min.js"></script>
    <script src="<?php print base_url();?>resource/admin_assets/toast/jquery.toast.js"></script>
    <script src="<?php print base_url();?>resource/admin_assets/toast/toast-functions.js"></script>
    <link rel="stylesheet" href="<?php print base_url();?>resource/admin_assets/toast/jquery.toast.css">
	<link rel="stylesheet" href="<?php print base_url();?>resource/admin_assets/croppie/croppie.js">
	<link rel="stylesheet" href="<?php print base_url();?>resource/admin_assets/croppie/croppie.css">
	<link rel="stylesheet" href="<?php print base_url();?>resource/admin_assets/datatables/dataTables.bootstrap.css">
</head>
<body>