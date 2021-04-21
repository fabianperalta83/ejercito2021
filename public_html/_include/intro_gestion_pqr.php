<?php

require_once(_DIRLIB.'pqr/funciones_pqr.php');
require_once(_DIRLIB.'smarty/libs/Smarty.class.php');
require_once(_DIRLIB_ADMIN.'Pager.class.php');

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

 $dependencia_profundidad	=	3;

									/** DECLARACIÓN E INICIALIZACIÓN DE VARIABLES **/

/* Arreglo que almacena los errores producidos */
$errores=array();

/* Creación del arreglo que almacena la información de las solicitudes */
$solicitudes=array();

/* Contador de filtros y filtros*/
$filtro=array();

/* Arreglo que almacena todas las subdependecias de la dependencia seleccionada */
$dependencias=array();

/* Variable que almacena la sentencia de filtrado */
$sql_filtros='';

/* Variable que almacena el vínculo al archivo XML generado con el detalle de las solicitudes */
$detalleXml='';

/* Variable que contiene la fecha y hora de la transacción */
$timestamp = date('Y-m-d H:i:s');

/* Variable que controla la continuidad de la transacción */
$continuar = 'ok';

/* Variable que almacena el mensaje de respuesta para el usuario */
$msg_respuesta = '';

/* Arreglo que almacena la jerarquia de la dependencia */
$miga_dependencia_arreglo=array();

/* Indica si el usuario esta registrado */
$usuario_registrado='ok';

/* Define los nombres de los input para los select dependientes, para adicionar niveles al select
 * se deben adicionar en la variable de profundidad de cada uno y en los arreglos en el archivo de
 * funciones de javascript de la aplicación */

for($i=0;$i<$dependencia_profundidad;$i++){
	$select_dependencia_nombre[$i]	=	'dependencia_n'.($i+1);
}

/* Obtiene las opciones de la base de datos que se mostraran como selects en el formulario */
$select_tipo_solicitud=genera_arreglo_select('pqr_tipo','tipo_id','tipo_nombre');
$select_estado=genera_arreglo_select('pqr_estado','estado_id','estado_nombre');

/* Creación de los arreglos con la información de los select */
$select_criterio_orden['id'][0]=1;
$select_criterio_orden['id'][1]=2;
$select_criterio_orden['id'][2]=3;
$select_criterio_orden['id'][3]=4;
$select_criterio_orden['id'][4]=5;

$select_criterio_orden['nombre'][0]='Consecutivo';
$select_criterio_orden['nombre'][1]='Fecha';
$select_criterio_orden['nombre'][2]='Tipo';
$select_criterio_orden['nombre'][3]='Estado';
$select_criterio_orden['nombre'][4]='Dependencia';

/* incializacion de otras variables */

$texto_introduccion='' .
	'<div>Formulario de gestión de PQR, por favor seleccione la solicitud' .
	'que desea gestionar</div>';

							/** RECUPERA LA INFORMACIÓN INGRESADA POR EL USUARIO **/

/* Obtiene la dependencia seleccionado por el usuario */
$numero_selects=$dependencia_profundidad;
$dependencia=0;
while($dependencia==0 && $numero_selects>0){
	$dependencia=getVariable($select_dependencia_nombre[$numero_selects-1],0);
	$numero_selects--;
}

/* Obtiene la información ingresada del formulario y le quita las etiquetas html y php que tengan*/
$solicitud_id	=			getVariable('solicitud_id','');
$fecha_inicial	=			getVariable('fecha_inicial', '');
$fecha_final	=			getVariable('fecha_final', '');
$estado 		=			getVariable('estado',0);
$tipo 			= 			getVariable('tipo_solicitud',0);
$accion 		=			getVariable('accion','');
$ordenar		=			getVariable('ordenar',1);
$pagina			=			getVariable('pagina',1);

/* Verifica si se envió el formulario */
if (isset ($_POST['enviar'])) {
	$enviar = 'ok';
}else {
	$enviar = 'no';
}

						/** OBTIENE LOS NOMBRES DESCRIPTIVOS DE LOS ELEMENTOS SELECCIONADOS POR EL USUARIO **/

