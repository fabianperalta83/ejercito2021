<?php

/**genera password aleatorio**/
function RandomPassword($longitud) {
	$posibles = '0123456789abcdefghijoklmnopqrstuvwxy';
	$str = "";
	while (strlen($str) < $longitud) {
		$str .= substr($posibles,(rand() % strlen($posibles)),1);
	}
	return ($str);
}
$estanya            = array();
$ingresados			= array();
$cont=0;
$cont1=0;
$row = 1;
$handle = fopen("recursos_user/usuarios_ejercito.csv", "r");// archivo que se va a migrar
$deli= ";";//indicamos el delimitador
while ($data = fgetcsv ($handle, 1000, "$deli"))//recorremos el archivo
{

	$num = count ($data);
	$username = "usu".$row;
	$password = "mic";
	$password_sha1 = sha1($username.$password);
	$password2 = $username.$password;


	if($data[2]=='')//comprobamos si viene el campo correo vacio
	{

		/*	echo"<br>estos correos son vacios<br>";
			echo $data[0];
			echo "<hr>";*/

			$data[2]= "sincorreo@notengo.com";//le asignamos un correo provisional
			$correo_nuevo = "sincorreo$row@notengo.com";


	}
	else
	{
		$correo_nuevo = $data[2];

	}

	if($data[2]== "sincorreo$row@notengo.com")
	{

		/*echo"<br>Modificados<br>";
			echo $data[0];
			echo "<hr>";*/


	}

	//$data[2] = strtolower ($data[2]);
//armo el correo
	$para = $data[2];
	$asunto= "Ingreso a la Asociaci&oacute;n  Colombiana de Ingenier&iacute;a S&acute;ismica";
	$mensaje  = sprintf("Datos para entrar a la secci&oacute;n restringida de la p&aacute;gina %s (%s)\n",_NOMBRESITIO,_URL);
	$mensaje .= sprintf("\t\tUsername : %s\n\n",$username);
	$mensaje .= sprintf("\t\tPassword : %s\n\n",$password);
	$mensaje .= "\t\tEl Password fue generado automaticamente. Por favor recuerde cambiarlo una vez haya ingresado \n\n";
	$p4 = "From:"."noresponder@casadelcontrolsocial.gov.co"."\r\nContent-Type:text/html";
	$p6 = "migracion.php";
	//echo "<hr>";
	//echo $mensaje;
	//Funciones :: microsmail($para,$asunto,$mensaje,$p4,$p6,$p7='');

	echo"<hr>";
	echo "<br>nombre  ;  ",$data[1];
	echo "; apellido ;  ",$data[0];
	echo "; correo ;  ",$data[2];
	echo "; usuario  ;",$username;
	echo "; password   ;",$password ;
	echo"<hr>";


	$query = sprintf("SELECT * FROM  %s WHERE email='%s'",_TBLUSUARIO,$correo_nuevo);//consulto si existe ese correo
	$r = $db->Execute($query) or errorQuery(__FILE__, __FILE__);

	if($r->NumRows() != 0)// si hay resultados actualizo los campos
	{


			$activo=1;
			$idzona=2;
			/*echo"<br>estos registros ya estan<br>";
			echo $r->fields['nombres'];
			echo "<hr>";*/


		$query3 = sprintf("UPDATE %s SET username='%s',password='%s',idzona='%s', nombres='%s',apellidos='%s',email='%s',activo='%s' WHERE idusuario=%s",_TBLUSUARIO,$username,$password_sha1,$idzona,$data[1],$data[0],$correo_nuevo,$activo,$r->fields['idusuario']);
		//$r3 = $db->Execute($query3) or errorQuery(__LINE__, __FILE__);
		//echo $query3;

		$tmp['nombres']				= $r->fields['nombres'];
		$tmp['apellidos']			= $r->fields['apellidos'];
		$tmp['correo']				= $r->fields['email'];





			$query9 = sprintf("SELECT * FROM  %s WHERE idusuario='%s' and idlista='%s'",_TBLDETALLELISTA,$r->fields['idusuario'],$data[5]);//verifico que no este asignado al grupo
			$r9 = $db->Execute($query9) or errorQuery(__FILE__, __FILE__);
			echo $query9;
			if($r9->NumRows() == 0)
			{

				$query7 =sprintf("INSERT INTO %s",_TBLDETALLELISTA);//si no hay resultados ingreso el usuario al grupo
				$query7	.= sprintf("(idusuario,idlista)");
				$query7	.= sprintf("VALUES");
				$query7	.= sprintf("('%s','%s')",
							$r->fields['idusuario'],
							$data[5]
									);
				$r7 = $db->Execute($query7) or errorQuery(__LINE__, __FILE__);
				$cont1++;
							echo $query7;
							//	echo "<hr>";

			}

			else
			{


				array_push($estanya,$tmp);
			}

				$cont++;
	}

	else
	{


			$activo=1;
			$idzona=2;


      		if($data[1] != '' and $data[0] != '')
            {


		      		$query4  = sprintf("INSERT INTO %s ",_TBLUSUARIO);//ingreso los usuarios que no existen
										$query4 .= sprintf("(username,password,idzona,nombres, apellidos,email,activo)");

										$query4 .= sprintf(" VALUES ");
										$query4 .= sprintf("('%s','%s','%s','%s','%s','%s','%s')",
															$username,
															$password_sha1,
															$idzona,
															$data[1],
															$data[0],
															$correo_nuevo,
															$activo

														);
										//$r4 = $db->Execute($query4) or errorQuery(__LINE__, __FILE__);
				//echo$query4;
				$ultimoid =	$db->Insert_ID();//tomo el ultimo id

				//guardo los que se ingresaron


				$tmp_arreglo['nombre']		 = $data[1];
				$tmp_arreglo['apellido']	 = $data[0];
				$tmp_arreglo['correo']		 = $correo_nuevo;
				$tmp_arreglo['username']	 = $username;
				$tmp_arreglo['password']	 = $password;
				array_push($ingresados,$tmp_arreglo);
				/*$query7 =sprintf("INSERT INTO %s ",_TBLDETALLELISTA);//ingreso el usuario al grupo
										$query7 .= sprintf("(idusuario,idlista)");
										$query7 .= sprintf(" VALUES ");
										$query7 .= sprintf("('%s','%s')",
															$ultimoid,
															$data[3]

														);
											$r7 = $db->Execute($query7) or errorQuery(__LINE__, __FILE__);*/

							//echo $query7;


					//$cont1++;


				//genera archivo xml con los claves generadas

				/** CREA EL CONTENIDO DEL ARCHIVO XML **/
		$eof ="\n";
		$xml = '<?xml version="1.0" encoding="ISO-8859-1"?>'.$eof;
		$xml .= '<raiz>'.$eof;

		foreach ($ingresados as $dato)
		{
			$dato['nombre']						=trim($dato['nombre'], "\0");
			$dato['apellido']					=trim($dato['apellido'], "\0");
			$dato['correo']						=trim($dato['correo'], "\0");
			$dato['username']					=trim($dato['username'], "\0");
			$dato['password']					=trim($dato['password'], "\0");




			$dato['nombre']=sprintf('<![CDATA[%s]]>',$dato['nombre']);
			$dato['apellido']=sprintf('<![CDATA[%s]]>',$dato['apellido']);
			$dato['correo']=sprintf('<![CDATA[%s]]>',$dato['correo']);
			$dato['username']=sprintf('<![CDATA[%s]]>',$dato['username']);
			$dato['password']=sprintf('<![CDATA[%s]]>',$dato['password']);








			$xml .= '<ejercito>'.$eof;
			$xml .= '<Nombre>'. $dato['nombre'].'</Nombre>'.$eof;
			$xml .= '<Apellido>'.$dato['apellido'].'</Apellido>'.$eof;
			$xml .= '<Correo>'.$dato['correo'].'</Correo>'.$eof;
			$xml .= '<Username>'.$dato['username'].'</Username>'.$eof;
			$xml .= '<Password>'.$dato['password'].'</Password>'.$eof;
			$xml .=  '</ejercito>';

	}
		$xml .='</raiz>'.$eof;

			/** CREA EL ARCHIVO XML **/
		$archivo_nombre = _DIRRECURSOS_USER.'usuario_xml/'.'ejercito.exported.Data.xml';
		$archivo = fopen($archivo_nombre, 'w');
		if($archivo){
			fwrite($archivo, $xml);

			/* Crea el comando para comprimir el archivo generado */
			$comando_comprimir='zip -jq '._DIRRECURSOS_USER.'usuario_xml/'.'ejercito.exported.Data.xml.zip '._DIRRECURSOS_USER.'usuario_xml/'.'ejercito.exported.Data.xml';
			system($comando_comprimir);

		}
		else{
			return 'Error';
		}




		      //  echo "<hr>";
            }

	}
$row++;
}


fclose($handle);
$total= $cont;
$total1= $cont1;

print($total);

echo "los datos ingresados fueron";
echo "<hr>";
print($ingresados);
echo "<hr>";
echo "los que no se actualizaron";
print($estanya);
echo "<hr>";
print($total1);
//print($estanya);


?>
