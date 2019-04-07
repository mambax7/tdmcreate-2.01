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
 * @version         $Id: index.php 10665 2012-12-27 10:14:15Z timgno $
 */

use XoopsModules\Tdmcreate;

include __DIR__ . '/header.php';

$xoops = Xoops::getInstance();
$helper = Banners::getInstance();

$xoops_root_path = \XoopsBaseConfig::get('root-path');
$xoops_upload_path = \XoopsBaseConfig::get('uploads-path');
$xoops_upload_url = \XoopsBaseConfig::get('uploads-url');
$xoops_url = \XoopsBaseConfig::get('url');

// header
$xoops->header();
// tdmcreate modules
$criteria = new CriteriaCompo();
$criteria->add(new Criteria('mod_id', 0, '!='));
$modules = $modulesHandler->getCount($criteria);
unset($criteria);
// tdmcreate tables
$criteria = new CriteriaCompo();
$criteria->add(new Criteria('table_mid', 0, '!='));
$tables = $tablesHandler->getCount($criteria);
unset($criteria);
// tdmcreate tables
$criteria = new CriteriaCompo();
$criteria->add(new Criteria('field_mid', 0, '!='));
$criteria->add(new Criteria('field_tid', 0, '!='));
$fields = $fieldsHandler->getCount($criteria);
unset($criteria);
// tdmcreate modules
$criteria = new CriteriaCompo();
$criteria->add(new Criteria('loc_mid', 0, '!='));
$locale = $localesHandler->getCount($criteria);
unset($criteria);
// tdmcreate import
$criteria = new CriteriaCompo();
$criteria->add(new Criteria('import_id', 0, '!='));
$import = $importsHandler->getCount($criteria);
unset($criteria);
$r = 'red';
$g = 'green';
$modulesColor = 0 == $modules ? $r : $g;
$tablesColor = 0 == $tables ? $r : $g;
$fieldsColor = 0 == $fields ? $r : $g;
$localeColor = 0 == $locale ? $r : $g;
$importColor = 0 == $import ? $r : $g;

$adminMenu->displayNavigation('index.php');
$adminMenu->addInfoBox(Tdmcreate\Locale::INDEX_STATISTICS);
$adminMenu->addInfoBoxLine(sprintf(Tdmcreate\Locale::F_INDEX_NMTOTAL, '<span class="' . $modulesColor . '">' . $modules . '</span>'));
$adminMenu->addInfoBoxLine(sprintf(Tdmcreate\Locale::F_INDEX_NTTOTAL, '<span class="' . $tablesColor . '">' . $tables . '</span>'));
$adminMenu->addInfoBoxLine(sprintf(Tdmcreate\Locale::F_INDEX_NFTOTAL, '<span class="' . $fieldsColor . '">' . $fields . '</span>'));
$adminMenu->addInfoBoxLine(sprintf(Tdmcreate\Locale::F_INDEX_NLTOTAL, '<span class="' . $localeColor . '">' . $locale . '</span>'));
$adminMenu->addInfoBoxLine(sprintf(Tdmcreate\Locale::F_INDEX_NITOTAL, '<span class="' . $importColor . '">' . $import . '</span>'));
// folder path
$folderPath = [
    TDMC_UPLOAD_PATH,
    TDMC_UPLOAD_FILES_PATH,
    TDMC_UPLOAD_REPOSITORY_PATH,
    TDMC_UPLOAD_REPOSITORY_EXTENSIONS_PATH,
    TDMC_UPLOAD_REPOSITORY_MODULES_PATH,
    TDMC_UPLOAD_IMAGES_PATH,
    TDMC_UPLOAD_IMAGES_EXTENSIONS_PATH,
    TDMC_UPLOAD_IMAGES_MODULES_PATH,
    TDMC_UPLOAD_IMAGES_TABLES_PATH,
];
foreach ($folderPath as $folder) {
    $adminMenu->addConfigBoxLine($folder, 'folder');
    $adminMenu->addConfigBoxLine([$folder, '777'], 'chmod');
}
$adminMenu->addConfigBoxLine('thumbnail', 'service');
// extension
$extensions = ['xtranslator' => 'extension'];
foreach ($extensions as $module => $type) {
    $adminMenu->addConfigBoxLine([$module, 'warning'], $type);
}
$adminMenu->displayIndex();
include __DIR__ . '/footer.php';