/* Obtiene la miga de la dependencia */
miga_recursivo($dependencia, 'pqr_dependencia', 'dependencia_id', 'dependencia_nombre', 'dependencia_id_padre', &$miga_dependencia_arreglo);
$miga_dependencia=formato_miga($miga_dependencia_arreglo,' ->');

/* Obtiene el nombre del tipo de solicitud */
$nombre_tipo_solicitud=nombre_elemento('pqr_tipo','tipo_id','tipo_nombre',$tipo,'No disponible');

				/** CREA LOS SELECT DEPENDIENTES USANDO EL VALOR SELECCIONADO POR EL USUARIO **/

/* Crea los select de la dependencia */
$cantidad_selects=count($select_dependencia_nombre);
$nivel=0;
for($i=0;$i<$cantidad_selects;$i++){
	if($i>0 && $nivel==0){
		$select_dependencia[$i]='<select disabled="disabled" id="'.$select_dependencia_nombre[$i].'">
									<option value="0">Seleccione...</option>
								</select>';
	}
	else{
		$nivel_seleccionado=getVariable($select_dependencia_nombre[$i],0);
		$select_dependencia[$i] = genera_select_dependiente($nivel, $select_dependencia_nombre[$i], 'pqr_dependencia', 'dependencia_id', 'dependencia_nombre', 'dependencia_id_padre',$nivel_seleccionado);
		$nivel=$nivel_seleccionado;
	}
}

							/** VALIDACIÓN DE LA INFORMACIÓN INGRESADA POR EL USUARIO EN EL FORMULARIO **/

/* Válida que el usuario este registrado, si no lo está termina el programa */
if($usuario_registrado=='no'){
	/*die('Acceso no autorizado');*/
}

/* Valida que el número de identificación sea un valor numérico o que el campo este vacio */
if (!Validacion :: isNum($solicitud_id) && !Validacion :: isEmpty($solicitud_id)) {
	array_push($errores, 'Por favor revise el número de solicitud, recuerde que solo debe tener números.');
}

/* Válida que la fecha ingresada sea una fecha válida */
if(!Validacion :: isEmpty($fecha_inicial)){
	/* Convierte la cadena pasada por parametro a un timestamp de UNIX */
	$fecha_inicial=strtotime($fecha_inicial);

	/* verifica si es una fecha válida */
	if($fecha_inicial){
		$fecha_inicial=date('Y-m-d',$fecha_inicial);
	}
	else{
		array_push($errores, 'Por favor revise la fecha ingresada, recuerde que el formato es AAAA-MM-DD.');
	}
}
if(!Validacion :: isEmpty($fecha_final)){
	/* Convierte la cadena pasada por parametro a un timestamp de UNIX */
	$fecha_final=strtotime($fecha_final);

	/* verifica si es una fecha válida */
	if($fecha_final){
		$fecha_final=date('Y-m-d',$fecha_final);
	}
	else{
		array_push($errores, 'Por favor revise la fecha ingresada, recuerde que el formato es AAAA-MM-DD.');
	}
}

										/** PROCESAMIENTO DE LA INFORMACION **/

/* Si no se presentaron errores en el ingreso de la información se copian los
 * documentos adjuntos y se ingresa la información en la base de datos */
$numeroErrores = count($errores);

/* Define el ordenamiento de la información */
switch($ordenar){
	case 1:
		/* Indica que el listado se ordenara por consecutivo */
		$order='ORDER BY s.solicitud_id';
		break;
	case 2:
		/* Indica que el listado se ordenara por fecha de creación */
		$order='ORDER BY s.creacion';
		break;
	case 3:
		/* Indica que el listado se ordenara por tipo de solicitud */
		$order='ORDER BY t.tipo_id';
		break;
	case 4:
		/* Indica que el listado se ordenara por el estado de la solicitud */
		$order='ORDER BY t.estado_id';
		break;
	case 5:
		/* Indica que el listado se ordenara por el nombre de la dependencia */
		$order='ORDER BY t.dependencia_id';
		break;
	default:
		$order='';
}

