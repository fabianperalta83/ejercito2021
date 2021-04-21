<?php
/* Formulario de ingreso de solicitudes del sistema de PQR*/

require_once(_DIRLIB.'pqr/funciones_pqr.php');
require_once(_DIRLIB.'smarty/libs/Smarty.class.php');

							/** SOLICITUD DE ARCHIVOS REQUERIDOS **/

/* Incluye la clase de validaciones y de funciones */
require_once (_DIRCORE . 'Validacion.class.php');
require_once(_DIRCORE.'Funciones.class.php');

							/** VARIABLES GLOBALES **/
/* Hace disponible la conexión a la base de datos */
global $db;
							/** CONFIGURACION DEL FORMULARIO **/
/* Variable que contiene la fecha y hora de la transacción */
$timestamp = date('Y-m-d H:i:s');

/* Variable que almacena la dirección de correo electrónico que debe recibir copia de las solicitudes */
$destinatario_correo=_CORREO_PQR;

/* Define el tipo de formulario que se mostrará */
$tipo_formulario='web';

$texto_introduccion='<div>Los campos <font color=#FF8000>resaltados</font> son obligatorios<br /><br /></div>';

/* Define los indicadores de los tipos de documento y originadores  en la base de datos necesarios para el calculo*/
/* tipos de documento */
$nit=3;

/* originadores */
$persona_natural=3;
$persona_juridica=4;

/* Define el tamaño máximo de los documentos adjuntos en bytes (1 Mbyte = 1048576 Bytes)*/
$archivo_max_size=3145728;

/* Define los tipos de archivo permitidos */
$tipo_archivo_permitido = array (
	'application/msword',
	'application/pdf',
	'image/pjpeg',
	'text/richtext',
	'image/jpeg'
);

/* Definición de la profundidad de los select de ubicacion, asunto y dependencia
 * Este valor se refleja en la cantidad de selects que quedan disponibles para
 * hacer la selección de cada uno de estos.
 * La profundidad máxima permitida es 5.*/

$region_profundidad			=	3;
$asunto_profundidad			=	1;
$dependencia_profundidad	=	1;

/* Vínculos de administración */
$link_menu_administracion	=	sprintf(
										'<a href="%sindex.php?idcategoria=%s">MEN&Uacute; DE ADMINISTRACI&Oacute;N</a>',
										_URL,_ADMINISTRACION_PQR);

							/** DECLARACIÓN E INICIALIZACIÓN DE VARIABLES **/

/* Arreglo en el cual se almacena la descripción de los errores que se presenten en la validación del formulario */
$errores 			= 	array ();

/* Arreglo que almacena los identificadores de las solicitudes del usuario */
$solicitudes		=	array();

/* Variable que almacena el código html que contiene las solicitudes del usuario */
$solicitudes_html	=	'';

/* Variable que controla la continuidad de la transacción */
$continuar 			= 	'ok';

/* Variable que indica si el usuario es administrador del sistema */
$administrador_pqr='no';

/* Variable que almacena el mensaje de respuesta para el usuario */
$msg_respuesta 		= 	'';

/* Miga de la ubicación */
$miga_ubicacion_arreglo		=	array();
$miga_ubicacion_id_arreglo	=	array();

/* Miga del asunto */
$miga_asunto_arreglo		=	array();
$miga_asunto_id_arreglo		=	array();

/* Miga de la dependencia */
$miga_dependencia_arreglo	=	array();
$miga_dependencia_id_arreglo=	array();

/* Arreglo que almacena los nombres de los archivos adjuntados a la solicitud. */
$documento_cargado			=	array();

/* Variable que almacena el listado de documentos para enviar en el correo. */
$documentos_email			=	'';

/* Crea el valor entendible para el usuario(hr=human readable) del tamaño máximo del archivo */
$archivo_max_size_hr		=	($archivo_max_size/1048576).' Mb';

/* Define los nombres de los input para los select dependientes, para adicionar niveles al select
 * se deben adicionar en la variable de profundidad de cada uno y en los arreglos en el archivo de
 * funciones de javascript de la aplicación */

for($i=0;$i<$region_profundidad;$i++){
	$select_region_nombre[$i]		=	'ubicacion_n'.($i+1);
}

for($i=0;$i<$asunto_profundidad;$i++){
	$select_asunto_nombre[$i]		=	'asunto_n'.($i+1);
}

for($i=0;$i<$dependencia_profundidad;$i++){
	$select_dependencia_nombre[$i]	=	'dependencia_n'.($i+1);
}

/* Obtiene las opciones de la base de datos que se mostraran como selects en el formulario */
$select_originador				=	genera_arreglo_select('pqr_originador'			,'originador_id'			,'originador_nombre');
$select_tipo_identificacion		=	genera_arreglo_select('pqr_tipo_identificacion'	,'tipo_identificacion_id'	,'tipo_identificacion_descripcion');
$select_tipo_solicitud			=	genera_arreglo_select('pqr_tipo'				,'tipo_id'					,'tipo_nombre');
$select_medio_recepcion			=	genera_arreglo_select('pqr_medio'				,'medio_id'					,'medio_nombre');
$select_estado					=	genera_arreglo_select('pqr_estado'				,'estado_id'				,'estado_nombre');

/* incializacion de otras variables */
$nombre='';
$direccion='';
$telefono='';
$email='';
$idusuario=0;

