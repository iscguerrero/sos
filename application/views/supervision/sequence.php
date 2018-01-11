<?$this->layout('master', ['title'=>'Prefijos de OS'])?>
<?$this->start('extra_style')?>
	<link rel = 'stylesheet' href = "<?=base_url('resources/bootstrap-table/bootstrap-table.min.css')?>">
<?$this->stop()?>
<?$this->start('page')?>
	<div id = 'toolbar'>
		<button type='button' class='btn btn-sm btn-outline btn-primary' data-toggle='modal' data-target='#modal_crud_sequence'><i class = 'fa fa-plus-square'></i> Alta</button>
	</div>
	<!-- Modal para alta de nuevo prefijo -->
	<div class='modal fade' id='modal_crud_sequence' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
		<div class='modal-dialog modal-sm' role='document'>
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
					<h4 class='modal-title' id='myModalLabel'><i class = 'fa fa-edit'></i> <strong>Secuencias</strong></h4>
				</div>
				<?= form_open('supervision/sequence/add_row', array('id'=>'form_sequence')); ?>
					<div class='modal-body'>
						<div class = 'form-group'>
							<label for = 'seq_name'><i class = 'fa fa-edit'></i> Nombre</label>
							<input type='text' class = 'form-control input-sm' name='seq_name' id='seq_name'>
						</div>
						<div class = 'form-group'>
							<label for = 'seq_group'><i class = 'fa fa-edit'></i> Grupo</label>
							<input type='text' class = 'form-control input-sm' name='seq_group' id='seq_group'>
						</div>
						<div class = 'form-group'>
							<label for = 'seq_val'><i class = 'fa fa-edit'></i> Consecutivo</label>
							<input type='text' class = 'form-control input-sm' name='seq_val' id='seq_val' value = '0' readonly='true'>
						</div>
						<div class = 'form-group'>
							<label for = 'type_seq'><i class = 'fa fa-edit'></i> Tipo</label>
							<select class='form-control input-sm' name='type_seq' id='type_seq'>
								<option value = 'I'>Interna</option>
								<option value = 'E'>Externa</option>
							</select>
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
				<div class = 'panel-heading text-center'><strong>Prefijos de OS</strong></div>
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
					$('#form_sequence')[0].reset();
				})
			// Obtener el data del modelo
				function getRows(){
					var rows = [];
					$.ajax({
						type: 'POST',
						url: 'supervision/sequence/list_rows',
						data: {},
						dataType: 'json',
						async: false,
						beforeSend:function(){
							toastr.info('Cargando reporte, espera por favor...', 'Mensaje del sistema');
						},
						success: function(response) {
							rows = response.rows;
							toastr.clear();
						},
						error:function(){
							toastr.error('ERROR NO IDENTIFICADO', 'Mensaje del sistema', {timeOut: 5000});
						}
					});
					return rows;
				};
			// Alta nuevo registro
				$('#form_sequence').submit(function(e){
					e.preventDefault();
					var str = $('#form_sequence').serialize();
					$.ajax({
						type: 'POST',
						url: $('#form_sequence').attr('action'),
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
						{field: 'seq_name', title: 'NOMBRE', align: 'center'},
						{field: 'seq_group', title: 'GRUPO', align: 'center'},
						{field: 'seq_val', title: 'CONSECUTIVO', align: 'center'},
						{field: 'type_seq', title: 'TIPO', align: 'center'},
					],
					onClickRow: function(row, $element, field){
						//num_orden = row.num_orden;
					},
					onCheck: function(row, $element){
					}
				});
		});
	</script>
<?$this->stop()?>