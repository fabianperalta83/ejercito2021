<?php /* Smarty version Smarty-3.1.8, created on 2021-02-18 14:53:59
         compiled from "/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_home_medios.html" */ ?>
<?php /*%%SmartyHeaderCode:1431411629602e7f87465496-40853378%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aa89c5c5cf0468c80ba5f0d51605fafe0c2a0b9a' => 
    array (
      0 => '/home/ejercitomil/public_html/_templates/Subsitio2018/templates/tpl_home_medios.html',
      1 => 1613604144,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1431411629602e7f87465496-40853378',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'hijoDestacadoMedios' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_602e7f874bcee4_74184373',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_602e7f874bcee4_74184373')) {function content_602e7f874bcee4_74184373($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/home/ejercitomil/public_html/_lib/smarty/libs/plugins/modifier.truncate.php';
?><div id="actualidad">

	<ol id="secActualidadMain">
	 <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['name'] = 'idmedios';
$_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['loop'] = is_array($_loop=4) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['start'] = (int)0;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['step'] = ((int)1) == 0 ? 1 : (int)1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['loop'];
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['idmedios']['total']);
?>

	     <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['idmedios']['index']==2){?>
			         
				 <li name="secActualidad" style="width:94%;*padding-bottom: 17px">
			   
			<?php }else{ ?>
			   
			     <li name="secActualidad" style="border-bottom:0px dotted #000000;width:94%;*padding-bottom: 17px">
			      
		 <?php }?>
						
						<a href="index.php?idcategoria=<?php echo $_smarty_tpl->tpl_vars['hijoDestacadoMedios']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idmedios']['index']]['idcategoria'];?>
" target="_blank" 
						  title="<?php echo $_smarty_tpl->tpl_vars['hijoDestacadoMedios']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idmedios']['index']]['nombre'];?>
">
						  
								 <img src="tools/microsThumb.php?src=<?php echo @_DIRIMAGES_USER;?>
<?php echo $_smarty_tpl->tpl_vars['hijoDestacadoMedios']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idmedios']['index']]['imagen'];?>
&amp;w=129&amp;h=97" alt="<?php echo $_smarty_tpl->tpl_vars['hijoDestacadoMedios']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idmedios']['index']]['nombre'];?>
#" /> 
										 
								 <span><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['hijoDestacadoMedios']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idmedios']['index']]['nombre'],100,'',true);?>
</span>
						</a> 
				
			     </li>  
			
	 <?php endfor; endif; ?>
    </ol>
</div>	
<?php }} ?>