/* Verifica si el existe un usuario autenticado en el portal */
if(isset($_SESSION['info_usuario'])){
	$usuario_registrado='ok';

	/* Verifica si el usuario es administrador del sistema de PQR */
	if(esAdministradorPqr($_SESSION['info_usuario']['idusuario'])){
		$administrador_pqr='ok';
	}
}
else{
	$usuario_registrado='no';
}

							/** DEFINICION DE LAS CARACTERISTICAS DEL TIPO DE FORMULARIO **/

/* Asigna los valores por defecto según la configuración indicada
 * para el tipo de formulario y teniendo en cuenta si el usuario
 * esta validado en el portal
 */
if($usuario_registrado=='ok'){
	if($tipo_formulario=='web'){

		/* Define los campos que se mostraran */
		$flg_originador_visible=0;
		$flg_estado=0;
		$flg_medio_recepcion=0;
		$flg_resumen=0;

	}
	elseif($tipo_formulario=='digitador'){

		/* Define los campos que se mostraran */
		$flg_originador_visible=1;
		$flg_estado=1;
		$flg_medio_recepcion=1;
		$flg_resumen=1;

	}
	else{

		/* Define los campos que se mostraran */
		$flg_originador_visible=0;
		$flg_estado=0;
		$flg_medio_recepcion=0;
		$flg_resumen=0;

	}
	/* Define los campos que aparecen desactivados */
	$flg_disabled_nombre=1;
	$flg_disabled_direccion=1;
	$flg_disabled_telefono=1;
	$flg_disabled_email=1;
	$flg_hash=0;

	/* Valores por defecto*/
	$nombre		=	$_SESSION['info_usuario']['nombres'].' '.$_SESSION['info_usuario']['apellidos'];
	$direccion	=	$_SESSION['info_usuario']['direccion'];
	$telefono	=	$_SESSION['info_usuario']['telefono'];
	$email		=	$_SESSION['info_usuario']['email'];
	$idusuario	=	$_SESSION['info_usuario']['idusuario'];

	$medio_recepcion_default	=	5;
	$estado_default				=	1;
	$tipo_identificacion_default=	1;
	$tipo_solicitud_default		=	8;
	$tipo_documento				=	1;

	/* Consulta las solicitudes realizadas por el usuario */
	$sql_consulta_solicitudes=sprintf(
		'SELECT solicitud_id ' .
		'FROM %s ' .
		'WHERE solicitante_id in ' .
			'(SELECT solicitante_id FROM %s WHERE idusuario=%s)',
		_TBL_PQR_SOLICITUD,_TBL_PQR_SOLICITANTE,$idusuario);

	$resultado_consulta_solicitudes=$db->Execute($sql_consulta_solicitudes);
	if($resultado_consulta_solicitudes){
		while(!$resultado_consulta_solicitudes->EOF){
			array_push($solicitudes,$resultado_consulta_solicitudes->fields['solicitud_id']);
			$resultado_consulta_solicitudes->MoveNext();
		}
	}

	/* Crea el código html para mostrar las solicitudes del usuario */
	$solicitudes_html=consulta_solicitudes($solicitudes);
}
else{
	/* Define los campos que se mostraran si no esta registrado*/
	$flg_originador_visible=0;
	$flg_estado=0;
	$flg_medio_recepcion=0;
	$flg_resumen=0;

	/* Define los campos que aparecen desactivados */
	$flg_disabled_nombre=0;
	$flg_disabled_direccion=0;
	$flg_disabled_telefono=0;
	$flg_disabled_email=0;
	$flg_hash=1;

	/* Valores por defecto*/
	$medio_recepcion_default=5;
	$estado_default=1;
	$tipo_identificacion_default=1;
	$tipo_solicitud_default=8;
	$tipo_documento=1;
}

/* Crea el valor por defecto para el hash
 * según el valor de la bandera del hash*/
if($flg_hash==0){
	$hash_default=strtoupper(substr(md5(rand(0,9999)),10,5));
	$_SESSION["captcha"]=$hash_default;
}
else{
	$hash_default='';
}

/* Consulta la solicitud según el hash indicado por el usuario */

							/** RECUPERA LA INFORMACIÓN INGRESADA POR EL USUARIO **/

/* obtiene el tipo de identificacion seleccionada por el usuario para calcular el tipo de persona */
$tipo_identificacion = getVariable('tipo_identificacion', $tipo_identificacion_default);

/* Calcula el tipo de persona según el tipo de identificacion */
if($tipo_identificacion==$nit){
	$tipo_persona_default=$persona_juridica;
}
else{
	$tipo_persona_default=$persona_natural;
}

/* Obtiene la región seleccionada por el usuario*/
$numero_selects=$region_profundidad;
$region=0;

while($region==0 && $numero_selects>0){
	$region=getVariable($select_region_nombre[$numero_selects-1],0);
	$numero_selects--;
}

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
/* Obtiene el correo electrónico relacionado con la dependencia */
	/* Crea la consulta a la tabla de relación de dependencia y usuario */
	$sql_consulta_usuario = sprintf('SELECT idusuario FROM %s WHERE dependencia_id=%s and encargado=1',
									_TBL_PQR_REL_DEPENDENCIA_USUARIO, $dependencia);

	/* Ejecuta la consulta */
	$resultado_consulta_usuario = $db->Execute($sql_consulta_usuario);

	/* Obtiene los resultados */
	if($resultado_consulta_usuario){
		if($resultado_consulta_usuario->NumRows()>0){
			$dependencia_correo = $resultado_consulta_usuario->fields['idusuario'];
		}
	}


