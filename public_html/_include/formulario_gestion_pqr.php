<?php

require_once(_DIRLIB.'pqr/funciones_pqr.php');
require_once(_DIRLIB.'smarty/libs/Smarty.class.php');

/* PRIMERA PARTE DE LA GESTIÓN DE PQR - LISTADO DE SOLICITUDES */

										/** SOLICITUD DE ARCHIVOS REQUERIDOS **/

/* Incluye la clase de validaciones y de funciones */
require_once (_DIRCORE . 'Validacion.class.php');
require_once(_DIRCORE.'Funciones.class.php');
require_once(_DIRLIB.'pqr/Solicitante.class.php');
require_once(_DIRLIB.'pqr/Solicitud.class.php');
require_once(_DIRLIB.'pqr/Transaccion.class.php');

											/** VARIABLES GLOBALES **/
/* Hace disponible la conexión a la base de datos */
global $db;
									/** CONFIGURACION DEL FORMULARIO **/

/* Definición de la profundidad de los select de asunto y dependencia
 * Este valor se refleja en la cantidad de selects que quedan disponibles para
 * hacer la selección de cada uno de estos.
 * La profundidad máxima permitida es 5.*/

$asunto_profundidad			=	2;
$dependencia_profundidad	=	3;

									/** DECLARACIÓN E INICIALIZACIÓN DE VARIABLES **/

/* Arreglo que almacena los errores producidos */
$errores=array();

/* Arreglo que almacena el listado de documentos de la solicitud */
$documento=array();

/* Arreglo que almacena el historico de cambios */
$historico_cambios=array();

/* Variable que contiene la fecha y hora de la transacción */
$timestamp = date('Y-m-d H:i:s');

/* Variable que controla la continuidad de la transacción */
$continuar = 'ok';

/* Variable que almacena el mensaje de respuesta para el usuario */
$msg_respuesta = '';

/* Variable que controla el acceso de los usuarios a la página de gestion */
$usuario_registrado='no';

/* Validación de acceso para el usuario autenticado en el portal actualmente */

	/* Verifica si el existe un usuario autenticado en el portal */
	if(isset($_SESSION['info_usuario'])){

		/* Verifica si el usuario es administrador del sistema de PQR */
		if(esAdministradorPqr($_SESSION['info_usuario']['idusuario'])){
			$usuario_registrado='ok';
		}
		else{
			/* Si hay un usuario autenticado en el portal
			 * y no es administrador del sistema de PQR
			 * se verifica que sea parte de una dependencia */
			$sql_acceso = sprintf('SELECT dependencia_id
									FROM %s
									WHERE idusuario=%s',
									_TBL_PQR_REL_DEPENDENCIA_USUARIO,
									$_SESSION['info_usuario']['idusuario']);
			$resultado_acceso = $db->Execute($sql_acceso);
			if($resultado_acceso){
				if($resultado_acceso->NumRows()>0){
					$usuario_registrado='ok';
				}
			}
		}
	}

/* Define los nombres de los input para los select dependientes, para adicionar niveles al select
 * se deben adicionar en estos arreglos y en su arreglo correspondiente en el archivo de funciones
 * de javascript de la aplicación */

/* Define los nombres de los input para los select dependientes, para adicionar niveles al select
 * se deben adicionar en la variable de profundidad de cada uno y en los arreglos en el archivo de
 * funciones de javascript de la aplicación */

for($i=0;$i<$asunto_profundidad;$i++){
	$select_asunto_nombre[$i]		=	'asunto_n'.($i+1);
}

for($i=0;$i<$dependencia_profundidad;$i++){
	$select_dependencia_nombre[$i]	=	'dependencia_n'.($i+1);
}

/* Obtiene las opciones de la base de datos que se mostraran como selects en el formulario */
$select_tipo_solicitud	=	genera_arreglo_select('pqr_tipo','tipo_id','tipo_nombre');
$select_estado			=	genera_arreglo_select('pqr_estado','estado_id','estado_nombre');

/* incializacion de otras variables */

				/** RECUPERA LA INFORMACIÓN INGRESADA POR EL USUARIO **/

/* Obtiene el asunto seleccionado por el usuario */
$numero_selects=count($select_asunto_nombre);
$asunto=0;
while($asunto==0 && $numero_selects>0){
	$asunto=getVariable($select_asunto_nombre[$numero_selects-1],0);
	$numero_selects--;
}

