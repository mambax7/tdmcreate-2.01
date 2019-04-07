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
 *
 * @version         $Id: menu.php 10665 2012-12-27 10:14:15Z timgno $
 */
$adminmenu = [];
$i = 0;
$adminmenu[$i]['title'] = Tdmcreate\Locale::ADMIN_MENU1;
$adminmenu[$i]['link'] = 'admin/index.php';
$adminmenu[$i]['icon'] = 'dashboard.png';
++$i;
$adminmenu[$i]['title'] = Tdmcreate\Locale::ADMIN_MENU2;
$adminmenu[$i]['link'] = 'admin/settings.php';
$adminmenu[$i]['icon'] = 'settings.png';
++$i;
$adminmenu[$i]['title'] = Tdmcreate\Locale::ADMIN_MENU3;
$adminmenu[$i]['link'] = 'admin/modules.php';
$adminmenu[$i]['icon'] = 'addmodule.png';
++$i;
$adminmenu[$i]['title'] = Tdmcreate\Locale::ADMIN_MENU4;
$adminmenu[$i]['link'] = 'admin/tables.php';
$adminmenu[$i]['icon'] = 'addtable.png';
++$i;
$adminmenu[$i]['title'] = Tdmcreate\Locale::ADMIN_MENU5;
$adminmenu[$i]['link'] = 'admin/fields.php';
$adminmenu[$i]['icon'] = 'editfields.png';
++$i;
$adminmenu[$i]['title'] = Tdmcreate\Locale::ADMIN_MENU6;
$adminmenu[$i]['link'] = 'admin/locales.php';
$adminmenu[$i]['icon'] = 'languages.png';
++$i;
$adminmenu[$i]['title'] = Tdmcreate\Locale::ADMIN_MENU7;
$adminmenu[$i]['link'] = 'admin/imports.php';
$adminmenu[$i]['icon'] = 'import.png';
++$i;
$adminmenu[$i]['title'] = Tdmcreate\Locale::ADMIN_MENU8;
$adminmenu[$i]['link'] = 'admin/building.php';
$adminmenu[$i]['icon'] = 'builder.png';
++$i;
$adminmenu[$i]['title'] = XoopsLocale::ABOUT;
$adminmenu[$i]['link'] = 'admin/about.php';
$adminmenu[$i]['icon'] = 'about.png';
unset($i);