/* Obtiene la información ingresada del formulario y le quita las etiquetas html y php que tengan*/
$nombre = 					getVariable('nombre', $nombre);
$tipo_persona = 			getVariable('tipo_persona', $tipo_persona_default);
$numero_identificacion = 	getVariable('numero_identificacion', '');
$digito_verificacion =		getVariable('digito_verificacion','');
$direccion = 				getVariable('direccion', $direccion);
$telefono = 				getVariable('telefono', $telefono);
$celular = 					getVariable('celular', '');
$email = 					getVariable('email', $email);
$estado = 					getVariable('estado',$estado_default);
$medio_recepcion = 			getVariable('medio_recepcion', $medio_recepcion_default);
$tipo_solicitud = 			getVariable('tipo_solicitud', $tipo_solicitud_default);
$solicitud = 				strip_tags(getVariable('solicitud',''));
$resumen =					strip_tags(getVariable('resumen', $solicitud));
$hash = 					getVariable('hash', $hash_default);
$tipo_documento =			getVariable('tipo_documento', $tipo_documento);	//Aun no se ha implementado la captura de esta información
$consulta_hash = 			getVariable('consulta_hash', '');

$ver_solicitudes =			getVariable('ver_solicitudes',0);

/* indica si el textbox del digito de verificacion debe iniciar visible */
if($tipo_identificacion==$nit){
	$digito_verificacion_visibility='visible';
}
else{
	$digito_verificacion_visibility='hidden';
}

/* Verifica si se envió el formulario de creación de solicitud */
if (isset ($_POST['enviar'])) {
	$enviar = 'ok';
	/* Desactiva la opción de ver la solicitudes la cual esta activa
	 * por defecto porque viene en un campo hidden del formulario */
	$ver_solicitudes=0;
}else {
	$enviar = 'no';
	/* Verifica si se envío el formulario de consulta de solicitud */
	if(isset($_POST['envia_consulta_hash'])){
		if($consulta_hash==''){
			$ver_solicitudes=0;
		}
		else{
			/* Crea la sentencia de consulta */
			$sql_consulta_hash=sprintf(
				'SELECT solicitud_id ' .
				'FROM %s ' .
				'WHERE solicitud_hash="%s"',
				_TBL_PQR_SOLICITUD,$consulta_hash);
			/* Ejecuta la consulta */
			$resultado_consulta_hash=$db->Execute($sql_consulta_hash);
			/* Si la solicitud existe muestra la información básica */
			if($resultado_consulta_hash && $resultado_consulta_hash->NumRows()==1){
				array_push($solicitudes,$resultado_consulta_hash->fields['solicitud_id']);
				/* Crea el código html para mostrar las solicitudes del usuario */
				$solicitudes_html=consulta_solicitudes($solicitudes);
			}
			else{
				$solicitudes_html='No existe una solicitud relacionada con ese código, por favor' .
						' revise el código e intente de nuevo.';
			}
		}
	}
}

					/** OBTIENE LOS NOMBRES DESCRIPTIVOS DE LOS ELEMENTOS SELECCIONADOS POR EL USUARIO **/

/* Obtiene la miga de las regiones */
miga_recursivo($region, 'pqr_region', 'region_id', 'region_nombre', 'region_id_padre', &$miga_ubicacion_arreglo);
$miga_ubicacion=formato_miga($miga_ubicacion_arreglo,' ->');

/* Obtiene la miga del asunto */
miga_recursivo($asunto, 'pqr_asunto', 'asunto_id', 'asunto_nombre', 'asunto_id_padre', &$miga_asunto_arreglo);
$miga_asunto=formato_miga($miga_asunto_arreglo,' ->');

/* Obtiene la miga de la dependencia */
miga_recursivo($dependencia, 'pqr_dependencia', 'dependencia_id', 'dependencia_nombre', 'dependencia_id_padre', &$miga_dependencia_arreglo);
$miga_dependencia=formato_miga($miga_dependencia_arreglo,' ->');

/* Obtiene el nombre del medio de recepcion */
$nombre_medio_recepcion=nombre_elemento('pqr_medio','medio_id','medio_nombre',$medio_recepcion,'No disponible');

/* Obtiene el nombre del tipo de solicitud */
$nombre_tipo_solicitud=nombre_elemento('pqr_tipo','tipo_id','tipo_nombre',$tipo_solicitud,'No disponible');

/* Obtiene el nombre del tipo de identificacion del usuario */
$nombre_tipo_identificacion=nombre_elemento('pqr_tipo_identificacion','tipo_identificacion_id','tipo_identificacion_descripcion',$tipo_identificacion,'No disponible');

				/** CREA LOS SELECT DEPENDIENTES USANDO EL VALOR SELECCIONADO POR EL USUARIO **/

