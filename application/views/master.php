<!DOCTYPE html>
<html lang='en'>
	<head>
		<meta charset='utf-8'>
		<meta http-equiv='X-UA-Compatible' content='IE=edge'>
		<meta name='viewport' content='width=device-width, initial-scale=1'>
		<title><?=$this->e($title)?></title>
		<link rel='icon' type='image/jpeg' href="<?=base_url('resources/img/ico.jpg')?>"/>
		<link href="<?= base_url('resources/bootstrap/css/bootstrap.min.css')?>" rel='stylesheet'>
		<link href="<?= base_url('resources/font-awesome/css/font-awesome.min.css')?>" rel='stylesheet'>
		<link href="<?= base_url('resources/toastr/toastr.min.css')?>" rel='stylesheet'>
		<link href="<?= base_url('resources/jquery-ui/jquery-ui.min.css')?>" rel='stylesheet'>
		<link href="<?= base_url('resources/smartmenus/addons/bootstrap/jquery.smartmenus.bootstrap.css')?>" rel='stylesheet' type='text/css'/>
		<link href="<?= base_url('resources/master.css')?>" rel='stylesheet'>
		<?=$this->section('extra_style')?>
	</head>
	<body>
		<?$this->insert('partials::navbar')?>
		<div class = 'container-fluid'>
			<div class = 'row hidden-xs'>
				<div class = 'col-xs-6 col-sm-3 col-md-3 col-lg-3'>
					<img src="<?=base_url('/resources/img/logoSEP.png')?>" class='img-responsive'>
				</div>
				<div class='col-sm-6 col-md-6 col-lg-6 text-center'>
					<strong><font size = 3 face = 'Comic Sans MS' color = 'gray' >USEBEQ</font></strong></br>
					<strong><font size = 2 face = 'Comic Sans MS' color = 'gray' >DIRECCIÓN DE TECNOLOGÍAS DE LA INFORMACIÓN Y LA COMUNICACIÓN</font></strong></br>
					<strong><font size = 2 face = 'Comic Sans MS' color = 'gray' >SISTEMA DE ORDENES DE SERVICIO TÉCNICO</font></strong>
				</div>
				<div class = 'col-xs-6 col-sm-3 col-md-3 col-lg-3'>
					<img src="<?=base_url('/resources/img/usebeq.png')?>" class='img-responsive pull-right'>
				</div>
			</div>
			<?=$this->section('page')?>
		</div>
	</body>
	<footer class='footer-light-3 hidden-xs'>
		<div class='container'>
			<div class='row'>
				<div class='col-sm-6'>
					<p>Unidad de Servicios Para la Educación Básica en el Estado de Querétaro.</p>
					<p>Av. del Magisterio No. 1000 Col. Colinas del Cimatario Santiago de Querétaro, Querétaro, México C.P. 76090</p>
					<p><strong>Teléfono:</strong> +52 442 238 6000</p>
				</div>
			</div>
		</div>
		<div class='footer-bottom'>
			<div class='container'>
				<div class='row'>
					<div class='col-sm-8 col-sm-offset-2 text-center'>
						<ul class='list-inline footer-social'>
							<li><a href='https://www.facebook.com/usebeqoficial' target='_blank' class='social-icon si-dark si-gray-round si-colored-facebook'><i class='fa fa-facebook'></i></a></li>
							<li><a href='https://twitter.com/usebeqoficial' target='_blank' class='social-icon si-dark si-gray-round si-colored-twitter'><i class='fa fa-twitter'></i></a></li>
						</ul>
						<p>Copyright &copy; 2017. All right reserved.</p>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<script src="<?= base_url('resources/jquery.min.js') ?>"></script>
	<script src="<?= base_url('resources/bootstrap/js/bootstrap.min.js') ?>"></script>
	<script src="<?= base_url('resources/toastr/toastr.min.js') ?>"></script>
	<script src="<?= base_url('resources/jquery-ui/jquery-ui.min.js') ?>"></script>
	<script src="<?= base_url('resources/smartmenus/jquery.smartmenus.min.js')?>"></script>
	<script src="<?= base_url('resources/smartmenus/addons/bootstrap/jquery.smartmenus.bootstrap.min.js')?>"></script>
	<script src="<?= base_url('resources/master.js') ?>"></script>
	<?=$this->section('extra_js')?>
</html>