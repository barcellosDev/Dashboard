<?php
function format_ativo($status)
{
	switch ($status) 
	{
		case 'Ativo':
			return $status = '<button type="button" class="btn btn-success btn-sm"><i class="far fa-circle"></i> Ativo</button>';
			break;
		
		case 'Em-andamento':
			return $status = '<button type="button" class="btn btn-dark btn-sm"><i class="far fa-circle"></i> Em andamento</button>';
			break;

		case 'Finalizado':
			return $status = '<button type="button" class="btn btn-success btn-sm"><i class="far fa-check-circle"></i> Atendido</button>';
			break;

		case 'Parado':
			return $status = '<button type="button" class="btn btn-danger btn-sm"><i class="far fa-times-circle"></i> Parado</button>';
			break;
	}
}
?>