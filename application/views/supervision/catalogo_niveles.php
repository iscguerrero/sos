<?$this->layout('master', ['title'=>'Catálogo de Niveles'])?>
<?$this->start('extra_style')?>
	<link rel = 'stylesheet' href = "<?=base_url('resources/bootstrap-table/bootstrap-table.min.css')?>">
<?$this->stop()?>
<?$this->start('page')?>
	<div id = 'toolbar' class = 'btn-group'>
		<button type='button' class='btn btn-sm btn-outline btn-primary' data-toggle='modal' data-target='#modal_crud_sequence' onclick="reset_form($('#form_sequence'))"><i class = 'fa fa-plus-square'></i> Alta</button>
		<button type='button' class='btn btn-sm btn-outline btn-warning' data-toggle='modal' data-target='#modal_crud_sequence' id = 'btn_edit' disabled><i class = 'fa fa-edit'></i> Editar</button>
	</div>
	<!-- Modal para alta de nuevo prefijo -->
	<div class='modal fade' id='modal_crud_sequence' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
		<div class='modal-dialog modal-sm' role='document'>
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
					<h4 class='modal-title' id='myModalLabel'><i class = 'fa fa-edit'></i> <strong>Niveles</strong></h4>
				</div>
				<form id = 'form_sequence'>
					<input type='hidden' name='id' id='id'></input>
					<div class='modal-body'>
						<div class = 'form-group'>
							<label for = 'nivel'><i class = 'fa fa-edit'></i> Nivel</label>
							<input type='text' class = 'form-control input-sm' name='nivel' id='nivel'>
						</div>
						<div class = 'form-group'>
							<label for = 'e_a'><i class = 'fa fa-edit'></i> E-A</label>
							<select class = 'form-control input-sm' name='e_a' id='e_a'>
								<option value = 'A'>Administrativo</option>
								<option value = 'E'>Educativo</option>
							</select>
						</div>
						<div class = 'form-group'>
							<label for = 'nivel_dos'><i class = 'fa fa-edit'></i> Tipo</label>
							<input type='text' class = 'form-control input-sm' name='nivel_dos' id='nivel_dos'>
						</div>
					</div>
					<div class='modal-footer'>
						<button type='button' class='btn btn-sm btn-outline btn-default' data-dismiss='modal'><i class='fa fa-times-circle'></i> Cancelar</button>
						<button type='submit' class='btn btn-sm btn-outline btn-primary'><i class='fa fa-floppy-o'></i> Guardar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class = 'row'>
		<div class = 'col-xs-12'>
			<div class = 'panel panel-default'>
				<div class = 'panel-heading text-center'><strong>Catálogo de Niveles</strong></div>
				<div class = 'panel-body'>
					<div class = 'row'>
						<div class = 'col-xs-12 col-sm-12 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6'>
							<div class = 'table-responsive'>
								<table id = 'tabla_reporte'></table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?$this->stop()?>
<?$this->start('extra_js')?>
	<script src="<?= base_url('resources/bootstrap-table/bootstrap-table.min.js') ?>"></script>
	<script src="<?= base_url('resources/bootstrap-table/locale/bootstrap-table-es-MX.min.js') ?>"></script>
	<script type='text/javascript'>
		$(document).ready(function(){

			// Funcion para limpiar un formulario al salir
				$('#modal_crud_sequence').on('hidden.bs.modal', function (e){
					reset_form($('#form_sequence'));
				})
			// Obtener el data del modelo
				function getRows(){
					var rows = [];
					$.ajax({
						type: 'POST',
						url: 'supervision/catalogo_niveles/list_rows',
						data: {},
						dataType: 'json',
						async: false,
						beforeSend:function(){
							toastr.info('Cargando reporte, espera por favor...', 'Mensaje del sistema');
						},
						success: function(response) {
							rows = response.rows;
							toastr.clear();
							$('#btn_edit').attr('disabled', true);
						},
						error:function(){
							toastr.error('ERROR NO IDENTIFICADO', 'Mensaje del sistema', {timeOut: 5000});
						}
					});
					return rows;
				};
			// Configurar el comportamiento de la tabla del reporte
				$('#tabla_reporte').bootstrapTable({
					data: getRows(),
					toolbar: '#toolbar',
					pagination: true,
					sidePagination: 'client',
					pageList: [10, 25, 50],
					locale: 'es-MX',
					classes: 'table table-hover table-condensed',
					striped: true,
					search: true,
					iconSize: 'btn-sm',
					clickToSelect: true,
					showRefresh: true,
					showColumns: false,
					showFooter: false,
					columns: [
						{radio: true},
						{field: 'id', title: 'ID', align: 'center'},
						{field: 'nivel', title: 'NIVEL'},
						{field: 'e_a', title: 'E-A', align: 'center'},
						{field: 'nivel_dos', title: 'NIVEL'},
					],
					onClickRow: function(row, $element, field){
						$('#btn_edit').attr('disabled', false);
						$('#id').val(row.id);
						$('#nivel').val(row.nivel);
						$('#e_a').val(row.e_a);
						$('#nivel_dos').val(row.nivel_dos);
					},
					onCheck: function(row, $element){
						$('#btn_edit').attr('disabled', false);
						$('#id').val(row.id);
						$('#nivel').val(row.nivel);
						$('#e_a').val(row.e_a);
						$('#nivel_dos').val(row.nivel_dos);
					}
				});
			// Alta nuevo registro
				$('#form_sequence').submit(function(e){
					e.preventDefault();
					var str = $('#form_sequence').serialize();
					$.ajax({
						type: 'POST',
						url: 'supervision/catalogo_niveles/row',
						data: str,
						dataType: 'json',
						beforeSend:function(){
							toastr.info('Generando registro, espera por favor...', 'Mensaje del sistema');
						},
						success: function(response) {
							toastr.clear();
							showControllerMessage(response);
							if(response.flag==true){
								$('#modal_crud_sequence').modal('hide');
								$('#tabla_reporte').bootstrapTable('load', getRows());
							}
						},
						error:function(){
							toastr.error('ERROR NO IDENTIFICADO', 'Mensaje del sistema', {timeOut: 5000});
						}
					});
				});
		});
	</script>
<?$this->stop()?>