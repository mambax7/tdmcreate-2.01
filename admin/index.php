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

require __DIR__ . '/header.php';

$xoops = \Xoops::getInstance();
$helper = Banners::getInstance();

$xoops_root_path = \XoopsBaseConfig::get('root-path');
$xoops_upload_path = \XoopsBaseConfig::get('uploads-path');
$xoops_upload_url = \XoopsBaseConfig::get('uploads-url');
$xoops_url = \XoopsBaseConfig::get('url');

// header
$xoops->header();
// tdmcreate modules
$criteria = new \CriteriaCompo();
$criteria->add(new \Criteria('mod_id', 0, '!='));
$modules = $modulesHandler->getCount($criteria);
unset($criteria);
// tdmcreate tables
$criteria = new \CriteriaCompo();
$criteria->add(new \Criteria('table_mid', 0, '!='));
$tables = $tablesHandler->getCount($criteria);
unset($criteria);
// tdmcreate tables
$criteria = new \CriteriaCompo();
$criteria->add(new \Criteria('field_mid', 0, '!='));
$criteria->add(new \Criteria('field_tid', 0, '!='));
$fields = $fieldsHandler->getCount($criteria);
unset($criteria);
// tdmcreate modules
$criteria = new \CriteriaCompo();
$criteria->add(new \Criteria('loc_mid', 0, '!='));
$locale = $localesHandler->getCount($criteria);
unset($criteria);
// tdmcreate import
$criteria = new \CriteriaCompo();
$criteria->add(new \Criteria('import_id', 0, '!='));
$import = $importsHandler->getCount($criteria);
unset($criteria);
$r = 'red';
$g = 'green';
$modulesColor = 0 === $modules ? $r : $g;
$tablesColor = 0 === $tables ? $r : $g;
$fieldsColor = 0 === $fields ? $r : $g;
$localeColor = 0 === $locale ? $r : $g;
$importColor = 0 === $import ? $r : $g;

$adminObject->displayNavigation('index.php');
$adminObject->addInfoBox(\TdmcreateLocale::INDEX_STATISTICS);
$adminObject->addInfoBoxLine(sprintf(\TdmcreateLocale::F_INDEX_NMTOTAL, '<span class="' . $modulesColor . '">' . $modules . '</span>'));
$adminObject->addInfoBoxLine(sprintf(\TdmcreateLocale::F_INDEX_NTTOTAL, '<span class="' . $tablesColor . '">' . $tables . '</span>'));
$adminObject->addInfoBoxLine(sprintf(\TdmcreateLocale::F_INDEX_NFTOTAL, '<span class="' . $fieldsColor . '">' . $fields . '</span>'));
$adminObject->addInfoBoxLine(sprintf(\TdmcreateLocale::F_INDEX_NLTOTAL, '<span class="' . $localeColor . '">' . $locale . '</span>'));
$adminObject->addInfoBoxLine(sprintf(\TdmcreateLocale::F_INDEX_NITOTAL, '<span class="' . $importColor . '">' . $import . '</span>'));
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
    $adminObject->addConfigBoxLine($folder, 'folder');
    $adminObject->addConfigBoxLine([$folder, '777'], 'chmod');
}
$adminObject->addConfigBoxLine('thumbnail', 'service');
// extension
$extensions = ['xtranslator' => 'extension'];
foreach ($extensions as $module => $type) {
    $adminObject->addConfigBoxLine([$module, 'warning'], $type);
}
$adminObject->displayIndex();
require __DIR__ . '/footer.php';