/* Crea los select de la ubicación */
$cantidad_selects=$region_profundidad;
$nivel=0;
for($i=0;$i<$cantidad_selects;$i++){
	if($i>0 && $nivel==0){
		$select_region[$i]='<select disabled="disabled" id="'.$select_region_nombre[$i].'">
									<option value="0">Seleccione...</option>
								</select>';
	}
	else{
		$nivel_seleccionado=getVariable($select_region_nombre[$i],0);
		$select_region[$i] = genera_select_dependiente($nivel, $select_region_nombre[$i], 'pqr_region', 'region_id', 'region_nombre', 'region_id_padre',$nivel_seleccionado);
		$nivel=$nivel_seleccionado;
	}
}

/* Crea los select del asunto */
$cantidad_selects=count($select_asunto_nombre);
$nivel=0;
for($i=0;$i<$cantidad_selects;$i++){
	if($i>0 && $nivel==0){
		$select_asunto[$i]='<select disabled="disabled" id="'.$select_asunto_nombre[$i].'">
									<option value="0">Seleccione...</option>
								</select>';
	}
	else{
		$nivel_seleccionado=getVariable($select_asunto_nombre[$i],0);
		$select_asunto[$i] = genera_select_dependiente($nivel, $select_asunto_nombre[$i], 'pqr_asunto', 'asunto_id', 'asunto_nombre', 'asunto_id_padre',$nivel_seleccionado);
		$nivel=$nivel_seleccionado;
	}
}

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

/* Valida que el nombre sea texto válido o que el campo este vacio */
if (!Validacion :: isTexto($nombre, FALSE) && !Validacion :: isEmpty($nombre)) {
	array_push($errores, 'Por favor revise el nombre, recuerde que solo debe tener letras.');
}

/* Valida que el número de identificación sea un valor numérico o que el campo este vacio */
if (!Validacion :: isNum($numero_identificacion) && !Validacion :: isEmpty($numero_identificacion)) {
	array_push($errores, 'Por favor revise el número de identificación, recuerde que solo debe tener números.');
}
/* Si se escogio NIT como tipo de identificación y se ingreso el número se valida el digito de verificacion */

if (!Validacion :: isNum($digito_verificacion) && !Validacion :: isEmpty($numero_identificacion) && $tipo_identificacion==$nit) {
	array_push($errores, 'Por favor revise el digito de verificación, debe escribir un número.');
}
/* Valida que la dirección sea texto válido o que el campo este vacio */
if (!Validacion :: isTexto($direccion, FALSE) && !Validacion :: isEmpty($direccion)) {
	array_push($errores, 'Por favor revise su dirección, recuerde que solo debe tener letras y números.');
}
/* Valida que el número telefonico este compuesto de espacios y numeros o que este vacio */
if (!Validacion :: isNumTelephone($telefono) && !Validacion :: isEmpty($telefono)) {
	array_push($errores, 'Por favor revise el número telefonico, recuerde que solo debe tener números.');
}
/* Valida que el número celular este compuesto de espacios y números o que este vacio */
if (!Validacion :: isNumTelephone($celular) && !Validacion :: isEmpty($celular)) {
	array_push($errores, 'Por favor revise el número de celular, recuerde que solo debe tener números.');
}
/* Valida que el correo electrónico tenga el formato adecuado o que este vacio */
if (!Validacion :: isEmail($email, FALSE) && !Validacion :: isEmpty($email)) {
	array_push($errores, 'Por favor ingrese una dirección de correo de uso frecuente.');
}
/* Valida que el campo solicitud no se encuentre vacio */
if (Validacion :: isEmpty($solicitud)) {
	array_push($errores, 'Debe escribir una solicitud');
}
/* Valida que el usuario escriba correctamente las letras de verificación */
if (isset ($_SESSION['captcha'])) {
	if ($hash != $_SESSION['captcha']) {
		array_push($errores, 'Debe escribir la palabra de la imágen para confirmar la solicitud');
	} else {
		/* Si ya existe una solicitud con el hash generado se genera uno nuevo y se pide al usuario que lo digite de nuevo*/
		$sql_consulta_hash = 'select * from pqr_solicitud where solicitud_hash="' . $_SESSION['captcha'] . '"';
		$resultado_consulta_hash = $db->Execute($sql_consulta_hash);
		$numeroFilas = $resultado_consulta_hash->NumRows();
		if ($numeroFilas > 0) {
			array_push($errores, 'Por favor escriba de nuevo la palabra de la imagen para confirmar la solicitud');
		}
	}
}
/* Valida que los archivos cargados tengan las caracteristicas de formato y tamaño correctas */
if (isset ($_FILES["archivos"])) {
	/* Si existe el arreglo de archivos lo recorremos para obtener la información de cada archivo*/
	$total_archivos = count($_FILES["archivos"]["name"]);

	//Recorre el arreglo de archivos
	for ($i = 0; $i < $total_archivos; $i++) {
		/* Obtiene la información del archivo */
		$archivo_nombre 			= $_FILES["archivos"]["name"][$i];
		$archivo_nombre_temporal 	= $_FILES["archivos"]["tmp_name"][$i];
		$archivo_tipo 				= $_FILES["archivos"]["type"][$i];
		$archivo_error 				= $_FILES["archivos"]["error"][$i];
		$archivo_size 				= $_FILES["archivos"]["size"][$i];

		/* Válida si el campo de carga del archivo se envio en blanco */
		if ($archivo_nombre != '') {
			/* Valida que el tamaño del archivo no supere el máximo permitido */
			if ($archivo_size > $archivo_max_size) {
				array_push($errores, 'El archivo ' . $archivo_nombre . ' supera el tamaño límite de '.$archivo_max_size_hr);
			}

			/* Valida que el tipo de archivo este en el listado de los archivos permitidos */
			$centinela_tipo_archivo = 0;
			foreach ($tipo_archivo_permitido as $tipo_archivo) {
				if ($archivo_tipo == $tipo_archivo) {
					$centinela_tipo_archivo = 1;
				}
			}
			if ($centinela_tipo_archivo == 0) {
				array_push($errores, 'El tipo de archivo de <b>' . $archivo_nombre . '</b> no es permitido');
			}

			/* Verifica si se presento algún error */
			if ($archivo_error != 0) {
				array_push($errores, 'Se presentó un error al cargar el archivo <b>' . $archivo_nombre.'</b>');
			}
		}
	}
}
/* Fin de la verificación de los archivos cargados */

										/** PROCESAMIENTO DE LA INFORMACION **/

