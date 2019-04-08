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
 * @param mixed $module
 * @return bool
 */
function xoops_module_install_tdmcreate($module)
{
    $xoops_upload_path = \XoopsBaseConfig::get('uploads-path');
    $xoops = \Xoops::getInstance();
    $xoops->loadLanguage('modinfo');
    $xoops->registry()->set('tdmcreate_id', $module->getVar('mid'));

    $indexFile = $xoops_upload_path . '/index.html';
    $blankFile = $xoops_upload_path . '/blank.gif';

    //Creation of folder 'uploads/tdmcreate'
    $tdmcreatePath = $xoops_upload_path . '/tdmcreate';
    if (!is_dir($tdmcreatePath)) {
        if (!mkdir($tdmcreatePath, 0777) && !is_dir($tdmcreatePath)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $tdmcreatePath));
        }
        chmod($tdmcreatePath, 0777);
    }
    copy($indexFile, $tdmcreatePath . '/index.html');

    //Creation of the 'files' folder in uploads
    $files_uploads = $tdmcreatePath . '/files';
    if (!is_dir($files_uploads)) {
        if (!mkdir($files_uploads, 0777) && !is_dir($files_uploads)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $files_uploads));
        }
        chmod($files_uploads, 0777);
    }
    copy($indexFile, $files_uploads . '/index.html');

    //Creation of the 'repository' folder in uploads
    $repository = $tdmcreatePath . '/repository';
    if (!is_dir($repository)) {
        if (!mkdir($repository, 0777) && !is_dir($repository)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $repository));
        }
        chmod($repository, 0777);
    }
    copy($indexFile, $repository . '/index.html');

    //Creation of the 'repository/extensions' folder in uploads
    $extensions = $repository . '/extensions';
    if (!is_dir($extensions)) {
        if (!mkdir($extensions, 0777) && !is_dir($extensions)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $extensions));
        }
        chmod($extensions, 0777);
    }
    copy($indexFile, $extensions . '/index.html');

    //Creation of the 'repository/modules' folder in uploads
    $modules = $repository . '/modules';
    if (!is_dir($modules)) {
        if (!mkdir($modules, 0777) && !is_dir($modules)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $modules));
        }
        chmod($modules, 0777);
    }
    copy($indexFile, $modules . '/index.html');

    //Creation of the 'images' folder in uploads
    $images = $tdmcreatePath . '/images';
    if (!is_dir($images)) {
        if (!mkdir($images, 0777) && !is_dir($images)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $images));
        }
        chmod($images, 0777);
    }
    copy($indexFile, $images . '/index.html');
    copy($blankFile, $images . '/blank.gif');

    //Creation of the 'images/modules' folder in uploads
    $modules = $images . '/modules';
    $default = TDMC_ROOT_PATH . '/assets/images/default.png';
    $naked = TDMC_ROOT_PATH . '/assets/images/naked.png';
    if (!is_dir($modules)) {
        if (!mkdir($modules, 0777) && !is_dir($modules)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $modules));
        }
        chmod($modules, 0777);
    }
    copy($indexFile, $modules . '/index.html');
    copy($blankFile, $modules . '/blank.gif');
    copy($naked, $modules . '/naked.png');
    copy($default, $modules . '/default_slogo.png');

    //Creation of the folder 'images/tables' in uploads
    $tables = $images . '/tables';
    if (!is_dir($tables)) {
        if (!mkdir($tables, 0777) && !is_dir($tables)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $tables));
        }
        chmod($tables, 0777);
    }
    copy($indexFile, $tables . '/index.html');
    copy($blankFile, $tables . '/blank.gif');

    //Creation of the folder 'images/extensions' in uploads
    $extensions = $images . '/extensions';
    if (!is_dir($extensions)) {
        if (!mkdir($extensions, 0777) && !is_dir($extensions)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $extensions));
        }
        chmod($extensions, 0777);
    }
    copy($indexFile, $extensions . '/index.html');
    copy($blankFile, $extensions . '/blank.gif');

    return true;
}
