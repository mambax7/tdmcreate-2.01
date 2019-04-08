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
 * @since           2.5.5
 *
 * @author          Txmod Xoops <support@txmodxoops.org>
 */
require __DIR__ . '/header.php';
// Recovered value of argument op in the URL $
$op = \XoopsRequest::getString('op', 'list');

$fileId = \XoopsRequest::getInt('file_id');

switch ($op) {
    case 'list':
    default:
        $start = \XoopsRequest::getInt('start', 0);
        $limit = \XoopsRequest::getInt('limit', $helper->getConfig('morefiles_adminpager'));
        // Define main template
        $templateMain = 'tdmcreate_morefiles.tpl';
        $GLOBALS['xoTheme']->addScript('modules/tdmcreate/assets/js/functions.js');
        $GLOBALS['xoTheme']->addStylesheet('modules/tdmcreate/assets/css/admin/style.css');
        $xoops->tpl()->assign('navigation', $adminObject->displayNavigation('morefiles.php'));
        $adminObject->addItemButton(\TdmcreateLocale::ADD_MORE_FILE, 'morefiles.php?op=new', 'add');
        $xoops->tpl()->assign('buttons', $adminObject->displayButton());
        $xoops->tpl()->assign('tdmc_url', TDMC_URL);
        $xoops->tpl()->assign('tdmc_upload_imgfile_url', TDMC_UPLOAD_IMAGES_MODULES_URL);
        $xoops->tpl()->assign('pathIcon16', $pathIcon16);
        $xoops->tpl()->assign('pathModIcon32', $pathModIcon32);
        $modulesCount = $helper->getHandler('modules')->getCountModules();
        // Redirect if there aren't modules
        if (0 === $modulesCount) {
            $xoops->redirect('modules.php?op=new', 2, \TdmcreateLocale::NOTMODULES);
        }
        $morefilesCount = $helper->getHandler('morefiles')->getCountMoreFiles();
        $morefilesAll = $helper->getHandler('morefiles')->getAllMoreFiles($start, $limit);
        // Display morefiles list
        if ($morefilesCount > 0) {
            foreach (array_keys($morefilesAll) as $i) {
                $files = $morefilesAll[$i]->getValuesMoreFiles();
                $GLOBALS['xoopsTpl']->append('files_list', $files);
                unset($files);
            }
            if ($morefilesCount > $limit) {
                require_once XOOPS_ROOT_PATH . '/class/pagenav.php';
                $pagenav = new \XoopsPageNav($morefilesCount, $limit, $start, 'start', 'op=list&limit=' . $limit);
                $xoops->tpl()->assign('pagenav', $pagenav->renderNav(4));
            }
        } else {
            $xoops->tpl()->assign('error', \TdmcreateLocale::THEREARENT_MORE_FILES);
        }
        break;
    case 'new':
        // Define main template
        $templateMain = 'tdmcreate_morefiles.tpl';
        $GLOBALS['xoTheme']->addScript('modules/tdmcreate/assets/js/functions.js');
        $xoops->tpl()->assign('navigation', $adminObject->displayNavigation('morefiles.php'));
        $adminObject->addItemButton(\TdmcreateLocale::MORE_FILES_LIST, 'morefiles.php', 'list');
        $xoops->tpl()->assign('buttons', $adminObject->displayButton());

        $morefilesObj = $helper->getHandler('morefiles')->create();
        $form = $morefilesObj->getFormMoreFiles();
//        $form = new \XoopsModules\Tdmcreate\Form\MoreFilesForm($morefilesObj);
        $xoops->tpl()->assign('form', $form->render());
        break;
    case 'save':
        if (!$GLOBALS['xoopsSecurity']->check()) {
            $xoops->redirect('morefiles.php', 3, implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
        }
        if (isset($fileId)) {
            $morefilesObj = $helper->getHandler('morefiles')->get($fileId);
        } else {
            $morefilesObj = $helper->getHandler('morefiles')->create();
        }
        // Form file save
        $morefilesObj->setVars([
                                   'file_mid' => $_POST['file_mid'],
                                   'file_name' => $_POST['file_name'],
                                   'file_extension' => $_POST['file_extension'],
                                   'file_infolder' => $_POST['file_infolder'],
                               ]);

        if ($helper->getHandler('morefiles')->insert($morefilesObj)) {
            if ($morefilesObj->isNew()) {
                $xoops->redirect('morefiles.php', 5, sprintf(\TdmcreateLocale::FILE_FORM_CREATED_OK, $_POST['file_name']));
            } else {
                $xoops->redirect('morefiles.php', 5, sprintf(\TdmcreateLocale::FILE_FORM_UPDATED_OK, $_POST['file_name']));
            }
        }

        $xoops->tpl()->assign('error', $morefilesObj->getHtmlErrors());
        $form = $morefilesObj->getFormMoreFiles();
        $xoops->tpl()->assign('form', $form->render());
        break;
    case 'edit':
        // Define main template
        $templateMain = 'tdmcreate_morefiles.tpl';
        $GLOBALS['xoTheme']->addScript('modules/tdmcreate/assets/js/functions.js');
        $xoops->tpl()->assign('navigation', $adminObject->displayNavigation('morefiles.php'));
        $adminObject->addItemButton(\TdmcreateLocale::ADD_MODULE, 'morefiles.php?op=new', 'add');
        $adminObject->addItemButton(\TdmcreateLocale::MORE_FILES_LIST, 'morefiles.php', 'list');
        $xoops->tpl()->assign('buttons', $adminObject->displayButton());

        $morefilesObj = $helper->getHandler('morefiles')->get($fileId);
        $form = $morefilesObj->getFormMoreFiles();
        $xoops->tpl()->assign('form', $form->render());
        break;
    case 'delete':
        $morefilesObj = $helper->getHandler('morefiles')->get($fileId);
        if (isset($_REQUEST['ok']) && 1 === $_REQUEST['ok']) {
            if (!$GLOBALS['xoopsSecurity']->check()) {
                $xoops->redirect('morefiles.php', 3, implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
            }
            if ($helper->getHandler('morefiles')->delete($morefilesObj)) {
                $xoops->redirect('morefiles.php', 3, \TdmcreateLocale::FORM_DELETED_OK);
            } else {
                $xoops->tpl()->assign('error', $morefilesObj->getHtmlErrors());
            }
        } else {
            $xoops->confirm(['ok' => 1, 'file_id' => $fileId, 'op' => 'delete'], $_SERVER['REQUEST_URI'], sprintf(\TdmcreateLocale::FORM_SURE_DELETE, $morefilesObj->getVar('file_name')));
        }
        break;
}

require __DIR__ . '/footer.php';
