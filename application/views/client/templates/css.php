	<!-- Google font -->
	<script src="<?= base_url('assets/e-shop/js/jquery.min.js');?>"></script>
	<script src="<?= base_url('assets/js/customProducts.js');?>"></script>
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">
	<script>
		function sihiy(searchvalue) {
		$("#search").val(searchvalue);
		$("#listsearch").empty();
	}
	</script>
	
	<script src="<?= base_url('assets/sweet/sweetalert2.all.js');?>"></script>
	<script>
	function logout(){
	Swal({
				  title: 'Apakah anda yakin?',
				  text: 'Apakah anda yakin akan logout?',
				  type: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Ya, saya ingin Logout!'
				}).then((result) => {
				  if (result.value) {
					Swal(
					  'Berhasil!',
					  'Anda Berhasil Logout.',
					  'success'
					),window.location.href = "<?= site_url('home/logout'); ?>";
				}
				});
	}
	</script>
	

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="<?= base_url('assets/e-shop/css/bootstrap.min.css'); ?>" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="<?= base_url('assets/e-shop/css/slick.css');?>" />
	<link type="text/css" rel="stylesheet" href="<?= base_url('assets/e-shop/css/slick-theme.css');?>" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="<?= base_url('assets/e-shop/css/nouislider.min.css');?>" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="<?= base_url('assets/e-shop/css/font-awesome.min.css');?>">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="<?= base_url('assets/e-shop/css/style.css');?>" />
	
	

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>