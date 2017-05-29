<?php 

namespace Olive\helpers;

class Utils 
{
	public static function getStatus($status)
	{
		switch ($status) {
			case 'solicitud':
				return 'Solicitud en trámite';
            case 'verificacion':
            	return 'Verificación de documentos';
            case 'en_tramite':
            	return 'En trámite';
            case 'no_localizado':
            	return 'No localizado';
            case 'oficinas':
            	return 'Oficinas';
            case 'enviado':
            	return 'Enviado';
            case 'detenido':
            	return 'Detenido / Reembolso';
            case 'no_procede':
            	return 'No procede';
            case 'concluido':
            	return 'Concluido';
		}
	}
}