/* Obtiene la dependencia seleccionado por el usuario */
$numero_selects=count($select_dependencia_nombre);
$dependencia=0;
while($dependencia==0 && $numero_selects>0){
	$dependencia=getVariable($select_dependencia_nombre[$numero_selects-1],0);
	$numero_selects--;
}

/* Calcula el identificador del usuario responsable de la dependencia */
$sql_consulta_responsable=sprintf(
	'SELECT idusuario FROM %s WHERE dependencia_id=%s and encargado=1',
	_TBL_PQR_REL_DEPENDENCIA_USUARIO, $dependencia);
$resultado_consulta_responsable=$db->Execute($sql_consulta_responsable);
if($resultado_consulta_responsable && $resultado_consulta_responsable->NumRows()==1){
	$usuario_id_1=$resultado_consulta_responsable->fields['idusuario'];
}
else{
	$usuario_id_1=0;
}

/* Obtiene la información ingresada del formulario y le quita las etiquetas html y php que tengan*/
$solicitud_id	=			getVariable('solicitud_id',0);
$estado			=			getVariable('estado',0);
$tipo_solicitud	=			getVariable('tipo_solicitud',0);
$fecha_limite	=			getVariable('fecha_limite',0);
$resumen		=			getVariable('resumen','');
$respuesta		=			getVariable('respuesta','');

/* Si no se definió una solicitud se devuelve el mensaje de error */
if($solicitud_id==0){
	$msg_error='<div style="text-align:justify;color:black;font-size:1.2em;font-weight:bold;">Para gestionar la solicitud por favor haga clic sobre el vínculo enviado a su correo electrónico</div>';
	return $msg_error;
}

				/** OBTIENE LA INFORMACIÓN DE LA SOLICITUD **/
/* Creaciónd de un objeto de la clase Solicitud para el id indicado por el usuario */
$solicitud=new Solicitud($solicitud_id);
$solicitante=new Solicitante($solicitud->getSolicitanteId());
$transaccion=new Transaccion($solicitud->transaccion[$solicitud->getTransaccionActual()]);

if(isset($_POST['enviar'])){
				/** CREA LA NUEVA TRANSACCION **/
	$transaccion->setEstadoId($estado);
	$transaccion->setTipoId($tipo_solicitud);
	$transaccion->setTipoPlazoTotal($fecha_limite);
	$transaccion->setResumen($resumen);
	$transaccion->setRespuesta($respuesta);
	$transaccion->setAsuntoId($asunto);
	$transaccion->setDependenciaId($dependencia);
	$transaccion->setUsuarioId1($usuario_id_1);
	$transaccion->setUsuarioId2($_SESSION['info_usuario']['idusuario']);

	if($transaccion->salvar()){
		if($transaccion->getEstadoId()==3){
			$email_solicitante=$solicitante->getEmail();
			if($email_solicitante!=''){
				$asunto_correo='Notificación de finalización del tramite de su solicitud';
				$mensaje_usuario='La solicitud que hizo en el sistema de PQR del sistema base de Micrositios Ltda.<br>' .
						' ya ha sido resuelta, puede consultar la respuesta en http://www.agencialogistica.mil.co';
				Funciones::microsmail($email_solicitante,$asunto_correo,$mensaje_usuario);
			}
		}
		if($transaccion->modificado_dependencia==true){
			/* Obtiene el correo del nuevo responsable */
				$sql_consulta_encargado=sprintf(
									'SELECT u.idusuario, u.email ' .
									'FROM %s r, %s u ' .
									'WHERE u.idusuario=r.idusuario and r.dependencia_id=%s and r.encargado=1',
									_TBL_PQR_REL_DEPENDENCIA_USUARIO,_TBLUSUARIO,$dependencia);
			/* Ejecuta la consulta */
				$resultado_consulta_encargado=$db->Execute($sql_consulta_encargado);
				if($resultado_consulta_encargado){
					if($resultado_consulta_encargado->NumRows()==1){
						$correo_encargado=$resultado_consulta_encargado->fields['email'];
						if($correo_encargado!=''){
							$link_gestion_solicitud	=	sprintf('<a href="%sindex.php?idcategoria=%s&solicitud_id=%s">click aquí</a>',_URL,_GESTION_PQR,$solicitud_id);
							$asunto_correo='Asignación de solicitud del sistema de Atención al Ciudadano de la CCCS';
							$mensaje_usuario='Se le ha asignado una solicitud del sistema de Atención al Ciudadano de la CCCS<br>' .
											'Para gestionar la solicitud haga '.$link_gestion_solicitud;
							Funciones::microsmail($correo_encargado,$asunto_correo,$mensaje_usuario);
						}
					}
				}
		}
	}

				/** ACTUALIZA LA INFORMACIÓN DE LA SOLICITUD **/
	unset($solicitud);
	unset($solicitante);
	unset($transaccion);

	$solicitud=new Solicitud($solicitud_id);
	$solicitante=new Solicitante($solicitud->getSolicitanteId());
	$transaccion=new Transaccion($solicitud->transaccion[$solicitud->getTransaccionActual()]);
}

				/** OBTIENE LA INFORMACIÓN DE LOS DOCUMENTOS DE LA SOLICITUD **/
