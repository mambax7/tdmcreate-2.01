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
 * @author          Timgno <txmodxoops@gmail.com>
 */
defined('XOOPS_ROOT_PATH') || die('XOOPS root path not defined');

/**
 * Get {@link XoopsThemeForm} for editing a user.
 *
 * @param bool $action
 *
 * @return \XoopsSimpleForm
 */
function tdmcreate_getBuildingForm($action = false)
{
    $xoops = \Xoops::getInstance();

    if (false === $action) {
        $action = $_SERVER['REQUEST_URI'];
    }

    //        $modulesHandler = $xoops->getModuleHandler('modules');
    $modulesHandler = new \XoopsModules\Tdmcreate\ModulesHandler();
    $extensionsHandler = $xoops->getModuleHandler('extensions');
    $form = new \XoopsSimpleForm(\TdmcreateLocale::BUILDING_TITLE, 'building', $action, 'post', true);

    $mods_select = new \XoopsFormSelect(\TdmcreateLocale::MODULES, 'mod_name', 'mod_name');
    $mods_select->addOption(0, \TdmcreateLocale::SELMODDEF);
    $mods_select->addOptionArray($modulesHandler->getList());
    $form->addElement($mods_select, false);

    $exts_select = new \XoopsFormSelect(\TdmcreateLocale::EXTENSIONS, 'ext_name', 'ext_name');
    $exts_select->addOption(0, \TdmcreateLocale::SELEXTDEF);
    $exts_select->addOptionArray($extensionsHandler->getList());
    $form->addElement($exts_select, false);

    $form->addElement(new \XoopsFormHidden('op', 'build'));
    $form->addElement(new \XoopsFormButton('', 'submit', \TdmcreateLocale::SUBMIT, 'submit'));

    return $form;
}