/* Si no se presentaron errores en el ingreso de la información se copian los
 * documentos adjuntos y se ingresa la información en la base de datos */
$numeroErrores = count($errores);
if ($numeroErrores == 0 && $enviar == 'ok') {

	/* si el número de identifiación esta vacio se NULL en la base de datos */
	if ($numero_identificacion == '') {
		$numero_identificacion_insert = 'NULL';
	} else {
		/* si el tipo de documento de identificación es nit entonces se le adiciona el digito de verificacion */

		if($tipo_identificacion==$nit){
			$numero_identificacion_insert = $numero_identificacion.'-'.$digito_verificacion;
		}
		else{
			$numero_identificacion_insert = $numero_identificacion;
		}
	}

	/* Si el nombre del solicitante esta vacio se asigna 'Anónimo' en la base de datos */
	if ($nombre == '') {
		$nombre_insert = 'Anónimo';
	} else {
		$nombre_insert = $nombre;
	}

	/* Crea la sentencia de inserción de información del solicitante en la base de datos */
	$sql_insert_solicitante = 'insert into pqr_solicitante (' .
	'solicitante_nombre,' .
	'tipo_identificacion_id,' .
	'solicitante_identificacion,' .
	'solicitante_email,' .
	'solicitante_telefono_1,' .
	'solicitante_telefono_2,' .
	'solicitante_direccion,' .
	'idusuario,' .
	'creacion,' .
	'modificacion) ' .
	'values ("' . $nombre_insert . '",
		' . $tipo_identificacion . ',
		"' . $numero_identificacion_insert . '",
		"' . $email . '",
		"' . $telefono . '",
		"' . $celular . '",
		"' . $direccion . '",
		"' . $idusuario .'",
		"' . $timestamp . '",
		"' . $timestamp . '")';

	/* Ejecuta la sentencia de inserción */
	if ($db->Execute($sql_insert_solicitante) == false) {
		$continuar = 'no';
	}

	/* Consulta el identificador del solicitante insertado*/
	if ($continuar == 'ok') {
		$sql_consulta_solicitante_id = 'select max(solicitante_id) as solicitante_id ' .
		'from pqr_solicitante ' .
		'where creacion="' . $timestamp . '"';
		$resultado_solicitante_id = $db->Execute($sql_consulta_solicitante_id);
		if ($resultado_solicitante_id->NumRows() > 0) {
			$solicitante_id = $resultado_solicitante_id->fields['solicitante_id'];
		} else {
			$continuar = 'no';
		}
	}

	/* Crea la sentencia de inserción de la solicitud en la base de datos*/
	if ($continuar == 'ok') {
		$sql_insert_solicitud = '
			insert into pqr_solicitud (
				originador_id,
				region_id,
				medio_id,
				solicitante_id,
				solicitud_descripcion,
				solicitud_hash,
				creacion)
			values (
				' . $tipo_persona . ',
				' . $region . ',
				' . $medio_recepcion . ',
				' . $solicitante_id . ',
				"' . $solicitud . '",
				"' . $_SESSION['captcha'] . '",
				"' . $timestamp . '")';

		/* Ejecuta la sentencia de inserción */
		if ($db->Execute($sql_insert_solicitud) == false) {
			$contiuar = 'no';
		}
	}

	/* Consulta el identificador de la solicitud insertada */
	if ($continuar == 'ok') {
		$sql_consulta_solicitud_id = 'select solicitud_id ' .
		'from pqr_solicitud ' .
		'where solicitud_hash="' . $_SESSION['captcha'] . '"';
		$resultado_solicitud_id = $db->Execute($sql_consulta_solicitud_id);
		if ($resultado_solicitud_id->NumRows() > 0) {
			$solicitud_id = $resultado_solicitud_id->fields['solicitud_id'];
		} else {
			$continuar = 'no';
		}
	}

	/* Consulta los parametros del tipo de solicitud indicados*/
	if ($continuar == 'ok') {
		$sql_consulta_info_tipo = '
			select tipo_favorable,tipo_plazo_total,tipo_plazo_alerta ' .
		'from pqr_tipo ' .
		'where eliminado=0 and tipo_id=' . $tipo_solicitud;
		$resultado_consulta_info_tipo = $db->Execute($sql_consulta_info_tipo);
		if ($resultado_consulta_info_tipo->NumRows() > 0) {
			$tipo_favorable = $resultado_consulta_info_tipo->fields['tipo_favorable'];
			$tipo_plazo_total = $resultado_consulta_info_tipo->fields['tipo_plazo_total'];
			$tipo_plazo_alerta = $resultado_consulta_info_tipo->fields['tipo_plazo_alerta'];
		} else {
			$continuar = 'no';
		}
	}
	if ($continuar == 'ok') {
		/* Crea la sentencia de inserción de informacion de la transacción en la base de datos */
		$sql_insert_transaccion = 'insert into pqr_transaccion (
				transaccion_resumen,
				solicitud_id,
				asunto_id,
				estado_id,
				tipo_id,
				tipo_favorable,
				tipo_plazo_total,
				tipo_plazo_alerta,
				dependencia_id,
				creacion)
			values (
				"' . $resumen . '",
				' . $solicitud_id . ',
				' . $asunto . ',
				' . $estado . ',
				' . $tipo_solicitud . ',
				' . $tipo_favorable . ',
				' . $tipo_plazo_total . ',
				' . $tipo_plazo_alerta . ',
				' . $dependencia . ',
				"' . $timestamp . '")';

		/* Ejecuta la sentencia de inserción */
		if ($db->Execute($sql_insert_transaccion) == false) {
			$contiuar = 'no';
		}
	}

	/* Consulta el identificador del solicitante insertado*/
	if ($continuar == 'ok') {
		$sql_consulta_transaccion_id = 'select max(transaccion_id) as transaccion_id ' .
		'from pqr_transaccion ' .
		'where creacion="' . $timestamp . '"';
		$resultado_transaccion_id = $db->Execute($sql_consulta_transaccion_id);
		if ($resultado_transaccion_id->NumRows() > 0) {
			$transaccion_id = $resultado_transaccion_id->fields['transaccion_id'];
		} else {
			$continuar = 'no';
		}
	}

	/* Se suben los documentos anexos al servidor */
	/* Creación del directorio donde se almacenarán los documentos de esta solicitud */
	if($continuar=='ok'){
		$uploaddir = _DIRRECURSOS_USER . 'pqr/' . $solicitud_id;
		if (file_exists($uploaddir)) {
   			$uploaddir.='/'. $transaccion_id;
		}
		else{
			if (mkdir($uploaddir, 0755)) {
				$uploaddir.='/'. $transaccion_id;
			}
			else{
				$continuar='no';
			}
		}
		if(!mkdir($uploaddir, 0755)){
			$continuar = 'no';
		}

		/* Se copian los archivos al directorio asignado a la solicitud */
		for ($i = 0; $i < $total_archivos; $i++) {
			/* Si se indico algún archivo se copian al directorio asignado */
			if($_FILES["archivos"]["name"][$i]!=''){
				$uploadfile = $uploaddir . '/' . $_FILES["archivos"]["name"][$i];
				if (move_uploaded_file($_FILES["archivos"]["tmp_name"][$i], $uploadfile)) {
					chmod($uploadfile, 0440);
					array_push($documento_cargado,$_FILES["archivos"]["name"][$i]);
				}
				else{
					$continuar = 'no';
				}
				/* Hace la inserción de los registros que relacionan los documentos con la transacción */
				if($continuar=='ok'){
					/* Crea la sentencia de inserción de informacion del documento en la base de datos */
					$sql_insert_documento = 'insert into pqr_documento (
							tipo_documento_id, ' .
							'transaccion_id, ' .
							'documento_nombre, ' .
							'creacion, ' .
							'modificacion)
						values (
							' . $tipo_documento . ',
							' . $transaccion_id . ',
							"' . $_FILES["archivos"]["name"][$i] . '",
							"' . $timestamp . '",
							"' . $timestamp . '"
						)';

					/* Ejecuta la sentencia de inserción */
					if ($db->Execute($sql_insert_documento) == false) {
						$contiuar = 'no';
					}
				}
			}
		}
	}
	/* Envia el correo con la información de la solicitud */
	if($continuar == 'ok'){

		/* define el salto de línea */
		$eof='<br>';

		/* Verifica si el resumen es igual a la solicitud no envía el resumen al correo */
		if($resumen==$solicitud){
			$resumen_correo='';
		}
		else{
			$resumen_correo='<b>Resumen:</b> '.$resumen.$eof;
		}

		/* Define el asunto del mensaje */
		$asunto_correo='PQR No. '.$solicitud_id.' ('.$nombre_tipo_solicitud.') registrada en el sistema - '.$timestamp;

		/* Crea el listado de documentos */
		if(count($documento_cargado)>0){
			$documentos_email='<b>Documentos:</b> '.$eof;
			foreach($documento_cargado as $documento){
				$documentos_email.='- <a href="'._URL._DIRRECURSOS_USER.'pqr/'.$solicitud_id.'/'.$transaccion_id.'/'.$documento.'">'.$documento.'</a>'.$eof;
			}
		}
		else{
			$documentos_email='';
		}
		/* Crea el link para acceder a la pagina de gestión de la solicitud */
		$link_gestion_solicitud	=	sprintf(
										'<a href="%sindex.php?idcategoria=%s&solicitud_id=%s">click aquí</a>',
										_URL,_GESTION_PQR,$solicitud_id);

		/* Crea el mensaje que se enviara al adiminstrador del sistema*/
		$mensaje_administrador='PQR No.    '.$solicitud_id.' ('.$nombre_tipo_solicitud.') creado el '.$timestamp.' con la siguiente información: '.$eof.$eof.
				'<b>Nombre:</b>            '.$nombre.$eof.
				'<b>Tipo de documento:</b> '.$nombre_tipo_identificacion.$eof.
				'<b>Número documento:</b>  '.$numero_identificacion.$eof.
				'<b>Direccion:</b>         '.$direccion.$eof.
				'<b>Telefono:</b>          '.$telefono.$eof.
				'<b>Celular:</b>           '.$celular.$eof.
				'<b>Correo electrónico:</b>'.$email.$eof.
				'<b>Ubicación:</b>         '.$miga_ubicacion.$eof.
				'<b>Medio de recepcion:</b>'.$nombre_medio_recepcion.$eof.
				'<b>Tipo de solicitud:</b> '.$nombre_tipo_solicitud.$eof.
				'<b>Dependencia:</b>       '.$miga_dependencia.$eof.
				'<b>Asunto:</b>            '.$miga_asunto.$eof.
				'<b>Solicitud:</b>         '.$solicitud.$eof.
				$resumen_correo.$eof.
				$documentos_email.$eof.$eof.
				'Para gestionar esta solicitud debe tener una sesión activa en el portal'.$eof.
				'y hacer '.$link_gestion_solicitud;

		/* Si el usuario que hace la solicitud no esta registrado en el portal se le entrega
		 * el código hash de la solicitud para consultar el estado de la misma */
		if($usuario_registrado!='ok'){
			$msg_consulta_hash='El código para consultar el estado de su solicitud es <b><h3>'.$hash.'</h3></b>';
		}else{
			$msg_consulta_hash='';
		}
		/* Crea el mensaje que se enviara al usuario*/
		$mensaje_usuario='PQR No. '.$solicitud_id.' ('.$nombre_tipo_solicitud.') creado el '.$timestamp.' con la siguiente información: '.$eof.$eof.
				'<b>Nombre:</b>             '.$nombre.$eof.
				'<b>Tipo de documento:</b>  '.$nombre_tipo_identificacion.$eof.
				'<b>Número documento:</b>   '.$numero_identificacion.$eof.
				'<b>Direccion:</b>          '.$direccion.$eof.
				'<b>Telefono:</b>           '.$telefono.$eof.
				'<b>Celular:</b>            '.$celular.$eof.
				'<b>Correo electrónico:</b> '.$email.$eof.
				'<b>Ubicación:</b>          '.$miga_ubicacion.$eof.
				'<b>Medio de recepcion:</b> '.$nombre_medio_recepcion.$eof.
				'<b>Tipo de solicitud:</b>  '.$nombre_tipo_solicitud.$eof.
				'<b>Dependencia:</b>        '.$miga_dependencia.$eof.
				'<b>Asunto:</b>             '.$miga_asunto.$eof.
				'<b>Solicitud:</b>          '.$solicitud.$eof.
				$resumen_correo.$eof.
				$documentos_email.$eof.$eof.
				'Su solicitud ha sido recibida y esta siendo tramitada'.$eof.
				$msg_consulta_hash.
				'Gracias por comunicarse con nosotros'.$eof.$eof.
				'Recuerde siempre puede consultar el estado de sus solicitudes en la seccion PQR del portal';
		/* Envia el correo al responsable de gestionar el sistema de PQR*/
		if(Funciones::microsmail($destinatario_correo,$asunto_correo,$mensaje_administrador)){
			if($email!=''){
				/* si el usuario registro un correo electrónico le envía un correo con la información de la solicitud */
				Funciones::microsmail($email,$asunto_correo,$mensaje_usuario);
			}
			if($dependencia_correo!=''){
				/* Si la dependencia tiene un correo asociado se le envía un correo con la solicitud */
				Funciones::microsmail($dependencia_correo,$asunto_correo,$mensaje_administrador);
			}
		}
	}

	/* Crea el mensaje de respuesta para el usuario según el resultado de la transacción */
	if ($continuar == 'ok') {
		$msg_respuesta = 'Su '.$nombre_tipo_solicitud.' se registro satisfactoriamente<br>'.$msg_consulta_hash;
	} else {
		$msg_respuesta = 'Se presento un error, por favor intente más tarde';
	}
}
else{
	$continuar='no';
}

							/** PASO DE VARIABLES A LA PLANTILLA DE SMARTY **/