/* Obtiene el arreglo de transacciones relacionadas a la solicitud */
$transacciones=$solicitud->getTransaccion();

/* Crea la sentencia que obtiene los nombres de los documentos */
$sql_consulta_documentos = sprintf(
	'SELECT transaccion_id, documento_nombre FROM %s WHERE transaccion_id in (SELECT transaccion_id FROM %s WHERE solicitud_id=%s)',
	_TBL_PQR_DOCUMENTO,_TBL_PQR_TRANSACCION,$solicitud->getId());

/* Ejecuta la consulta */
$resultado_consulta_documentos=$db->Execute($sql_consulta_documentos);

/* Verifica si existen resultados */
if($resultado_consulta_documentos){
	$contador=0;
	while(!$resultado_consulta_documentos->EOF){
		$documento[$contador]['ruta']=_URL._DIRRECURSOS_USER.'pqr/'.$solicitud_id.'/'.$resultado_consulta_documentos->fields['transaccion_id'].'/'.$resultado_consulta_documentos->fields['documento_nombre'];
		$documento[$contador]['documento_nombre']=$resultado_consulta_documentos->fields['documento_nombre'];
		$contador++;
		$resultado_consulta_documentos->MoveNext();
	}
}

			/** OBTIENE EL HISTORICO DE CAMBIOS **/

