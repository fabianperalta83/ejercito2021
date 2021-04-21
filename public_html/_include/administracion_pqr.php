<?php

require_once(_DIRLIB.'pqr/funciones_pqr.php');
require_once(_DIRLIB.'smarty/libs/Smarty.class.php');

/* PRIMERA PARTE DE LA GESTI脫N DE PQR - LISTADO DE SOLICITUDES */

							/** SOLICITUD DE ARCHIVOS REQUERIDOS **/

/* Incluye la clase de validaciones y de funciones */
require_once(_DIRCORE.'Validacion.class.php');
require_once(_DIRCORE.'Funciones.class.php');
require_once(_DIRLIB.'pqr/Solicitante.class.php');
require_once(_DIRLIB.'pqr/Solicitud.class.php');
require_once(_DIRLIB.'pqr/Transaccion.class.php');
require_once(_DIRLIB_ADMIN.'Usuario.class.php');

							/** VARIABLES GLOBALES **/
/* Hace disponible la conexi贸n a la base de datos */
global $db;
							/** CONFIGURACION DEL FORMULARIO **/

/* Indica si el usuario esta registrado */
$usuario_registrado='ok';

/* Arreglo que indica las opciones del submen煤 */
$opciones_submenu[0]['valor']='medios';
$opciones_submenu[1]['valor']='estados';
$opciones_submenu[2]['valor']='originador';
$opciones_submenu[3]['valor']='tipo';
$opciones_submenu[4]['valor']='tipo_identificacion';
$opciones_submenu[5]['valor']='tipo_documentos';
$opciones_submenu[6]['valor']='regiones';
$opciones_submenu[7]['valor']='asuntos';
$opciones_submenu[8]['valor']='dependencias';

$opciones_submenu[0]['nombre']='Medios';
$opciones_submenu[1]['nombre']='Estados';
$opciones_submenu[2]['nombre']='Originador';
$opciones_submenu[3]['nombre']='Tipo Solicitud';
$opciones_submenu[4]['nombre']='Tipo Identificaci贸n';
$opciones_submenu[5]['nombre']='Tipo Documentos';
$opciones_submenu[6]['nombre']='Regiones';
$opciones_submenu[7]['nombre']='Asuntos';
$opciones_submenu[8]['nombre']='Dependencias';

/* Define el texto que se muestra como introducci贸n del formulario */
$texto_introduccion='<div>Formulario de administraci&oacute;n de solicitudes, por favor seleccione la solicitud que desea gestionar</div>';

/* Definici贸n de la profundidad de los select de ubicacion, asunto y dependencia
 * Este valor se refleja en la cantidad de selects que quedan disponibles para
 * hacer la selecci贸n de cada uno de estos.
 * La profundidad m谩xima permitida es 5.*/

$region_profundidad			=	4;
$asunto_profundidad			=	4;
$dependencia_profundidad	=	4;

							/** DECLARACI脫N E INICIALIZACI脫N DE VARIABLES **/

/* Crea el arreglo que almacena los errores que se presentan */
$errores=array();

/* Crea el arreglo que almacena la lista de elementos que se
 * mostrar谩n */
$lista=array();

/* Crea el arreglo que almacena los select dependientes que
 * pueden ser de region, asunto o dependencia */
$select_dependiente=array();

/* Crea la variable que almacena el mensaje de respuesta al usuario
 * cuando ha efectuado alguna operaci贸n */
$msg_respuesta='';

/* Crea la variable que contiene la etiqueta de los campos con jerarquia */
$lb_nombre='';

/* Incializa las variables de sesi贸n que se usaran */
if(!isset($_SESSION['pqr']['form'])){
	$_SESSION['pqr']['form']='';
}
if(!isset($_SESSION['region'])){
	$_SESSION['region']=array();
	$_SESSION['region'][0]=0;
}
if(!isset($_SESSION['asunto'])){
	$_SESSION['asunto']=array();
	$_SESSION['asunto'][0]=0;
}
if(!isset($_SESSION['dependencia'])){
	$_SESSION['dependencia']=array();
	$_SESSION['dependencia'][0]=0;
}

/* crea una marca de tiempo para */
$timestamp = date('Y-m-d H:i:s');

