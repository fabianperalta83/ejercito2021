<?php
class Smarty_Aplicacion extends Smarty {
	/**
	 * Smarty_Plantilla :: 
	 * @param string $relURL Esta variable es para cuando hay que cargar los templates d_Plantillaesde un lugar distinto al raiz.
	 * @return 
	 **/
	function Smarty_Aplicacion($relURL='') {
		// Class Constructor. These automatically get set with each new instance.
		if (empty ($relURL))
		{
			$relURL = _DIRTEMPLATE_ABS; // templates por defecto del portal
		}
		$this->Smarty();
		$this->template_dir = $relURL.'templates/';
		$this->compile_dir  = $relURL.'templates_c/';
		$this->config_dir   = $relURL.'configs/';
		$this->cache_dir    = $relURL.'cache/';
		$this->caching = false;
		$this->assign('app_name','Plantilla');
	}
}

?>