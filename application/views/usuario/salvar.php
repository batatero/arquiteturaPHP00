<?php 
	//verifica se alguma msg de erro foi setada
	$msg = $this->session->flashdata('msg');
	if( isset($msg) ) {
		echo $msg;
	}
?>
<html>
	<head>
		<title>Cadastrar usaurio</title>
		<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/price_format.js')?>"></script>
		
		<script type="text/javascript">

		$(document).ready(function(){
			$('#usSalario').priceFormat({
			    prefix: '',
			    centsSeparator: '.',
			    thousandsSeparator: ''
			});
		});
		
		</script>
	</head>
	<body>
		<form  action="<?php echo base_url('ctusuario/persistirUsuario')?>" method="post">
			<table>
				<tr>
					<td colspan="2"><a href="<?php echo base_url('ctusuario/somaSalarioFuncionarios')?>">Calculo dos Salarios</a></td>
				</tr>
				<tr>
					<td colspan="2">Cadastrar Usuario:</td>
				</tr>
				<tr>
					<td>nome:</td>
					<td><input type="text" name="usNome"></td>
				</tr>
				<tr>
					<td>salario:</td>
					<td><input id="usSalario" type="text" name="usSalario"></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit"></td>
				</tr>
			</table>
		</form>
	</body>
</html>