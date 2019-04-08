<?php

/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/
/**
 * tdmcreate module.
 *
 * @copyright       XOOPS Project (https://xoops.org)
 * @license         GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 *
 * @since           2.6.0
 *
 * @author          TXMod Xoops (AKA Timgno)
 */
use XoopsModules\Tdmcreate;

require_once dirname(dirname(dirname(__DIR__))) . '/include/cp_header.php';

require dirname(__DIR__) . '/preloads/autoloader.php';

// Get main instance
XoopsLoad::load('system', 'system');
$system = \System::getInstance();

/** @var \XoopsModules\Tdmcreate\Helper $helper */
$helper = \XoopsModules\Tdmcreate\Helper::getInstance();
//$helper->loadLocale();
//$xoops = \Xoops::getInstance();
//$xoops->loadLocale();

$pathIcon16 = \Xmf\Module\Admin::iconUrl('', 16);
$pathIcon32 = \Xmf\Module\Admin::iconUrl('', 32);
if (is_object($helper->getModule())) {
    $pathModIcon32 = $helper->getModule()->getInfo('modicons32');
}
//$sysPathIcon32
//pathIcon16

// Load local libraries
XoopsLoad::loadFile($xoops->path(dirname(__DIR__) . '/include/common.php'));
XoopsLoad::loadFile($xoops->path(dirname(__DIR__) . '/include/functions.php'));
// Get handler
$modulesHandler = new  \XoopsModules\Tdmcreate\ModulesHandler(); //$helper->getModulesHandler();
$tablesHandler = new  \XoopsModules\Tdmcreate\TablesHandler(); //$helper->getTablesHandler();
$fieldsHandler = new  \XoopsModules\Tdmcreate\FieldsHandler(); //$helper->getFieldsHandler();
$localesHandler = new  \XoopsModules\Tdmcreate\LocalesHandler(); //$helper->getLocalesHandler();
$importsHandler = new  \XoopsModules\Tdmcreate\ImportsHandler(); //$helper->getImportsHandler();
// Add Script
$xoops->theme()->addScript('media/xoops/xoops.js');
$xoops->theme()->addScript('modules/system/js/admin.js');
$xoops->theme()->addScript('modules/tdmcreate/assets/js/functions.js');
// Add Stylesheet
$xoops->theme()->addStylesheet('modules/system/css/admin.css');
$xoops->theme()->addStylesheet('modules/tdmcreate/assets/css/admin.css');
// Get admin menu istance
$adminObject = new \Xoops\Module\Admin();