/* Define los nombres de los input para los select dependientes, para adicionar niveles al select
 * se deben adicionar en la variable de profundidad de cada uno y en los arreglos en el archivo de
 * funciones de javascript de la aplicaci贸n */

for($i=0;$i<$region_profundidad;$i++){
	$select_region_nombre[$i]		=	'ubicacion_n'.($i+1);
}

for($i=0;$i<$asunto_profundidad;$i++){
	$select_asunto_nombre[$i]		=	'asunto_n'.($i+1);
}

for($i=0;$i<$dependencia_profundidad;$i++){
	$select_dependencia_nombre[$i]	=	'dependencia_n'.($i+1);
}

							/** CAPTURA DE LA INFORMACI脫N ENVIADA POR EL USUARIO **/

/* Verifica si el usuario selecciono una regi贸n
 * y determina el identificador de la regi贸n seleccionada */
if(isset($_POST['form_accion']) || isset($_POST['accion']) || !isset($_SESSION['region']['actual'])){
	$numero_selects=$region_profundidad;
	$_SESSION['region']['actual']=0;

	/* Obtiene el identificador de la regi贸n seleccionada */
	while($_SESSION['region']['actual']==0 && $numero_selects>0){
		$_SESSION['region']['actual']=getVariable($select_region_nombre[$numero_selects-1],0);
		$numero_selects--;
	}

	/* Asigna en variables de sesi贸n la selecci贸n de cada select de
	 * regi贸n */
	for($i=0;$i<$region_profundidad;$i++){
		$_SESSION['region'][$i]=getVariable($select_region_nombre[$i],0);
	}
}

/* Verifica si el usuario selecciono un asunto
 * y determina el identificador del asunto seleccionado */
if(isset($_POST['seleccionar_asunto']) || isset($_POST['accion']) || !isset($_SESSION['asunto']['actual'])){
	$numero_selects=$asunto_profundidad;
	$_SESSION['asunto']['actual']=0;

	while($_SESSION['asunto']['actual']==0 && $numero_selects>0){
		$_SESSION['asunto']['actual']=getVariable($select_asunto_nombre[$numero_selects-1],0);
		$numero_selects--;
	}
	/* Asigna en variables de sesi贸n la selecci贸n de cada select de
	 * asunto */
	for($i=0;$i<$asunto_profundidad;$i++){
		$_SESSION['asunto'][$i]=getVariable($select_asunto_nombre[$i],0);
	}
}

/* Verifica si el usuario selecciono una dependencia
 * y determina el identificador de la dependencia seleccionada */
if(isset($_POST['seleccionar_dependencia']) || isset($_POST['accion']) || !isset($_SESSION['dependencia']['actual'])){
	$numero_selects=$dependencia_profundidad;
	$_SESSION['dependencia']['actual']=0;
	while($_SESSION['dependencia']['actual']==0 && $numero_selects>0){
		$_SESSION['dependencia']['actual']=getVariable($select_dependencia_nombre[$numero_selects-1],0);
		$numero_selects--;
	}
	/* Asigna en variables de sesi贸n la selecci贸n de cada select de
	 * dependencia */
	for($i=0;$i<$dependencia_profundidad;$i++){
		$_SESSION['dependencia'][$i]=getVariable($select_dependencia_nombre[$i],0);
	}
}

/* Verifica si se envi贸 el formulario que registra los cambios */

$id				=	Autenticacion::secureSQL(getVariable('id',0),'');
$nombre			=	Autenticacion::secureSQL(getVariable('nombre',''),'');
$sigla			=	Autenticacion::secureSQL(getVariable('sigla',''),'');
$descripcion	=	Autenticacion::secureSQL(getVariable('descripcion',''),'');
$usuario		=	Autenticacion::secureSQL(getVariable('filtro_nombre',''),'');	/* Solo se usa para la dependencia */
$form			=	Autenticacion::secureSQL(getVariable('form',''),'');
$form_accion	=	getVariable('form_accion','Crear');
$accion			=	getVariable('accion','');

/* Si se selecciono una opcion para editar, la almacena en una
 * variable de sesi贸n */
if($form!=''){
	$_SESSION['pqr']['form']=$form;
}

