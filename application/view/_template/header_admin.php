<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo TITLE . $page_title ?></title>

	<link rel="shortcut icon" type="image/x-icon" href="<?php echo URL?>favicon.ico">

	<!-- Global stylesheets -->
	<link href="<?php echo THEME?>fonts/roboto.css" rel="stylesheet" type="text/css">
	<link href="<?php echo THEME;?>css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?php echo THEME;?>css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="<?php echo THEME;?>css/core.css" rel="stylesheet" type="text/css">
	<link href="<?php echo THEME;?>css/components.css" rel="stylesheet" type="text/css">
	<link href="<?php echo THEME;?>css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="<?php echo THEME;?>js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?php echo THEME;?>js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo THEME;?>js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo THEME;?>js/plugins/loaders/blockui.min.js"></script>
	<script type="text/javascript" src="<?php echo THEME;?>js/plugins/forms/selects/select2.min.js"></script>
	<!-- /core JS files -->

	<!-- Override CSS files-->
	<link href="<?php echo THEME;?>pupsis/pupsis.css" rel="stylesheet" type="text/css">

	<!-- Theme JS files -->
	<script type="text/javascript" src="<?php echo THEME;?>js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="<?php echo THEME;?>js/plugins/forms/editable/editable.min.js"></script>
	<script type="text/javascript" src="<?php echo THEME;?>js/plugins/notifications/pnotify.min.js"></script>
	<script type="text/javascript" src="<?php echo THEME;?>js/plugins/notifications/sweet_alert.min.js"></script>
	<script type="text/javascript" src="<?php echo THEME;?>js/plugins/forms/inputs/formatter.min.js"></script>

	<script type="text/javascript" src="<?php echo THEME;?>js/core/app.js"></script>
	<!-- /theme JS files -->

	<script type="text/javascript">
		var url = '<?php echo URL;?>';
	</script>
</head>

<body>
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="<?php echo URL?>"><img src="<?php echo THEME?>images/logo.png"></a>
			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown dropdown-user menu_account">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<span><?php echo $_SESSION["firstname"];?></span>
						<i class="caret"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-right">
						<li class="menu_account"><a href="<?php echo URL?>admin/accounts"><i class="icon-cog5"></i> Account settings</a></li>
						<li><a href="<?php echo URL?>logout/admin"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>

	<div class="page-container">
		<div class="page-content">
			<div class="sidebar sidebar-main">
				<div class="sidebar-content">
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!--<li class="menu_dashboard"><a href="<?php echo URL?>admin/dashboard"><i class="icon-home4"></i> <span>Dashboard</span></a></li>-->
								<li class="menu_school"><a href="<?php echo URL?>admin/school"><i class="icon-office"></i> <span>Schools</span></a></li>

                                <li class="menu_registrar menu_registrar_add">
                                    <a href="#"><i class="icon-user-tie"></i> <span>Registrars</span></a>
                                    <ul>
                                    	<li class="menu_registrar_add"><a href="<?php echo URL?>admin/registrar_add"><span>Add Registrar</span></a>
                                        <li class="menu_registrar"><a href="<?php echo URL?>admin/registrar"><span>Manage Registrars</span></a>
                                    </ul>
                                </li>

                                <!-- <li class="menu_room"><a href="<?php echo URL?>admin/room"><i class="icon-home8"></i> <span>Rooms</span></a></li> -->
                                <li class="menu_course"><a href="<?php echo URL?>admin/course"><i class="icon-road"></i> <span>Courses</span></a></li>
                                <li class="menu_subject"><a href="<?php echo URL?>admin/subject"><i class="icon-book"></i> <span>Subjects</span></a></li>
                                <li class="menu_prerequisite"><a href="<?php echo URL?>admin/prerequisite"><i class="icon-exclamation"></i> <span>Prerequisite</span></a></li>
                                <li class="menu_system"><a href="<?php echo URL?>admin/system"><i class="icon-wrench"></i> <span>System</span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="content-wrapper">

				<div class="content">