/* Se crea una nueva instancia de Smarty */
$smarty = new Smarty_Plantilla();

/* Asigna a una variable la ruta de la hoja de estilos */
$smarty->assign('DIRCSS'	, _DIRCSS);

/* Asigna a una variable la ruta de los archivos de funciones javascript */
$smarty->assign('DIRJS'		, _DIRJS);

/* Asigna el contenido de los titulos, textos y etiquetas */
$smarty->assign('lb_titulo_formulario'				,'SISTEMA DE PETICIONES, QUEJAS Y RECLAMOS');
$smarty->assign('lb_titulo_datos_personales'		,'Datos personales');
$smarty->assign('lb_titulo_info_solicitud'			,'Información de la solicitud');
$smarty->assign('lb_titulo_confirmacion'			,'Confirme su solicitud');

$smarty->assign('lb_introduccion_formulario'		, $texto_introduccion);

$smarty->assign('lb_nombre'							,'Nombre completo');
$smarty->assign('lb_tipo_persona'					,'Tipo de persona');
$smarty->assign('lb_tipo_identificacion'			,'Tipo de documento');
$smarty->assign('lb_numero_identificacion'			,'Número documento');
$smarty->assign('lb_direccion'						,'Dirección');
$smarty->assign('lb_telefono'						,'Telefono');
$smarty->assign('lb_celular'						,'Celular');
$smarty->assign('lb_email'							,'Correo electrónico');
$smarty->assign('lb_ubicacion'						,'Ubicación');