/* Determina si el formulario fue enviado */
if(isset($_POST['form_accion'])){
	$enviar='ok';
}
else{
	$enviar='no';
}
							/** OBTIENE LOS NOMBRES DESCRIPTIVOS DE LOS ELEMENTOS SELECCIONADOS POR EL USUARIO **/

							/** VALIDACI脫N DE LA INFORMACI脫N INGRESADA POR EL USUARIO EN EL FORMULARIO **/

/* V谩lida que el usuario este registrado, si no lo est谩 termina el programa */
if($usuario_registrado=='no'){
	/*die('Acceso no autorizado');*/
}

/* Valida que el nombre sea texto v谩lido y que el campo no este vacio */
if (!Validacion :: isTexto($nombre, TRUE)) {
	if(Validacion :: isEmpty($nombre)){
		array_push($errores, 'Por favor digite un nombre');
	}
	else{
		array_push($errores, 'Por favor revise el nombre, recuerde que solo debe tener letras.');
	}
}

/* Valida que las siglas sean texto v谩lido o que el campo este vacio */
if (!Validacion :: isTexto($sigla, FALSE) && !Validacion :: isEmpty($sigla)) {
	array_push($errores, 'Por favor revise las siglas, recuerde que solo deben tener letras.');
}

/* Valida que la descripci贸n sea texto v谩lido y que el campo no este vacio */
if (!Validacion :: isTexto($descripcion, FALSE) && !Validacion :: isEmpty($descripcion)) {
	array_push($errores, 'Por favor revise la descripci贸n, recuerde que solo debe tener letras.');
}

/* Cuando se ingresa un n煤mero de identificaci贸n de un usuario responsable de una dependencia
 * se verifica que el usuario exista y se crea un objeto tipo usuario para hacer el manejo del mismo */
if(!Validacion :: isEmpty($usuario)){
	if(Validacion :: isNum($usuario)){
		$usuarioDependencia = new Usuario();
		if($usuarioDependencia->cargar($usuario)==FALSE){
			array_push($errores, 'Por favor revise la identificaci贸n del usuario, el usuario indicado no existe)');
		}
	}
	else{
		array_push($errores, 'Por favor revise la identificaci贸n del usuario (solo n煤meros)');
	}
}

							/** PROCESAMIENTO DE LA INFORMACION **/

/* asignacion de valores a la variables segun el tipo de formulario
 * El tipo indica el tipo de formulario que se debe mostrar seg煤n los
 * campos de la tabla, p.e. el tipo 1 incluye el campo sigla, los tipo 2
 * solo tienen nombre y descripcion y los tipo 3 tienen jerarquia. */