/* Cuenta el número de transacciones de la solicitud */
$numeroTransacciones=count($transacciones);
/* Verifica si existen por lo menos 2 transacciones */
if($numeroTransacciones>1){
$contador=0;
	/* Hace el ciclo de comparación de todas las transacciones */
	for($i=0;$i<$numeroTransacciones-1;$i++){
		/* Carga las transacciones que se compararán */
		$transaccion1=new Transaccion($transacciones[$i]);
		$transaccion2=new Transaccion($transacciones[$i+1]);

		/* compara los campos */
		if($transaccion1->getResumen()!=$transaccion2->getResumen()){
			$historico_cambios[$contador]['indice']=$contador+1;
			$historico_cambios[$contador]['nombre_campo']='Resumen';
			$historico_cambios[$contador]['valor_inicial']=$transaccion1->getResumen();
			$historico_cambios[$contador]['valor_final']=$transaccion2->getResumen();
			$historico_cambios[$contador]['usuario']='<a href="mailto:'.$transaccion2->getUsuarioNombre2().'">'.$transaccion2->getUsuarioId2().'</a>';
			$historico_cambios[$contador]['fecha']=$transaccion2->getFechaCreacion();
			$contador++;
		}
		if($transaccion1->getRespuesta()!=$transaccion2->getRespuesta()){
			$historico_cambios[$contador]['indice']=$contador+1;
			$historico_cambios[$contador]['nombre_campo']='Respuesta';
			$historico_cambios[$contador]['valor_inicial']=$transaccion1->getRespuesta();
			$historico_cambios[$contador]['valor_final']=$transaccion2->getRespuesta();
			$historico_cambios[$contador]['usuario']='<a href="mailto:'.$transaccion2->getUsuarioNombre2().'">'.$transaccion2->getUsuarioId2().'</a>';
			$historico_cambios[$contador]['fecha']=$transaccion2->getFechaCreacion();
			$contador++;
		}
		if($transaccion1->getAsuntoId()!=$transaccion2->getAsuntoId()){
			$historico_cambios[$contador]['indice']=$contador+1;
			$historico_cambios[$contador]['nombre_campo']='Asunto';
			$historico_cambios[$contador]['valor_inicial']=$transaccion1->getAsuntoName();
			$historico_cambios[$contador]['valor_final']=$transaccion2->getAsuntoName();
			$historico_cambios[$contador]['usuario']='<a href="mailto:'.$transaccion2->getUsuarioNombre2().'">'.$transaccion2->getUsuarioId2().'</a>';
			$historico_cambios[$contador]['fecha']=$transaccion2->getFechaCreacion();
			$contador++;
		}
		if($transaccion1->getEstadoId()!=$transaccion2->getEstadoId()){
			$historico_cambios[$contador]['indice']=$contador+1;
			$historico_cambios[$contador]['nombre_campo']='Estado';
			$historico_cambios[$contador]['valor_inicial']=$transaccion1->getEstadoName();
			$historico_cambios[$contador]['valor_final']=$transaccion2->getEstadoName();
			$historico_cambios[$contador]['usuario']='<a href="mailto:'.$transaccion2->getUsuarioNombre2().'">'.$transaccion2->getUsuarioId2().'</a>';
			$historico_cambios[$contador]['fecha']=$transaccion2->getFechaCreacion();
			$contador++;
		}
		if($transaccion1->getTipoId()!=$transaccion2->getTipoId()){
			$historico_cambios[$contador]['indice']=$contador+1;
			$historico_cambios[$contador]['nombre_campo']='Tipo';
			$historico_cambios[$contador]['valor_inicial']=$transaccion1->getTipoName();
			$historico_cambios[$contador]['valor_final']=$transaccion2->getTipoName();
			$historico_cambios[$contador]['usuario']='<a href="mailto:'.$transaccion2->getUsuarioNombre2().'">'.$transaccion2->getUsuarioId2().'</a>';
			$historico_cambios[$contador]['fecha']=$transaccion2->getFechaCreacion();
			$contador++;
		}
		if($transaccion1->getTipoPlazoTotal()!=$transaccion2->getTipoPlazoTotal()){
			$historico_cambios[$contador]['indice']=$contador+1;
			$historico_cambios[$contador]['nombre_campo']='Plazo total';
			$historico_cambios[$contador]['valor_inicial']=$transaccion1->getTipoPlazoTotal();
			$historico_cambios[$contador]['valor_final']=$transaccion2->getTipoPlazoTotal();
			$historico_cambios[$contador]['usuario']='<a href="mailto:'.$transaccion2->getUsuarioNombre2().'">'.$transaccion2->getUsuarioId2().'</a>';
			$historico_cambios[$contador]['fecha']=$transaccion2->getFechaCreacion();
			$contador++;
		}
		if($transaccion1->getUsuarioId1()!=$transaccion2->getUsuarioId1()){
			$historico_cambios[$contador]['indice']=$contador+1;
			$historico_cambios[$contador]['nombre_campo']='Responsable';
			$historico_cambios[$contador]['valor_inicial']=$transaccion1->getUsuarioNombre1();
			$historico_cambios[$contador]['valor_final']=$transaccion2->getUsuarioNombre1();
			$historico_cambios[$contador]['usuario']='<a href="mailto:'.$transaccion2->getUsuarioNombre2().'">'.$transaccion2->getUsuarioId2().'</a>';
			$historico_cambios[$contador]['fecha']=$transaccion2->getFechaCreacion();
			$contador++;
		}
		if($transaccion1->getDependenciaId()!=$transaccion2->getDependenciaId()){
			$historico_cambios[$contador]['indice']=$contador+1;
			$historico_cambios[$contador]['nombre_campo']='Dependencia';
			$historico_cambios[$contador]['valor_inicial']=$transaccion1->getDependenciaName();
			$historico_cambios[$contador]['valor_final']=$transaccion2->getDependenciaName();
			$historico_cambios[$contador]['usuario']='<a href="mailto:'.$transaccion2->getUsuarioNombre2().'">'.$transaccion2->getUsuarioId2().'</a>';
			$historico_cambios[$contador]['fecha']=$transaccion2->getFechaCreacion();
			$contador++;
		}
	}
}

				/** OBTIENE LOS NOMBRES DESCRIPTIVOS DE LOS ELEMENTOS SELECCIONADOS POR EL USUARIO **/

				/** CREA LOS SELECT DEPENDIENTES USANDO EL VALOR SELECCIONADO POR EL USUARIO **/

