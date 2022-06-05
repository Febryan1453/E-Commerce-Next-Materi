<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>{{$title ?? ''}}</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{url('front/icon/idn.png')}}" type="image/x-icon" />

	<!-- Fonts and icons -->
	<script src="{{asset('atlantis/assets/js/plugin/webfont/webfont.min.js')}}"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Lato:300,400,700,900"]
			},
			custom: {
				"families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
				urls: ['{{asset("atlantis/assets/css/fonts.min.css")}}']
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<style>
		.input-fixed {
			width: 290px !important;
		}

		:root {
			--line-border-fill: #3498db;
			--line-border-empty: #e0e0e0;
		}

		.progress-container {
			display: flex;
			justify-content: space-between;
			position: relative;
			margin-bottom: 30px;
			max-width: 100%;
			width: 350px;
		}

		.progress-container::after {
			content: '';
			background-color: var(--line-border-empty);
			position: absolute;
			top: 50%;
			left: 0;
			transform: translateY(-50%);
			height: 4px;
			width: 100%;
			z-index: -1;
		}

		.progress {
			background-color: var(--line-border-fill);
			position: absolute;
			top: 50%;
			left: 0;
			transform: translateY(-50%);
			height: 4px;
			width: 0%;
			z-index: -1;
			transition: 0.4s ease;
		}

		.circle {
			background-color: #fff;
			color: #999;
			border-radius: 50%;
			height: 30px;
			width: 30px;
			display: flex;
			align-items: center;
			justify-content: center;
			border: 3px solid var(--line-border-empty);
			transition: 0.4s ease;
		}

		.circle.active {
			border-color: var(--line-border-fill);
		}
	</style>

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{asset('atlantis/assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('atlantis/assets/css/atlantis.min.css')}}">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{asset('atlantis/assets/css/demo.css')}}">
</head>

<body>
	<div class="wrapper">

		@include('user.header')

		@include('user.sidebar')

		<div class="main-panel">

			@yield('content')

			@include('user.footer')

		</div>

	</div>
	<!--   Core JS Files   -->
	<script src="{{asset('atlantis/assets/js/core/jquery.3.2.1.min.js')}}"></script>
	<script src="{{asset('atlantis/assets/js/core/popper.min.js')}}"></script>
	<script src="{{asset('atlantis/assets/js/core/bootstrap.min.js')}}"></script>

	<!-- jQuery UI -->
	<script src="{{asset('atlantis/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
	<script src="{{asset('atlantis/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>

	<!-- jQuery Scrollbar -->
	<script src="{{asset('atlantis/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>


	<!-- Chart JS -->
	<script src="{{asset('atlantis/assets/js/plugin/chart.js/chart.min.js')}}"></script>

	<!-- jQuery Sparkline -->
	<script src="{{asset('atlantis/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

	<!-- Chart Circle -->
	<script src="{{asset('atlantis/assets/js/plugin/chart-circle/circles.min.js')}}"></script>

	<!-- Datatables -->
	<script src="{{asset('atlantis/assets/js/plugin/datatables/datatables.min.js')}}"></script>

	<!-- Bootstrap Notify -->
	<!-- <script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script> -->

	<!-- jQuery Vector Maps -->
	<script src="{{asset('atlantis/assets/js/plugin/jqvmap/jquery.vmap.min.js')}}"></script>
	<script src="{{asset('atlantis/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js')}}"></script>

	<!-- Sweet Alert -->
	<script src="{{asset('atlantis/assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>

	<!-- Atlantis JS -->
	<script src="{{asset('atlantis/assets/js/atlantis.min.js')}}"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="{{asset('atlantis/assets/js/setting-demo.js')}}"></script>
	<script src="{{asset('atlantis/assets/js/demo.js')}}"></script>
	<script>
		Circles.create({
			id: 'circles-1',
			radius: 45,
			value: 60,
			maxValue: 100,
			width: 7,
			text: 5,
			colors: ['#f1f1f1', '#FF9E27'],
			duration: 400,
			wrpClass: 'circles-wrp',
			textClass: 'circles-text',
			styleWrapper: true,
			styleText: true
		})

		Circles.create({
			id: 'circles-2',
			radius: 45,
			value: 70,
			maxValue: 100,
			width: 7,
			text: 36,
			colors: ['#f1f1f1', '#2BB930'],
			duration: 400,
			wrpClass: 'circles-wrp',
			textClass: 'circles-text',
			styleWrapper: true,
			styleText: true
		})

		Circles.create({
			id: 'circles-3',
			radius: 45,
			value: 40,
			maxValue: 100,
			width: 7,
			text: 12,
			colors: ['#f1f1f1', '#F25961'],
			duration: 400,
			wrpClass: 'circles-wrp',
			textClass: 'circles-text',
			styleWrapper: true,
			styleText: true
		})

		var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

		var mytotalIncomeChart = new Chart(totalIncomeChart, {
			type: 'bar',
			data: {
				labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
				datasets: [{
					label: "Total Income",
					backgroundColor: '#ff9e27',
					borderColor: 'rgb(23, 125, 255)',
					data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
				}],
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				legend: {
					display: false,
				},
				scales: {
					yAxes: [{
						ticks: {
							display: false //this will remove only the label
						},
						gridLines: {
							drawBorder: false,
							display: false
						}
					}],
					xAxes: [{
						gridLines: {
							drawBorder: false,
							display: false
						}
					}]
				},
			}
		});

		$('#lineChart').sparkline([105, 103, 123, 100, 95, 105, 115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: '#ffa534',
			fillColor: 'rgba(255, 165, 52, .14)'
		});
	</script>

	<script>
		$(function() {
			bsCustomFileInput.init();
		});

		$("#file-upload").change(function() {
			var i = $(this).prev('label').clone();
			var file = $('#file-upload')[0].files[0].name;
			$(this).prev('label').text(file);
		});

		$('#ModalEdit').on('show.bs.modal', function(event) {
			var button = $(event.relatedTarget)
			var id = button.data('id')
			var name = button.data('nama_produk')
			var kategori = button.data('kategori_id')
			var harga = button.data('harga')
			var desc = button.data('berat')
			var image = button.data('img')
			var cate_id = button.data('status')

			var modal = $(this)
			modal.find('.modal-body #id').val(id)
			modal.find('.modal-body #nama_produk').val(name)
			modal.find('.modal-body #kategori_id').val(kategori)
			modal.find('.modal-body #harga').val(harga)
			modal.find('.modal-body #berat').val(desc)
			modal.find('.modal-body #img').attr("src", "storage/" + image)
			modal.find('.modal-body #status').val(cate_id)
		});

		$('#DeleteKategori').on('show.bs.modal', function(event) {
			var button = $(event.relatedTarget)
			var id = button.data('id')
			var nama_kategori = button.data('nama_kategori')

			var modal = $(this)
			modal.find('.modal-body #id').val(id)
			modal.find('.modal-body #nama_kategori').val(nama_kategori)
		});

		$('#EditKategori').on('show.bs.modal', function(event) {
			var button = $(event.relatedTarget)
			var id = button.data('id')
			var nama_kategori = button.data('nama_kategori')

			var modal = $(this)
			modal.find('.modal-body #id').val(id)
			modal.find('.modal-body #nama_kategori').val(nama_kategori)
		});
	</script>
</body>

</html>