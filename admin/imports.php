<?php

/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

use Xoops\Core\Request;

/**
 * tdmcreate module.
 *
 * @copyright       XOOPS Project (https://xoops.org)
 * @license         GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 *
 * @since           2.6.0
 *
 * @author          XOOPS Development Team
 */
require __DIR__ . '/header.php';
// Get $_POST, $_GET, $_REQUEST
$op = Request::getCmd('op', 'list');
$start = Request::getInt('start', 0);
// Parameters
$limit = $helper->getConfig('adminpager');
// heaser
$xoops->header('admin:tdmcreate/tdmcreate_imports.tpl');

$importId = Request::getInt('import_id');

$adminObject->renderNavigation('imports.php');

switch ($op) {
    case 'list':
        $adminObject->addTips(\TdmcreateLocale::IMPORT_TIPS);
        $adminObject->addItemButton(\TdmcreateLocale::IMPORT_OLD_MODULE, 'imports.php?op=new', 'add');
        $adminObject->renderTips();
        $adminObject->displayButton();
        // Get modules list
        $numbRowsImports = $importsHandler->getCountImports();
        $importArray = $importsHandler->getAllImports($start, $limit);
        // Assign Template variables
        $xoops->tpl()->assign('imports_count', $numbRowsImports);
        unset($criteria);
        if ($numbRowsImports > 0) {
            foreach (array_keys($importArray) as $i) {
                $import = $importsHandler[$i]->getValues();
                $xoops->tpl()->appendByRef('imports', $import);
                unset($import);
            }
            // Display Imports Navigation
            if ($numbRowsImports > $limit) {
                $nav = new \XoopsPageNav($numbRowsImports, $limit, $start, 'start');
                $xoops->tpl()->assign('pagenav', $nav->renderNav(4));
            }
        } else {
            $xoops->tpl()->assign('error_message', \TdmcreateLocale::E_NO_IMPORTS);
        }
        break;
    case 'new':
        $adminObject->addItemButton(\TdmcreateLocale::IMPORTED_LIST, 'imports.php', 'application-view-detail');
        $adminObject->displayButton();

        $importsObj = $importsHandler->create();
//        $form = $xoops->getModuleForm($importsObj, 'imports');
        $form = new \XoopsModules\Tdmcreate\Form\ImportsForm($importsObj);
        $xoops->tpl()->assign('form', $form->render());
        break;
    case 'save':
        if (!$xoops->security()->check()) {
            $xoops->redirect('modules.php', 3, implode(',', $xoops->security()->getErrors()));
        }

        if ($importId > 0) {
            $importsObj = $importsHandler->get($importId);
            //Form imported edited save
            $importsObj->setVar('import_mid', $_POST['import_mid']);
            $importsObj->setVar('import_name', $_POST['import_name']);
            $importsObj->setVar('import_nbtables', $_POST['import_nbtables']);
            $importsObj->setVar('import_tablename', $_POST['import_mid']);
            $importsObj->setVar('import_nbfields', $_POST['import_nbfields']);
            $importsObj->setVar('import_fieldelements', $_POST['import_fieldelements']);
        } else {
            $importsObj = $importsHandler->create();
            //Form imported save
            $importsObj->setVar('import_name', $_POST['import_name']);
            $importsObj->setVar('import_mid', $_POST['import_mid']);
            $files = $_FILES['importfile'];
            // If incoming data have been entered correctly
            if (\XoopsLocale::A_SUBMIT == $_POST['upload'] && isset($files['tmp_name']) && ('.sql' === mb_substr($files['name'], -4))) {
                // File recovery
                $dir = TDMC_UPLOAD_FILES_PATH;
                $file = $_FILES['importfile'];
                $tmpName = $file['tmp_name'];
                // Copy files to the server
                if (is_uploaded_file($tmpName)) {
                    readfile($tmpName);
                    // The directory where you saved the file
                    if (UPLOAD_ERR_OK == $file['error']) {
                        if (move_uploaded_file($tmpName, $dir . '/' . $file['name'])) {
                        }
                        $xoops->redirect('imports.php', 3, sprintf(\TdmcreateLocale::E_FILE_UPLOADING, $file['name']));
                    }
                } else {
                    $xoops->redirect('imports.php', 3, sprintf(\TdmcreateLocale::E_FILE_NOT_UPLOADING, $tmpName));
                }

                // Copies data in the db
                $filename = $dir . '/' . $file['name'];
                // File size
                $filesize = $files['size'];
                // Check that the file was inserted and that there is
                if (false !== ($handle = fopen($filename, 'rb'))) {
                    // File reading until at the end
                    while (!feof($handle)) {
                        $buffer = fgets($handle, filesize($filename));
                        if (mb_strlen($buffer) > 1) {
                            // search all comments
                            $search = ['/\/\*.*(\n)*.*(\*\/)?/', '/\s*--.*\n/', '/\s*#.*\n/'];
                            // and replace with null
                            $replace = ["\n"];
                            $buffer = preg_replace($search, $replace, $buffer);
                            $buffer = str_replace('`', '', $buffer);
                            $buffer = str_replace(',', '', $buffer);

                            preg_match_all('/((\s)*(CREATE TABLE)(\s)+(.*)(\s)+(\())/', $buffer, $tableMatch); // table name ... (match)
                            if (count($tableMatch[0]) > 0) {
                                $resultTable[] = $tableMatch[5][0];
                            }
                        } else {
                            $xoops->redirect('imports.php', 3, sprintf(\TdmcreateLocale::E_SQL_FILE_DATA_NOT_MATCH, $buffer));
                        }
                    }

                    // Insert query
                    if (mb_strlen($resultTable[0]) > 0) {
                        $t = 0;
                        foreach (array_keys($resultTable) as $table) {
                            $importsObj->setVar('import_tablename', $resultTable[$table]); //$_POST['import_tablename']
                            $importsObj->setVar('import_nbtables', $t);
                            ++$t;    //$_POST['import_nbtables']
                            if (mb_strlen($resultTable[0]) > 0) {
                                $f = 0;
                                foreach (array_keys($resultFields) as $field) {
                                    $importsObj->setVar('import_nbfields', $f);
                                    ++$f; // $_POST['import_nbfields']
                                    $importsObj->setVar('import_fieldelements', $_POST['import_fieldelements']);
                                }
                                unset($f);
                            }
                        }
                        unset($t);
                    }
                } else {
                    $xoops->redirect('imports.php', 3, \TdmcreateLocale::E_FILE_NOT_OPEN_READING);
                }
                $xoops->redirect('imports.php', 3, \TdmcreateLocale::S_DATA_ENTERED);
                fclose($handle);
            } else {
                $xoops->redirect('imports.php', 3, \TdmcreateLocale::E_DATABASE_SQL_FILE_NOT_IMPORTED);
            }
        }

        if ($importsHandler->insert($importsObj)) {
            $xoops->redirect('imports.php', 3, \TdmcreateLocale::FORM_OK);
        }

        $xoops->error($importsObj->getHtmlErrors());
        //        $form = $xoops->getModuleForm($importsObj, 'imports');
        $form = new \XoopsModules\Tdmcreate\Form\ImportsForm($importsObj);
        $xoops->tpl()->assign('form', $form->render());
        break;
    case 'edit':
        $adminObject->addItemButton(\TdmcreateLocale::IMPORT_OLD_MODULE, 'imports.php?op=import', 'add');
        $adminObject->addItemButton(\TdmcreateLocale::IMPORTED_LIST, 'imports.php', 'application-view-detail');
        $adminObject->displayButton();

        $importsObj = $importsHandler->get($importId);
        //        $form = $xoops->getModuleForm($importsObj, 'imports');
        $form = new \XoopsModules\Tdmcreate\Form\ImportsForm($importsObj);
        $xoops->tpl()->assign('form', $form->render());
        break;
    case 'delete':
        if ($importId > 0) {
            $importsObj = $importsHandler->get($importId);
            if (isset($_POST['ok']) && 1 === $_POST['ok']) {
                if (!$xoops->security()->check()) {
                    $xoops->redirect('imports.php', 3, implode(',', $xoops->security()->getErrors()));
                }
                if ($importsHandler->delete($importsObj)) {
                    $xoops->redirect('imports.php', 2, sprintf(\TdmcreateLocale::S_DELETED, \TdmcreateLocale::IMPORT));
                } else {
                    $xoops->error($importsObj->getHtmlErrors());
                }
            } else {
                $xoops->confirm(['ok' => 1, 'id' => $importId, 'op' => 'delete'], 'imports.php', sprintf(\TdmcreateLocale::QF_ARE_YOU_SURE_TO_DELETE, $importsObj->getVar('import_name')) . '<br>');
            }
        } else {
            $xoops->redirect('imports.php', 1, \TdmcreateLocale::E_DATABASE_ERROR);
        }
        break;
}

require __DIR__ . '/footer.php';
