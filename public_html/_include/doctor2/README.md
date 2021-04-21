Instrucciones
=============
1. Descargue el repositorio
2. Quedara instalado en la carpeta `doctor`
3. Ingrese a `config.inc.php` y cambie las variables de conexion a la base de datos
4. El sistema trabaja únicamente sobre la tabla `categoria` y no esta parametrizado para usarlo con una tabla con un nombre diferente
5. Usando phpMyAdmin o MySQL Workbench ingrese a la base de datos y ejecute el siguiente comando
```sql
ALTER TABLE `basededatos`.`categoria` 
ADD COLUMN `marca_estructura` INT NOT NULL DEFAULT 0 AFTER `idpadre`,
ADD COLUMN `marca_visibilidad` INT NOT NULL DEFAULT 0 AFTER `marca_estructura`;
```
6. Si tiene problemas con este alter table lo único que necesita hacer es crear manualmente dos columnas llamadas:

>`marca_estructura` y `marca_visibilidad`

>ambas NOT NULL y con valor default = 0

>El sistema necesita que ambas esten con valor igual a cero para funcionar, no funciona con NULL

7. El script se ejecuta por etapas pues existe un limite en el número de categorias que puede cargar en memoria
8. Abra el archivo `config.inc.php` y haga los siguientes ajustes:

* IMPORTANTE! Cambie `tamano_maximo` por el VALOR MAXIMO de `idcategoria` + 1, es decir, si el numero maximo de una categoria es la 112367 entonces escriba 112368 (NO POR EL NUMERO TOTAL DE CATEGORIAS). No importa si se pasa del idcategoria máximo, pero si pone uno inferior entonces no se procesaran todas las categorias.

* Cambie `tamano_lote` por una valor mas bajo, por ejemplo 20000, preferiblemente en múltiplos de 10000

* Tenga cuidado de que siempre `tamano_maximo` > `tamano_lote`

9. Ejecute el script navegando hacia index.php
10. Si se presenta un error de memoria, es muy posible que la memoria de la máquina donde va a procesar el script no alcance a procesar lotes definidos por Usted, por lo tanto, arregle las variables en `config.inc.php` como se indico en el numeral 8, REDUCIENDO el tamaño del lote. 


Recomendaciones (Una vez termine el proceso)
============================================
1. Aqui van las recomendaciones pero todavía no las he terminado