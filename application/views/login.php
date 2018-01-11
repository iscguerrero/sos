<!DOCTYPE html>
	<html lang='es'>
	<head>
		<meta charset='utf-8'>
		<meta http-equiv='X-UA-Compatible' content='IE=edge'>
		<meta name='viewport' content='width=device-width, initial-scale=1'>
		<title>SOS|USEBEQ</title>
		<link rel='icon' type='image/jpeg' href="<?=base_url('resources/img/ico.jpg')?>"/>
		<link href="<?= base_url('resources/bootstrap/css/bootstrap.min.css')?>" rel='stylesheet'>
		<link href="<?= base_url('resources/font-awesome/css/font-awesome.min.css')?>" rel='stylesheet'>
		<link href="<?= base_url('resources/toastr/toastr.min.css')?>" rel='stylesheet'>
		<link href="<?= base_url('resources/master.css')?>" rel='stylesheet'>
	</head>
	<body>
		<div class = 'container'>
			<div class = 'row'>
				<div class = 'col-xs-6 col-sm-3 col-md-3 col-lg-3'>
					<img src="<?=base_url('/resources/img/logoSEP.png')?>" class='img-responsive'>
				</div>
				<div class='col-sm-6 col-md-6 col-lg-6 hidden-xs text-center'>
					<strong><font size = 4 face = 'Comic Sans MS' color = 'gray' >USEBEQ</font></strong></br>
					<strong><font size = 3 face = 'Comic Sans MS' color = 'gray' >DIRECCIÓN DE TECNOLOGÍAS DE LA INFORMACIÓN Y LA COMUNICACIÓN</font></strong></br>
					<strong><font size = 3 face = 'Comic Sans MS' color = 'gray' >SISTEMA DE ORDENES DE SERVICIO TÉCNICO</font></strong>
				</div>
				<div class = 'col-xs-6 col-sm-3 col-md-3 col-lg-3'>
					<img src="<?=base_url('/resources/img/usebeq.png')?>" class='img-responsive pull-right'>
				</div>
			</div>
			<div class='row'>
				<div class='col-xs-12 col-sm-offset-4 col-sm-4 col-md-offset-4 col-md-4 col-lg-offset-4 col-lg-4'>
					<div class='panel panel-primary'>
						<form id='form_login'>
							<div class='panel-body'>
								<div class='form-group'>
									<label for='usuario'><i class = 'fa fa-user'></i> Usuario</label>
									<input type='text' class='form-control input-sm' id='usuario' name='usuario' autofocus>
								</div>
								<div class='form-group'>
									<label for='contrasenia'><i class = 'fa fa-key'></i> Contraseña</label>
									<input type='password' class='form-control input-sm' id='contrasenia' name = 'contrasenia'>
								</div>
							</div>
							<div class='panel-footer'>
								<div class='row'>
									<div class='col-xs-12'>
										<button type='submit' class='btn btn-sm btn-outline btn-block btn-primary'>Entrar <i class = 'fa fa-sign-in'></i></button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
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
	<script src="<?= base_url('resources/jquery-ui/jquery-ui.min.js') ?>"></script>
	<script src="<?= base_url('resources/toastr/toastr.min.js') ?>"></script>
	<script src="<?= base_url('resources/master.js') ?>"></script>
	<script type='text/javascript'>
		$(document).ready(function(){
			$('#form_login').submit(function(e){
				e.preventDefault();
				var str = $('#form_login').serialize();
				$.ajax({
					type: 'POST',
					url: 'login/process_login',
					data: str,
					dataType: 'json',
					success: function(response){
						if(response.flag==false){
							toastr.clear();
							showControllerMessage(response);
						}else{
							$(location).attr('href', response.location);
						}
					},
					error:function(){
						toastr.error('ERROR NO IDENTIFICADO', 'Mensaje del sistema', {timeOut: 5000});
					}
				});
			});
		});
	</script>

</html>