switch($_SESSION['pqr']['form']){
	case 'medios':
		$tabla				= _TBL_PQR_MEDIO;
		$campo_id			= 'medio_id';
		$campo_nombre		= 'medio_nombre';
		$campo_sigla		= 'medio_sigla';
		$campo_descripcion	= 'medio_descripcion';
		$tipo				= 1;
		break;
	case 'estados':
		$tabla				= _TBL_PQR_ESTADO;
		$campo_id			= 'estado_id';
		$campo_nombre		= 'estado_nombre';
		$campo_sigla		= 'estado_sigla';
		$campo_descripcion	= 'estado_descripcion';
		$tipo				= 1;
		break;
	case 'originador':
		$tabla				= _TBL_PQR_ORIGINADOR;
		$campo_id			= 'originador_id';
		$campo_nombre		= 'originador_nombre';
		$campo_sigla		= 'originador_sigla';
		$campo_descripcion	= 'originador_descripcion';
		$tipo				= 1;
		break;
	case 'tipo':
		$tabla				=_TBL_PQR_TIPO;
		$campo_id			='tipo_id';
		$campo_nombre		='tipo_nombre';
		$campo_sigla		='';
		$campo_descripcion	='tipo_descripcion';
		$tipo				= 2;
		break;
	case 'tipo_identificacion':
		$tabla				= _TBL_PQR_TIPOIDENTIFICACION;
		$campo_id			= 'tipo_identificacion_id';
		$campo_nombre		= 'tipo_identificacion_nombre';
		$campo_sigla		= '';
		$campo_descripcion	= 'tipo_identificacion_descripcion';
		$tipo				= 2;
		break;
	case 'tipo_documentos':
		$tabla				=_TBL_PQR_TIPODOCUMENTO;
		$campo_id			= 'tipo_documento_id';
		$campo_nombre		= 'tipo_documento_nombre';
		$campo_sigla		= '';
		$campo_descripcion	= 'tipo_documento_descripcion';
		$tipo				= 2;
		break;
	case 'regiones':
		$tabla				= _TBL_PQR_REGION;
		$campo_id			= 'region_id';
		$campo_id_padre		= 'region_id_padre';
		$campo_nombre		= 'region_nombre';
		$campo_sigla		= '';
		$campo_descripcion	= 'region_descripcion';
		$actual				= $_SESSION['region']['actual'];
		$lb_nombre			= 'una regi&oacute;n';

		/* Crea los select de la ubicaci贸n */
		$cantidad_selects	= $region_profundidad;
		$nivel				= 0;
		for($i=0;$i<$cantidad_selects;$i++){
			if($i>0 && $nivel==0){
				$select_dependiente[$i]='<select disabled="disabled" id="'.$select_region_nombre[$i].'">
											<option value="0">Seleccione...</option>
										</select>';
			}
			else{
				$nivel_seleccionado		= $_SESSION['region'][$i];
				$select_dependiente[$i] = genera_select_dependiente($nivel, $select_region_nombre[$i], $tabla, $campo_id, $campo_nombre, $campo_id_padre, $nivel_seleccionado);
				$nivel					= $nivel_seleccionado;
			}
		}
		$tipo=3;
		break;
	case 'asuntos':
		$tabla				= _TBL_PQR_ASUNTO;
		$campo_id			= 'asunto_id';
		$campo_id_padre		= 'asunto_id_padre';
		$campo_nombre		= 'asunto_nombre';
		$campo_sigla		= '';
		$campo_descripcion	= 'asunto_descripcion';
		$actual				= $_SESSION['asunto']['actual'];
		$lb_nombre			= 'un asunto';

		/* Crea los select de la ubicaci贸n */
		$cantidad_selects	= $asunto_profundidad;
		$nivel				= 0;
		for($i=0;$i<$cantidad_selects;$i++){
			if($i>0 && $nivel==0){
				$select_dependiente[$i]='<select disabled="disabled" id="'.$select_asunto_nombre[$i].'">
											<option value="0">Seleccione...</option>
										</select>';
			}
			else{
				$nivel_seleccionado		= $_SESSION['asunto'][$i];
				$select_dependiente[$i] = genera_select_dependiente($nivel, $select_asunto_nombre[$i], $tabla, $campo_id, $campo_nombre, $campo_id_padre, $nivel_seleccionado);
				$nivel					= $nivel_seleccionado;
			}
		}
		$tipo=3;
		break;
	case 'dependencias':
		$tabla				= _TBL_PQR_DEPENDENCIA;
		$campo_id			= 'dependencia_id';
		$campo_id_padre		= 'dependencia_id_padre';
		$campo_nombre		= 'dependencia_nombre';
		$campo_sigla		= '';
		$campo_descripcion	= 'dependencia_descripcion';
		$actual				= $_SESSION['dependencia']['actual'];
		$lb_nombre			= 'una dependencia';

		/* Crea los select de la ubicaci贸n */
		$cantidad_selects	= $dependencia_profundidad;
		$nivel				= 0;
		for($i = 0;$i<$cantidad_selects;$i++){
			if($i>0 && $nivel==0){
				$select_dependiente[$i] = '<select disabled="disabled" id="'.$select_dependencia_nombre[$i].'">
											<option value="0">Seleccione...</option>
										</select>';
			}
			else{
				$nivel_seleccionado		= $_SESSION['dependencia'][$i];
				$select_dependiente[$i] = genera_select_dependiente($nivel, $select_dependencia_nombre[$i], $tabla, $campo_id, $campo_nombre, $campo_id_padre, $nivel_seleccionado);
				$nivel					= $nivel_seleccionado;
			}
		}
		$tipo=3;
		break;
	default:
		$tabla				= _TBL_PQR_MEDIO;
		$campo_id			= 'medio_id';
		$campo_nombre		= 'medio_nombre';
		$campo_sigla		= 'medio_sigla';
		$campo_descripcion	= 'medio_descripcion';
		$tipo				= 1;
}

/* Verifica si se selecciono hacer la eliminaci贸n (accion = 1)
 * o modificaci贸n (accion = 2) de un item */