$smarty->assign('lb_estado'							,'Estado de la solicitud');
$smarty->assign('lb_medio_recepcion'				,'Medio de recepción');
$smarty->assign('lb_tipo_solicitud'					,'Tipo de solicitud');
$smarty->assign('lb_dependencia'					,'Dependencia');
$smarty->assign('lb_asunto'							,'Asunto');
$smarty->assign('lb_solicitud'						,'Solicitud');
$smarty->assign('lb_resumen'						,'Resumen');

$smarty->assign('lb_lista_documentos'				,'Documentos anexos');
$smarty->assign('lb_archivos'						,'Archivos a Subir');
$smarty->assign('lb_lk_subir_mas'					,'Subir otro archivo');
$smarty->assign('lb_adjuntar_advertencia'			,'El tamaño máximo para cada archivo es de '.$archivo_max_size_hr);

$smarty->assign('lb_confirmacion_codigo'			,'Escriba el código aquí');

$smarty->assign('btn_lb_enviar'						,'Enviar solicitud');

/* Asigna las opciones de las listas de selección */
$smarty->assign('select_tipo_persona'				,$select_originador);
$smarty->assign('select_tipo_identificacion'		,$select_tipo_identificacion);
$smarty->assign('select_tipo_solicitud'				,$select_tipo_solicitud);
$smarty->assign('select_medio_recepcion'			,$select_medio_recepcion);
$smarty->assign('select_estado'						,$select_estado);

