<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
<!-- End fonts -->

<link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/images/') ?>apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/images/') ?>favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/images/') ?>favicon-16x16.png">
<link rel="manifest" href="<?= base_url('assets/images/') ?>site.webmanifest">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<!-- core:css -->
<link rel="stylesheet" href="<?= base_url("assets") ?>/vendors/core/core.css">
<!-- endinject -->

<!-- Plugin css for this page -->
<link rel="stylesheet" href="<?= base_url("assets") ?>/vendors/flatpickr/flatpickr.min.css">

<link href="https://cdn.datatables.net/v/bs5/dt-2.0.0/datatables.min.css" rel="stylesheet"> 
<script src="https://cdn.datatables.net/v/bs5/dt-2.0.0/datatables.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.45.2/apexcharts.min.css" integrity="sha512-qc0GepkUB5ugt8LevOF/K2h2lLGIloDBcWX8yawu/5V8FXSxZLn3NVMZskeEyOhlc6RxKiEj6QpSrlAoL1D3TA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.45.2/apexcharts.min.js" integrity="sha512-vIqZt7ReO939RQssENNbZ+Iu3j0CSsgk41nP3AYabLiIFajyebORlk7rKPjGddmO1FQkbuOb2EVK6rJkiHsmag==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?= base_url() ?>assets/js/apexcharts-light.js"></script>
<!-- End plugin css for this page -->

<!-- Plugin: JQuery Validator  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/additional-methods.min.js" integrity="sha512-TiQST7x/0aMjgVTcep29gi+q5Lk5gVTUPE9XgN0g96rwtjEjLpod4mlBRKWHeBcvGBAEvJBmfDqh2hfMMmg+5A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Plugin: JQuery Validator  -->

<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script> -->

<!-- Plugin: JQuery daterangepicker  -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.css" />
<!-- Plugin: JQuery daterangepicker  -->

<!-- Plugin: JQuery select2 -->
<script type="text/javascript" src="<?= base_url("assets") ?>/vendors/select2/select2.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url("assets") ?>/vendors/select2/select2.min.css" />
<!-- Plugin: JQuery daterangepicker  -->

<!-- inject:css -->
<link rel="stylesheet" href="<?= base_url("assets") ?>/fonts/feather-font/css/iconfont.css">
<link rel="stylesheet" href="<?= base_url("assets") ?>/vendors/flag-icon-css/css/flag-icon.min.css">
<!-- endinject -->

<!-- Layout styles -->
<link rel="stylesheet" href="<?= base_url("assets") ?>/css/demo1/style.css">
<!-- End layout styles -->

<link rel="shortcut icon" href="<?= base_url("assets") ?>/images/favicon.png" />

<link rel="stylesheet" href="<?= base_url("assets") ?>/css/custom.min.css">

<?php switch (explode(base_url(), current_url())[1]):
	case 'dashboard': ?>
		<?php
		if ($this->session->userdata('first_user')) :
		?>
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intro.js/7.2.0/introjs.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
			<script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/7.2.0/intro.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

			<script>
				function app_tour() {
					introJs().setOptions({
						steps: [{
								title: "Welcome Abord!",
								intro: "Take a tour to your Dashboard!"
							},
							{
								element: document.querySelector('.intro__profile'),
								intro: "This is where you'll see the status of your profile. Don't forget to make it upto 100%."
							},
							{
								element: document.querySelector('.intro__days'),
								intro: "This is where you'll get to know your attendace and performance at a glance."
							},
							{
								element: document.querySelector('.intro__leaves'),
								intro: "This is where you'll get to know who's form you team or from Company are on leave."
							},
							{
								element: document.querySelector('.intro__feed'),
								intro: "This is the common announcements board. Announcements can either be made by HR and Admin."
							},
							{
								element: document.querySelector('.intro__events'),
								intro: "This is where you'll get to know the intra-premises events happening in our office."
							},
							{
								element: document.querySelector('.intro__holidays'),
								intro: "This is where you'll get to know the upcoming holidays."
							},
							{
								title: "That's it for now!",
								intro: "I'll leave it on to you to explore this dashboard more."
							},
						]
					}).start();
				}
				$(window).ready(() => {
					app_tour();
				})
				$("#startTour").on("click", () => {
					app_tour();
				})
			</script>
		<?php endif ?>
		<?php break; ?>

<?php endswitch ?>