/** ELIMINACI脫N DE REGISTRO **/
if($accion==1){
	/* Se crea la sentencia de eliminacion */
	// Cambio # 1
	$sql_update=$db->prepare(
		'UPDATE ? ' .
		'SET modificacion= "'.$timestamp.'",eliminado=1 ' .
		'WHERE ? = ?',);
	/* Se ejecuta la sentencia de eliminaci髇 */
	$db->Execute($sql_update, array($tabla, $campo_id, $id));

}
elseif($accion==2){
/** MODIFICACI脫N DE REGISTRO **/

	/* Consulta la informaci贸n del item seleccionado para ser editado */
	if($tipo==1){
		/* Crea la consulta */
		// Cambio # 2
		$sql_consulta=$db->prepare(
			'SELECT ? as nombre, ? as sigla, ? as descripcion ' .
			'FROM ? ' .
			'WHERE eliminado=0 and ?=?');
		/* Ejecuta la consulta */
		$resultado_consulta=$db->Execute($sql_consulta, array($campo_nombre,$campo_sigla,$campo_descripcion,$tabla,$campo_id,$id));

		/* Obtiene los resultados */
		if($resultado_consulta){
			if($resultado_consulta->NumRows()==1){
				$nombre			= $resultado_consulta->fields['nombre'];
				$sigla			= $resultado_consulta->fields['sigla'];
				$descripcion	= $resultado_consulta->fields['descripcion'];
				$form_accion	= 'Modificar';
			}
		}
	}
	elseif($tipo==2){

		/* Crea la consulta */
		// Cambio # 3
		$sql_consulta=$db->prepare(
			'SELECT ? as nombre, ? as descripcion ' .
			'FROM ? ' .
			'WHERE eliminado=0 and ? = ?');
			/* Ejecuta la consulta */
		$resultado_consulta=$db->Execute($sql_consulta, array($campo_nombre,$campo_descripcion,$tabla,$campo_id,$id));

		/* Obtiene los resultados */
		if($resultado_consulta){
			if($resultado_consulta->NumRows()==1){
				$nombre			= $resultado_consulta->fields['nombre'];
				$descripcion	= $resultado_consulta->fields['descripcion'];
				$form_accion	= 'Modificar';
			}
		}
	}
	elseif($tipo==3){

		/* Crea la consulta */
		// Cambio # 4
		$sql_consulta=$db->prepare(
			'SELECT ? as nombre, ? as padre, ? as descripcion ' .
			'FROM ? ' .
			'WHERE eliminado=0 and ?=?');

		/* Ejecuta la consulta */
		$resultado_consulta=$db->Execute($sql_consulta, array($campo_nombre,$campo_id_padre, $campo_descripcion,$tabla,$campo_id,$id));

		/* Obtiene los resultados */
		if($resultado_consulta){
			if($resultado_consulta->NumRows()==1){
				$nombre			= $resultado_consulta->fields['nombre'];
				$descripcion	= $resultado_consulta->fields['descripcion'];
				$form_accion	= 'Modificar';
			}
		}

		/* Si se va a modificar una dependendencia se consulta tambi茅n el usuario
		 * relacionado con ella. */
		if($tabla==_TBL_PQR_DEPENDENCIA){
			/* Crea la consulta a la tabla de relaci髇 de dependencia y usuario */
			// Cambio # 5
			$sql_consulta_usuario = $db->prepare('SELECT idusuario FROM '._TBL_PQR_REL_DEPENDENCIA_USUARIO.' WHERE dependencia_id= ? and encargado=1');

			/* Ejecuta la consulta */
			$resultado_consulta_usuario = $db->Execute($sql_consulta_usuario, array($id));

			/* Obtiene los resultados */
			if($resultado_consulta_usuario){
				if($resultado_consulta_usuario->NumRows()>0){
					$usuario = $resultado_consulta_usuario->fields['idusuario'];
				}
			}
		}
	}
}

/** CREACI脫N O MODIFICACI脫N DE UN REGISTRO **/

/* Si no se presentaron errores en el ingreso de informaci贸n
 * se ejecuta el proceso de creaci贸n o modificaci贸n */

