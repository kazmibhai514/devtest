

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="shortcut icon" href="<?= base_url() ?>assetsAdmin/img/<?= getCol("options","option_title","logo",'value') ?>" />
	<title><?= getCol("options","option_title","title",'value') ?></title>

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

	<!-- Common CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>assetsAdmin/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assetsAdmin/fonts/icomoon/icomoon.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assetsAdmin/css/main.css" />

	<!-- Other CSS includes plugins - Cleanedup unnecessary CSS -->
	<!-- Chartist css -->
	<link href="<?= base_url() ?>assetsAdmin/vendor/chartist/css/chartist.min.css" rel="stylesheet" />
	<link href="<?= base_url() ?>assetsAdmin/vendor/chartist/css/chartist-custom.css" rel="stylesheet" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assetsAdmin/css/select2.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assetsAdmin/vendor/datatables/dataTables.bs4.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assetsAdmin/vendor/datatables/dataTables.bs4-custom.css" />

		<link rel="stylesheet" href="<?= base_url() ?>assetsAdmin/vendor/calendar/css/fullcalendar.min.css" />
		<link rel="stylesheet" href="<?= base_url() ?>assetsAdmin/vendor/calendar/css/custom-calendar.css" />
		   <link rel="stylesheet" href="<?= base_url() ?>assets/css/sweetalert2.min.css">
		       <link rel="stylesheet" href="<?= base_url() ?>assets/css/countrySelect.css">
	<!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet"> -->
	<style type="text/css">
		.card-body
		{
			overflow-x: scroll;
		}
		#extraTitle
		{
			color: white !important;
		}
		.iconsize
		{
			font-size: 50px;
		}
		.side-nav .unifyMenu a
		{
			background: black;
			color: #FFC44F;
			
		}
		.btn-primary{
			background: #FFC44F;
		}
		.profile-name
		{
			color: white;
		}
		.btn-primary:hover{
			background: black;
		}
		.card{
			border:solid 1px black; 
		}
		.country-select .flag{
  width:20px;
  height:15px;
  -webkit-box-shadow:0px 0px 1px 0px #888;
  box-shadow:0px 0px 1px 0px #888;
  background-image:url("<?= base_url() ?>assets/img/flags.png");
  background-repeat:no-repeat;
  background-color:#dbdbdb;
  background-position:20px 0
}
@media only screen and (-webkit-min-device-pixel-ratio: 2),
only screen and (min--moz-device-pixel-ratio: 2),
only screen and (min-device-pixel-ratio: 2),
only screen and (min-resolution: 192dpi),
only screen and (min-resolution: 2dppx){
  .country-select .flag{
    background-image:url("<?= base_url() ?>assets/img/flags@2x.png")
  }
}
.country-select
{
  width: calc(100% - 50px);
}
.country-list
{
	z-index:100 !important;
}
.btn-primary{
	color:black;
}

	</style>

</head>