/* Crea los select del asunto */
/* Obtiene el asunto seleccionado con sus padres */
$asuntos=array();
miga_recursivo($transaccion->getAsuntoId(), _TBL_PQR_ASUNTO, 'asunto_id', 'asunto_id', 'asunto_id_padre', &$asuntos);
$asuntos=array_reverse($asuntos);
$cantidad_selects=count($select_asunto_nombre);
$nivel=0;
for($i=0;$i<$cantidad_selects;$i++){
	if($i>0 && $nivel==0){
		$select_asunto[$i]='<select disabled="disabled" id="'.$select_asunto_nombre[$i].'">
									<option value="0">Seleccione...</option>
								</select>';
	}
	else{
		$nivel_seleccionado=$asuntos[$i];
		$select_asunto[$i] = genera_select_dependiente($nivel, $select_asunto_nombre[$i], 'pqr_asunto', 'asunto_id', 'asunto_nombre', 'asunto_id_padre',$nivel_seleccionado);
		if(isset($asuntos[$i+1])){
			$nivel=$nivel_seleccionado;
		}
		else{
			$nivel=0;
		}
	}
}

/* Crea los select de la dependencia */
$dependencias_temporal=array();
miga_recursivo($transaccion->getDependenciaId(), _TBL_PQR_DEPENDENCIA, 'dependencia_id', 'dependencia_id', 'dependencia_id_padre', &$dependencias_temporal);
$dependencias_temporal=array_reverse($dependencias_temporal);

$cantidad_selects=count($select_dependencia_nombre);
$nivel=0;
for($i=0;$i<$cantidad_selects;$i++){
	if($i>0 && $nivel==0){
		$select_dependencia[$i]='<select disabled="disabled" id="'.$select_dependencia_nombre[$i].'">
									<option value="0">Seleccione...</option>
								</select>';
	}
	else{
		$nivel_seleccionado=$dependencias_temporal[$i];
		$select_dependencia[$i] = genera_select_dependiente($nivel, $select_dependencia_nombre[$i], 'pqr_dependencia', 'dependencia_id', 'dependencia_nombre', 'dependencia_id_padre',$nivel_seleccionado);
		if(isset($dependencias_temporal[$i+1])){
			$nivel=$nivel_seleccionado;
		}
		else{
			$nivel=0;
		}
	}
}

				/** VALIDACIÓN DE LA INFORMACIÓN INGRESADA POR EL USUARIO EN EL FORMULARIO **/

/* Si el usuario no tiene derecho de acceso al formulario de gestión
 * se redirecciona al formulario de contacto */
if($usuario_registrado=='no'){
	header('Location:' . _URL . 'index.php?idcategoria='._SCONTACTO);
}

/* Valida que el número de solicitud sea un valor numérico */
if (!Validacion :: isNum($solicitud_id)) {
	array_push($errores, 'Por favor revise el número de solicitud');
}

				/** PROCESAMIENTO DE LA INFORMACION **/

/* Si no se presentaron errores en el ingreso de la información se copian los
 * documentos adjuntos y se ingresa la información en la base de datos */
$numeroErrores = count($errores);
if ($numeroErrores == 0) {

}
else{
	$continuar='no';
}

							/** PASO DE VARIABLES A LA PLANTILLA DE SMARTY **/
/* Se crea una nueva instancia de Smarty */
$smarty = new Smarty_Plantilla();

/* Asigna a una variable la ruta de la hoja de estilos */
$smarty->assign('DIRCSS', _DIRCSS);

/* Asigna a una variable la ruta de los archivos de funciones javascript */
$smarty->assign('DIRJS', _DIRJS);