$numero_errores=count($errores);
if($numero_errores==0 && isset($_POST['form_accion'])){

	/* Si no se presentaron errores en el ingreso de la informaci贸n se generan
	 * los valores de sigla y descripci贸n que no se hayan ingresado */
	if(empty($sigla)){
		$nombre_partes = explode(' ',$nombre);
		foreach($nombre_partes as $parte){
			$sigla.=strtoupper($parte{0});
		}
	}
	if(empty($descripcion)){
		$descripcion=$nombre;
	}

	/** PROCESO DE CREACI脫N **/

	/* Si se envi贸 el formulario de creaci贸n se inserta el registro
	 * nuevo en la base de datos */
	if($form_accion=='Crear'){
		/* Verifica el tipo de registro que se debe insertar */
		if($tipo==1){
			/* crea la sentencia de inserci贸n */
			$sql_crea=sprintf(
				'INSERT INTO %s (%s,%s,%s,creacion,modificacion)' .
				'values ("%s","%s","%s","%s","%s")',
				$tabla,
				$campo_nombre,
				$campo_sigla,
				$campo_descripcion,
				$nombre,
				$sigla,
				$descripcion,
				$timestamp,
				$timestamp);
		}
		elseif($tipo==2){
			/* crea la sentencia de inserci贸n */
			$sql_crea=sprintf(
				'INSERT INTO %s (%s,%s,creacion,modificacion) ' .
				'values ("%s","%s","%s","%s")',
				$tabla,
				$campo_nombre,
				$campo_descripcion,
				$nombre,
				$descripcion,
				$timestamp,
				$timestamp);
		}
		elseif($tipo==3){
			/* crea la sentencia de inserci贸n */
			$sql_crea=sprintf(
				'INSERT INTO %s (%s,%s,%s,creacion,modificacion) ' .
				'values ("%s","%s","%s","%s","%s")',
				$tabla,
				$campo_id_padre,
				$campo_nombre,
				$campo_descripcion,
				$actual,
				$nombre,
				$descripcion,
				$timestamp,
				$timestamp);
		}

		/* Ejecuta la inserci贸n */
		if($db->Execute($sql_crea)){

			/* Obtiene el identificador de la dependencia */
			$dependencia_id=$db->Insert_ID();

			/* Si se va a crear una dependendencia se crea tambi茅n la relacion entre
			 * usuario y dependencia */
			if($tabla==_TBL_PQR_DEPENDENCIA){
				/* Asigna un valor por defecto al usuario */
				if($usuario==''){
					$usuario=1;
				}

				/* Crea la sentencia de inserci髇 de relaci髇 de dependencia y usuario */
				// Cambio # 6
				$sql_inserta_relacion = $db->prepare('INSERT INTO '._TBL_PQR_REL_DEPENDENCIA_USUARIO.' (dependencia_id, idusuario, encargado) values (?,?,?)');
				/* Ejecuta la consulta */
				if (!$db->Execute($sql_inserta_relacion, array($dependencia_id, $usuario, 1))){
					echo 'Error al insertar la relaci髇 entre el usuario y la dependencia';

				}
			}

			/* Limpia las variables */
			$nombre			= '';
			$sigla			= '';
			$descripcion	= '';
			$usuario		= '';
		}
	}
	elseif($form_accion=='Modificar'){

	/** PROCESO DE MODIFICACI脫N **/

 		/* Verifica el tipo de registro que se debe insertar */
 		if($tipo==1){
  		/* crea la sentencia de actualizaci贸n */
		$sql_actualiza=sprintf(
			'UPDATE %s ' .
			'SET %s="%s", %s="%s", %s="%s",modificacion="%s" ' .
			'WHERE %s=%s',
			$tabla,
			$campo_nombre,
			$nombre,
			$campo_sigla,
			$sigla,
			$campo_descripcion,
			$descripcion,
			$timestamp,
			$campo_id,
			$id);
 		}
		elseif($tipo==2){
  		/* crea la sentencia de actualizaci贸n */
		$sql_actualiza=sprintf(
			'UPDATE %s ' .
			'SET %s="%s", %s="%s",modificacion="%s" ' .
			'WHERE %s=%s',
			$tabla,
			$campo_nombre,
			$nombre,
			$campo_descripcion,
			$descripcion,
			$timestamp,
			$campo_id,
			$id);
		}
		elseif($tipo==3){
  		/* crea la sentencia de actualizaci贸n */
		$sql_actualiza=sprintf(
			'UPDATE %s ' .
			'SET %s="%s", %s="%s",modificacion="%s" ' .
			'WHERE %s=%s',
			$tabla,
			$campo_nombre,
			$nombre,
			$campo_descripcion,
			$descripcion,
			$timestamp,
			$campo_id,
			$id);
		}

		/* ejecuta la sentencia de actualizaci贸n */
		if($db->Execute($sql_actualiza)){

			/* Si se va a actualizar una dependendencia se actualiza tambi茅n la relacion entre
			 * usuario y dependencia */
			if($tabla==_TBL_PQR_DEPENDENCIA && $usuario!=''){
				// Cambio # 7
				/* Crea la sentencia de inserci髇 de relaci髇 de dependencia y usuario */
				$sql_actualiza_relacion = $db->prepare('UPDATE '._TBL_PQR_REL_DEPENDENCIA_USUARIO.' SET idusuario= ? WHERE dependencia_id= ? AND encargado= ?');
				/* Ejecuta la consulta */
				if (!$db->Execute($sql_actualiza_relacion, array($usuario, $id, 1)))
				{
					echo 'Error al actualizar la relaci髇 entre el usuario y la dependencia';

				}
			}

			$nombre			= '';
			$sigla			= '';
			$descripcion	= '';
			$id				= 0;
			$usuario		= '';
			$form_accion	= 'Crear';
		}
	}
}