/* Verifica y aplica los filtros de la consulta a la tabla solicitud*/
if($solicitud_id!=''){
	$filtro_tmp='s.solicitud_id='.$solicitud_id;
	array_push($filtro,$filtro_tmp);
}
if($fecha_inicial!=''){
	$filtro_tmp='s.creacion>="'.$fecha_inicial.' 00:00:00"';
	array_push($filtro,$filtro_tmp);
}
if($fecha_final!=''){
	$filtro_tmp='s.creacion<="'.$fecha_final.' 23:59:59"';
	array_push($filtro,$filtro_tmp);
}
if($tipo!=0){
	$filtro_tmp='t.tipo_id='.$tipo;
	array_push($filtro,$filtro_tmp);
}
if($estado!=0){
	$filtro_tmp='t.estado_id='.$estado;
	array_push($filtro,$filtro_tmp);
}
if($dependencia!=0){
	/* Obtiene todas las subdependencias de la dependencia seleccionada */
	obtenerHijos(_TBL_PQR_DEPENDENCIA,'dependencia_id', 'dependencia_id_padre', $dependencia, &$dependencias);
	$cantidad_dependencias=count($dependencias);
	if($cantidad_dependencias==1){
		$filtro_tmp='t.dependencia_id='.$dependencias[0];
	}
	else{
		for($i=0;$i<$cantidad_dependencias;$i++){
			if($i==0){
				$filtro_tmp='t.dependencia_id in ('.$dependencias[$i];
			}
			elseif($i==($cantidad_dependencias-1)){
				$filtro_tmp.=','.$dependencias[$i].') ';
			}
			else{
				$filtro_tmp.=','.$dependencias[$i];
			}
		}
	}
	array_push($filtro,$filtro_tmp);
}
$numeroFiltros=count($filtro);
for($i=0;$i<$numeroFiltros;$i++){
	$sql_filtros.=' and '.$filtro[$i];
}
if ($numeroErrores == 0) {
	/* Crea la sentencia sql que consulta todas las solicitudes */
	$sql_consulta_solicitud=sprintf(
		'SELECT s.solicitud_id, t.transaccion_id ' .
		'FROM %s s, %s t ' .
		'WHERE t.solicitud_id=s.solicitud_id and ' .
			't.transaccion_id in (' .
				'SELECT max(t2.transaccion_id) ' .
				'FROM pqr_solicitud s2, pqr_transaccion t2 ' .
				'WHERE t2.solicitud_id=s2.solicitud_id ' .
				'GROUP BY s2.solicitud_id) ' .
				'%s ' .
		'GROUP BY s.solicitud_id %s'
		,_TBL_PQR_SOLICITUD,_TBL_PQR_TRANSACCION,$sql_filtros,$order);

	/* Ejecuta la consulta */
	$resultado_consulta_solicitud=$db->Execute($sql_consulta_solicitud);

	/* Crea el objeto paginador */
	$resultado_consulta_solicitud_paginado = new Pager($resultado_consulta_solicitud, _NUMREG_LST_ADMIN, $pagina);
	
	/* Obtiene la información adicional de cada solicitud consultada y crea el arreglo */
	while(!$resultado_consulta_solicitud_paginado->EOF){
		/* Crea el un objeto Solicitud con la solicitud obtenida */
		$solicitud_id_tmp	=	$resultado_consulta_solicitud_paginado->fields['solicitud_id'];
		$solicitud			=	new Solicitud($solicitud_id_tmp);
		$solicitante		=	new Solicitante($solicitud->getSolicitanteId());

		/* Obtiene la información de la transaccion */
		if($transaccion=new Transaccion($solicitud->transaccion[$solicitud->getTransaccionActual()])){
			/* Asigna valores a las variables */
			$estado_solicitud		=	$transaccion->getEstadoName();
			$tipo_solicitud			=	$transaccion->getTipoName();
			$dependencia_solicitud	=	$transaccion->getDependenciaName();

			/* Determina el estilo de la celda donde se muestra
			 * el estado */
			 switch($transaccion->getEstadoId()){
			 	case 1:
			 		$clase='estado_abierto';
			 		break;
			 	case 2:
			 		$clase='estado_entramite';
			 		break;
			 	case 3:
			 		$clase='estado_cerrado';
			 		break;
			 	default:
			 		$clase='';
			 }

		}
		else{
			$estado_solicitud=0;
			$tipo_solicitud=0;
			$dependencia_solicitud=0;
		}
		$solicitud_tmp['id']			=	$solicitud_id_tmp;
		$solicitud_tmp['fecha']			=	$solicitud->getFechaCreacion();
		$solicitud_tmp['tipo']			=	$tipo_solicitud;
		$solicitud_tmp['estado']		=	$estado_solicitud;
		$solicitud_tmp['dependencia']	=	$dependencia_solicitud;
		$solicitud_tmp['clase']			=	$clase;
		
		array_push($solicitudes,$solicitud_tmp);

		/* Mueve el apuntador del resultado */
		$resultado_consulta_solicitud_paginado->MoveNext();
	}
	/* Crea el archivo XML con la información detallada de las solicitudes listadas */
	$detalleXml=generaXml($sql_consulta_solicitud,'Descargar listado en XML');
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

/* Asigna a una variable la ruta de las imágenes del administrador */
$smarty->assign('dir_admin_images', _URL.'_administracion/recursos/images/');

/* Pasa el valor de la constante _URL a smarty */
$smarty->assign('url_gestion',_URL.'?idcategoria='._GESTION_PQR);

/* Asigna el contenido de los titulos, textos y etiquetas */
$smarty->assign('lb_titulo_formulario', 'SISTEMA DE PETICIONES, QUEJAS Y RECLAMOS');
$smarty->assign('lb_titulo_gestion', 'Gestión de PQR');
$smarty->assign('lb_titulo_lista_solicitudes', 'Lista de solicitudes');
$smarty->assign('lb_titulo_confirmacion', 'Confirme su solicitud');

$smarty->assign('lb_introduccion_formulario', $texto_introduccion);

$smarty->assign('lb_busqueda', 'Búsqueda');
$smarty->assign('lb_id', 'Id');
$smarty->assign('lb_fecha_inicial', 'Desde');
$smarty->assign('lb_fecha_final', 'Hasta');
$smarty->assign('lb_tipo', 'Tipo');
$smarty->assign('lb_estado', 'Estado');
$smarty->assign('lb_dependencia', 'Dependencia');
$smarty->assign('lb_ordenar', 'Ordenar por');

$smarty->assign('btn_lb_enviar', 'Filtrar');

/* Asigna las opciones de las listas de selección */
$smarty->assign('select_criterio_orden',$select_criterio_orden);
$smarty->assign('select_tipo_solicitud', $select_tipo_solicitud);
$smarty->assign('select_estado', $select_estado);

/* Asigna los arreglos con los select dependientes */
$smarty->assign('select_dependencia', $select_dependencia);

/* Valores de los campos del formulario */
$smarty->assign('estado',$estado);
$smarty->assign('tipo_solicitud', $tipo);
$smarty->assign('dependencia', $dependencia);
$smarty->assign('solicitud_id',$solicitud_id);
$smarty->assign('fecha_inicial',$fecha_inicial);
$smarty->assign('fecha_final',$fecha_final);
$smarty->assign('solicitud', $solicitudes);
$smarty->assign('ordenar',$ordenar);

/* Resultado de la validación */
$smarty->assign('errores', $errores);
$smarty->assign('continuar',$continuar);

/* Resultado de la inserción */
$smarty->assign('msg_respuesta', $msg_respuesta);

/* Asigna los valores de las banderas */
$smarty->assign('flg_enviar', $enviar);

/* Vínculo al archivo XML generado */
$smarty->assign('detalleXml',$detalleXml);

/* Define los colores para el fondo de los campos
del formulario de filtro */
$smarty->assign('color_fondo_formulario',array('#F0F5F8','#FFFFFF'));

/* Arreglo de valores de la paginacion */
$smarty->assign('paginas',$resultado_consulta_solicitud_paginado->values);

/* Se usa fetch cuando esta en el portal */
$resultado_pagina=$smarty->fetch('tpl_intro_gestion_pqr.html');

return $resultado_pagina;
?>