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
 * @author          TDM Xoops (AKA Developers)
 */
use XoopsModules\Tdmcreate;

require dirname(__DIR__) . '/preloads/autoloader.php';

/** @var \XoopsModules\Tdmcreate\Helper $helper */
$helper = \XoopsModules\Tdmcreate\Helper::getInstance();
//$helper->loadLanguage('common');

// get path to icons
$pathIcon32 = \Xmf\Module\Admin::menuIconPath('');
if (is_object($helper->getModule())) {
    $pathModIcon32 = $helper->getModule()->getInfo('modicons32');
}

$adminmenu[] = [
    'title' => \TdmcreateLocale::ADMIN_MENU1,
    'link' => 'admin/index.php',
    'icon' => "{$pathIcon32}/dashboard.png",
];

$adminmenu[] = [
    'title' => \TdmcreateLocale::ADMIN_MENU2,
    'link' => 'admin/settings.php',
    'icon' => "{$pathIcon32}/settings.png",
];

$adminmenu[] = [
    'title' => \TdmcreateLocale::ADMIN_MENU3,
    'link' => 'admin/modules.php',
    'icon' => "{$pathIcon32}/addmodule.png",
];

$adminmenu[] = [
    'title' => \TdmcreateLocale::ADMIN_MENU4,
    'link' => 'admin/tables.php',
    'icon' => "{$pathIcon32}/addtable.png",
];

$adminmenu[] = [
    'title' => \TdmcreateLocale::ADMIN_MENU5,
    'link' => 'admin/fields.php',
    'icon' => "{$pathIcon32}/editfields.png",
];

$adminmenu[] = [
    'title' => \TdmcreateLocale::ADMIN_MENU6,
    'link' => 'admin/locales.php',
    'icon' => "{$pathIcon32}/languages.png",
];

$adminmenu[] = [
    'title' => \TdmcreateLocale::ADMIN_MENU7,
    'link' => 'admin/imports.php',
    'icon' => "{$pathIcon32}/import.png",
];

$adminmenu[] = [
    'title' => \TdmcreateLocale::ADMIN_MENU8,
    'link' => 'admin/building.php',
    'icon' => "{$pathIcon32}/builder.png",
];

$adminmenu[] = [
    'title' => \XoopsLocale::ABOUT,
    'link' => 'admin/about.php',
    'icon' => "{$pathIcon32}/about.png",
];