/** CONSULTA DE VALORES REGISTRADOS EN LA BASE DE DATOS PARA EL TIPO DE FORMULARIO SELECCIONADO **/

/* Obtiene los registros correspondientes al formulario seleccionado */
/* Verifica el tipo de formulario */
if($tipo==1){
	/* Crea sentencia de consulta */
	// Cambio # 8
	$sql_consulta=$db->prepare('SELECT ? as id, ? as nombre, ? as sigla, ? as descripcion ' .
					'FROM ? ' .
					'WHERE eliminado=? ');
	/* Ejecuta la consulta en la base de datos */
	$resultado_consulta=$db->Execute($sql_consulta, array($campo_id,$campo_nombre,$campo_sigla,$campo_descripcion,$tabla, 0));

	/* Si la consulta se realiz贸 con 茅xito crea el arreglo
	 * con los resultados */
	if($resultado_consulta){
		$contador=0;
		while(!$resultado_consulta->EOF){
			$lista[$contador]['id']				= $resultado_consulta->fields['id'];
			$lista[$contador]['nombre']			= $resultado_consulta->fields['nombre'];
			$lista[$contador]['sigla']			= $resultado_consulta->fields['sigla'];
			$lista[$contador]['descripcion']	= $resultado_consulta->fields['descripcion'];
			$contador++;
			$resultado_consulta->MoveNext();
		}
	}
}
elseif($tipo==2){
	/* Crea sentencia de consulta */
	// Cambio # 9
	$sql_consulta= $db->prepare(
					'SELECT ? as id, ? as nombre, ? as descripcion ' .
					'FROM ? ' .
					'WHERE eliminado=? ');
	/* Ejecuta la consulta en la base de datos */
	$resultado_consulta=$db->Execute($sql_consulta, array($campo_id,$campo_nombre,$campo_descripcion,$tabla, 0));

	/* Si la consulta se realiz贸 con 茅xito crea el arreglo
	 * con los resultados */
	if($resultado_consulta){
		$contador=0;
		while(!$resultado_consulta->EOF){
			$lista[$contador]['id']				= $resultado_consulta->fields['id'];
			$lista[$contador]['nombre']			= $resultado_consulta->fields['nombre'];
			$lista[$contador]['descripcion']	= $resultado_consulta->fields['descripcion'];
			$contador++;
			$resultado_consulta->MoveNext();
		}
	}
}
elseif($tipo==3){
	/* Hace la consulta de la informaci髇 en la base de datos */
	// Cambio # 10
	$sql_consulta=$db->prepare(
		'SELECT ? as id, ? as nombre, ? as descripcion ' .
		'FROM ? ' .
		'WHERE eliminado=0 and ? = ?');

	/* Ejecuta la consulta */
	$resultado_consulta=$db->Execute($sql_consulta, array($campo_id, $campo_nombre, $campo_descripcion,$tabla,$campo_id_padre,$actual));

	/* Obtiene los resultados */
	$contador=0;
	if($resultado_consulta){
		while(!$resultado_consulta->EOF){
			$lista[$contador]['id']				= $resultado_consulta->fields['id'];
			$lista[$contador]['nombre']			= htmlentities($resultado_consulta->fields['nombre']);
			$lista[$contador]['descripcion']	= htmlentities($resultado_consulta->fields['descripcion']);
			$contador++;
			$resultado_consulta->MoveNext();
		}
	}

	/* Obtiene el usuario responsable de la dependencia, usualmente
	 * es un usuario del portal que representa la dependencia y
	 * tiene el correo electr贸nico de la dependenica */
	if($tabla==_TBL_PQR_DEPENDENCIA){
		$numero_dependencias=count($lista);
		for($i=0;$i<$numero_dependencias;$i++){
			/* Crea la sentencia que consulta la informaci贸n del usuario encargado
			 * de la dependencia */
			 // Cambio # 11
			$sql_consulta_encargado=$db->prepare(
										'SELECT u.idusuario, u.email ' .
										'FROM '._TBL_PQR_REL_DEPENDENCIA_USUARIO.' r, '._TBLUSUARIO.' u ' .
										'WHERE u.idusuario=r.idusuario and r.dependencia_id= '.$lista[$i]['id'].' and r.encargado=?');
			/* Ejecuta la consulta */
			$resultado_consulta_encargado=$db->Execute($sql_consulta_encargado, array(1));
			if($resultado_consulta_encargado){
				if($resultado_consulta_encargado->NumRows()==1){
					$lista[$i]['email']			= $resultado_consulta_encargado->fields['email'];
				}
			}
		}
	}
}

							/** PASO DE VARIABLES A LA PLANTILLA DE SMARTY **/
