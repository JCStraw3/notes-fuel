<!DOCTYPE html>
<html>

<head>
	<meta charset='utf-8'>
	<title><?php echo $title; ?></title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<?php echo Asset::css('app.css'); ?>
</head>

<body>
	<div class='container'>
		<div class='col-md-12'>

			<!-- Title of page -->

			<h1><?php echo $title; ?></h1>

			<!-- Navigation. -->

			<ul class='nav nav-pills' align:'left'>
				<li><?php echo Html::anchor('/notes', 'Notes'); ?></li>
				<li><?php echo Html::anchor('notes/create', 'Create'); ?></li>
				<li><?php
				if (isset($user_info)){
					echo $user_info;
				} else {
					echo Html::anchor('login', 'Login');
					echo Html::anchor('register', 'Register');
				}
				?></li>
			</ul>
			<hr />

			<!-- Flash messaging. -->

			<?php if (Session::get_flash('success')): ?>
				<div class='alert alert-success'>
					<strong>Success</strong>
					<p>
						<?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
					</p>
				</div>
			<?php endif; ?>

			<?php if (Session::get_flash('error')): ?>
				<div class='alert alert-danger'>
					<strong>Error</strong>
					<p>
						<?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
					</p>
				</div>
			<?php endif; ?>

		</div>

		<!-- Content of page. -->

		<div class='col-md-12'>
			<?php echo $content; ?>
		</div>

		<!-- Footer. -->

		<footer>
			<!-- None for now. -->
		</footer>

	</div>
</body>

</html>