/* Asigna el contenido de los titulos, textos y etiquetas */
$smarty->assign('lb_titulo_formulario', 'SISTEMA DE PETICIONES, QUEJAS Y RECLAMOS');
$smarty->assign('lb_titulo_gestion', 'Gestión de PQR');
$smarty->assign('lb_titulo_lista_solicitudes', 'Lista de solicitudes');
$smarty->assign('lb_titulo_confirmacion', 'Confirme su solicitud');

$smarty->assign('lb_nombre'			, 'Nombre');
$smarty->assign('lb_documento'		, 'Identificación');
$smarty->assign('lb_email'			, 'Correo electrónico');
$smarty->assign('lb_telefono'		, 'Telefono');
$smarty->assign('lb_celular'		, 'Celular');
$smarty->assign('lb_direccion'		, 'Dirección');
$smarty->assign('lb_ubicacion'		, 'Ubicación');

$smarty->assign('lb_consecutivo'	, 'Consecutivo');
$smarty->assign('lb_origen'			, 'Origen');
$smarty->assign('lb_medio'			, 'Medio de recepcion');
$smarty->assign('lb_fecha'			, 'Fecha');
$smarty->assign('lb_solicitud'		, 'Solicitud');

$smarty->assign('lb_estado'			, 'Estado');
$smarty->assign('lb_tipo_solicitud'	, 'Tipo solicitud');
$smarty->assign('lb_asunto'			, 'Asunto');
$smarty->assign('lb_responsable'	, 'Responsable');
$smarty->assign('lb_fecha_limite'	, 'Plazo máximo (días)');
$smarty->assign('lb_resumen'		, 'Resumen');
$smarty->assign('lb_respuesta'		, 'Respuesta');

$smarty->assign('lb_btn_enviar'		, 'Modificar');
/* Asigna las opciones de las listas de selección */

/* Asigna los arreglos con los select dependientes */
$smarty->assign('select_asunto', $select_asunto);
$smarty->assign('select_dependencia', $select_dependencia);

/* Valores de los campos del formulario */
$smarty->assign('nombre'					,$solicitante->getNombre());
$smarty->assign('documento'					,$solicitante->getNumeroIdentificacion());
$smarty->assign('tipo_documento_nombre'		,$solicitante->getTipoIdentificacionName());
$smarty->assign('email'						,$solicitante->getEmail());
$smarty->assign('telefono'					,$solicitante->getTelefono1());
$smarty->assign('celular'					,$solicitante->getTelefono2());
$smarty->assign('direccion'					,$solicitante->getDireccion());
$smarty->assign('ubicacion_miga'			,$solicitud->getRegionName());

$smarty->assign('solicitud_id'				,$solicitud->getId());
$smarty->assign('origen'					,$solicitud->getOriginadorName());
$smarty->assign('medio'						,$solicitud->getMedioName());
$smarty->assign('fecha'						,$solicitud->getFechaCreacion());
$smarty->assign('solicitud'					,$solicitud->getDescripcion());

$smarty->assign('estado'					,$transaccion->getEstadoId());
$smarty->assign('tipo_solicitud'			,$transaccion->getTipoId());
$smarty->assign('asunto'					,$transaccion->getAsuntoId());
$smarty->assign('responsable'				,$transaccion->getUsuarioId1());
$smarty->assign('fecha_limite'				,$transaccion->getTipoPlazoTotal());
$smarty->assign('resumen'					,$transaccion->getResumen());
$smarty->assign('respuesta'					,$transaccion->getRespuesta());

/* Asigna el arreglo que contiene el listado de documentos de la solicitud */
$smarty->assign('documentos',$documento);
$smarty->assign('historico_cambios',$historico_cambios);

/* Asigna las opciones de las listas de selección */
$smarty->assign('select_tipo_solicitud', $select_tipo_solicitud);
$smarty->assign('select_estado', $select_estado);

/* Resultado de la validación */
$smarty->assign('errores', $errores);
$smarty->assign('continuar',$continuar);

/* Resultado de la inserción */
$smarty->assign('msg_respuesta', $msg_respuesta);

/* Asigna los valores de las banderas */


/* Muestra en pantalla la página usando la plantilla */
//$smarty->display('tpl_formulario_registro_pqr.html');

/* Se usa fetch cuando esta en el portal */
$resultado_pagina=$smarty->fetch('tpl_formulario_gestion_pqr.html');

return $resultado_pagina;
?>