/* Se crea una nueva instancia de Smarty */
$smarty = new Smarty_Plantilla();

/* Asigna a una variable la ruta de la hoja de estilos */
$smarty->assign('DIRCSS', _DIRCSS);

/* Asigna a una variable la ruta de los archivos de funciones javascript */
$smarty->assign('DIRJS', _DIRJS);

/* Asigna a una variable la ruta de las im谩genes del administrador */
$smarty->assign('dir_admin_images', _URL.'_administracion/recursos/images/');

/* Pasa el valor de la constante _URL a smarty */
$smarty->assign('url_gestion',_URL.'?idcategoria='._GESTION_PQR);

/* Pasa la url de esta p谩gina */
$smarty->assign('esta_pagina',_URL.'?idcategoria='.$idcategoria);

/* Asigna el contenido de los titulos, textos y etiquetas */
$smarty->assign('lb_titulo_formulario', 'SISTEMA DE PETICIONES, QUEJAS Y RECLAMOS');
$smarty->assign('lb_titulo_gestion', 'Administraci贸n PQR');
$smarty->assign('lb_nombre',$lb_nombre);

$smarty->assign('lb_introduccion_formulario', $texto_introduccion);

/* Asigna las opciones del submenu */
$smarty->assign('opciones_submenu',$opciones_submenu);

/* Asigna las opciones de las listas de selecci贸n */

/* Asigna los arreglos con los select dependientes */

/* Valores de los campos del formulario */
$smarty->assign('id',$id);
$smarty->assign('nombre',$nombre);
$smarty->assign('sigla',$sigla);
$smarty->assign('descripcion',$descripcion);
$smarty->assign('filtro_nombre',$usuario);

$smarty->assign('lista',$lista);

/* Variable de control */
$smarty->assign('form',$_SESSION['pqr']['form']);

/* Asigna los select dependientes */

$smarty->assign('select_dependiente', $select_dependiente);

/* Asigna la acci贸n que se debe llevar a cabo */
$smarty->assign('form_accion',$form_accion);

/* Resultado de la validaci贸n */
$smarty->assign('errores', $errores);

/* Resultado de la inserci贸n */
$smarty->assign('msg_respuesta', $msg_respuesta);

/* Asigna los valores de las banderas */
$smarty->assign('flg_enviar', $enviar);

/* Asigna el tipo de formulario */
$smarty->assign('tipo',$tipo);

/* Se usa fetch cuando esta en el portal */
$resultado_pagina=$smarty->fetch('tpl_administracion_pqr.html');

return $resultado_pagina;
?>
