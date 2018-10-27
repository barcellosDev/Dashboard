<?php
function format_acao($acao, $status, $id_os, $login_id) 
{
	switch ($status) 
	{
		case 'Ativo':
			return $acao = '<div class="btn-group">
					  <a class="btn btn-primary btn-sm" href="../lib/helpers/atender.php?id='.$login_id.'&id_chamado='.$id_os.'&status='.$status.'">
					    <i class="far fa-play-circle"></i>&nbspAtender
					  </a>
					  <button type="button" class="btn btn-sm btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    <span class="sr-only">Toggle Dropdown</span>
					  </button>
					  <div class="dropdown-menu">
					    <a class="dropdown-item" href="detalhes.php?id='.$login_id.'&id_chamado='.$id_os.'&status='.$status.'">Detalhes chamado</a>
					  </div>
					</div>';
			break;
		
		case 'Em-andamento':
			return $acao = '<div class="btn-group">
					  <a class="btn btn-success btn-sm" href="../lib/helpers/atender.php?id='.$login_id.'&id_chamado='.$id_os.'&status='.$status.'">
					    <i class="far fa-play-circle"></i>&nbspFinalizar
					  </a>
					  <button type="button" class="btn btn-sm btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    <span class="sr-only">Toggle Dropdown</span>
					  </button>
					  <div class="dropdown-menu">
					    <a class="dropdown-item" href="detalhes.php?id='.$login_id.'&id_chamado='.$id_os.'&status='.$status.'">Detalhes chamado</a>
					  </div>
					</div>';
			break;

		case 'Finalizado':
			return $acao = '<a class="btn btn-info btn-sm" href="detalhes.php?id='.$login_id.'&id_chamado='.$id_os.'&status='.$status.'" role="button"><i class="fas fa-info-circle"></i> Ver detalhes</a>';
			break;

		case 'Parado':
			return $acao = '<div class="btn-group">
					  <button class="btn btn-primary btn-sm" type="button" disabled>
					    <i class="far fa-play-circle"></i>&nbspAtender
					  </button>
					  <button type="button" class="btn btn-sm btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    <span class="sr-only">Toggle Dropdown</span>
					  </button>
					  <div class="dropdown-menu">
					    <a class="dropdown-item" href="detalhes.php?id='.$login_id.'&id_chamado='.$id_os.'">Detalhes chamado</a>
					  </div>
					</div>';
			break;
	}
}
?>