/* Asigna los arreglos con los select dependientes */
$smarty->assign('select_region'						,$select_region);
$smarty->assign('select_asunto'						,$select_asunto);
$smarty->assign('select_dependencia'				,$select_dependencia);

/* Asigna los links que no son manejados por el porta */
$smarty->assign('link_menu_administracion'			,$link_menu_administracion);

/* Valores de los campos del formulario */
$smarty->assign('nombre'							,$nombre);
$smarty->assign('region'							,$region);
$smarty->assign('asunto'							,$asunto);
$smarty->assign('tipo_persona'						,$tipo_persona);
$smarty->assign('tipo_identificacion'				,$tipo_identificacion);
$smarty->assign('numero_identificacion'				,$numero_identificacion);
$smarty->assign('digito_verificacion'				,$digito_verificacion);
$smarty->assign('digito_verificacion_visibility'	,$digito_verificacion_visibility);
$smarty->assign('direccion'							,$direccion);
$smarty->assign('telefono'							,$telefono);
$smarty->assign('celular'							,$celular);
$smarty->assign('email'								,$email);
$smarty->assign('estado'							,$estado);
$smarty->assign('medio_recepcion'					,$medio_recepcion);
$smarty->assign('tipo_solicitud'					,$tipo_solicitud);
$smarty->assign('dependencia'						,$dependencia);
$smarty->assign('solicitud'							,$solicitud);
$smarty->assign('resumen'							,$resumen);

/* Resultado de la validación */
$smarty->assign('errores'							,$errores);
$smarty->assign('numeroErrores'						,$numeroErrores);
$smarty->assign('continuar'							,$continuar);

/* Resultado de la inserción */
$smarty->assign('msg_respuesta'						,$msg_respuesta);

/* Código html de las solicitudes */
$smarty->assign('solicitudes_html'					,$solicitudes_html);
$smarty->assign('esta_pagina'						,_URL.'index.php?idcategoria='.$idcategoria);
$smarty->assign('ver_solicitudes'					,$ver_solicitudes);

/* Asigna los valores de las banderas */
$smarty->assign('flg_enviar'						,$enviar);
$smarty->assign('flg_originador_visible'			,$flg_originador_visible);
$smarty->assign('flg_estado'						,$flg_estado);
$smarty->assign('flg_medio_recepcion'				,$flg_medio_recepcion);
$smarty->assign('flg_resumen'						,$flg_resumen);
$smarty->assign('flg_hash'							,$flg_hash);
$smarty->assign('flg_disabled_nombre'				,$flg_disabled_nombre);
$smarty->assign('flg_disabled_direccion'			,$flg_disabled_direccion);
$smarty->assign('flg_disabled_telefono'				,$flg_disabled_telefono);
$smarty->assign('flg_disabled_email'				,$flg_disabled_email);
$smarty->assign('flg_usuario_registrado'			,$usuario_registrado);
$smarty->assign('flg_administrador_pqr'				,$administrador_pqr);

/* Se usa fetch cuando esta en el portal */
$resultado_pagina=$smarty->fetch('tpl_formulario_registro_pqr.html');

/* Devuelve el resultado */
return $resultado_pagina;
?>
