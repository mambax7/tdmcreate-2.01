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
XoopsLoad::loadFile($xoops->path(dirname(__DIR__) . '/include/common.php'));
$xoops->header('admin:tdmcreate/tdmcreate_settings.tpl');
$adminObject->renderNavigation('settings.php');
$xoops->tpl()->assign('pathIcon16', TDMC_URL . '/' . $pathIcon16);
//$xoops->tpl()->assign('pathIcon16', TDMC_URL . '/assets/images/icons/16');
// Recovered value of argument op in the URL $
$op = \XoopsRequest::getString('op', 'list');

$setId = \XoopsRequest::getInt('set_id');

switch ($op) {
    case 'list':
    default:
        $start = \XoopsRequest::getInt('start', 0);
        $limit = \XoopsRequest::getInt('limit', $helper->getConfig('settings_adminpager'));
        // Define main template
        $templateMain = 'tdmcreate_settings.tpl';
        $GLOBALS['xoTheme']->addScript('modules/tdmcreate/assets/js/functions.js');
        $GLOBALS['xoTheme']->addStylesheet('modules/tdmcreate/assets/css/admin/style.css');
        $xoops->tpl()->assign('navigation', $adminObject->displayNavigation('settings.php'));
        $adminObject->addItemButton(\TdmcreateLocale::ADD_SETTING, 'settings.php?op=new', 'add');
        $xoops->tpl()->assign('buttons', $adminObject->displayButton());
        $xoops->tpl()->assign('tdmc_upload_imgmod_url', TDMC_UPLOAD_IMAGES_MODULES_URL);
        $xoops->tpl()->assign('tdmc_url', TDMC_URL);
//        $xoops->tpl()->assign('pathIcon16', TDMC_URL . '/' . $pathIcon16);
        $xoops->tpl()->assign('pathModIcon32', $pathModIcon32);
        $settingsCount = $helper->getHandler('Settings')->getCountSettings();
        $settingsAll = $helper->getHandler('Settings')->getAllSettings($start, $limit);
        // Display settings list
        if ($settingsCount > 0) {
            foreach (array_keys($settingsAll) as $i) {
                $setting = $settingsAll[$i]->getValuesSettings();
                $GLOBALS['xoopsTpl']->append('settings_list', $setting);
                unset($setting);
            }
            if ($settingsCount > $limit) {
                require_once XOOPS_ROOT_PATH . '/class/pagenav.php';
                $pagenav = new \XoopsPageNav($settingsCount, $limit, $start, 'start', 'op=list&limit=' . $limit);
                $xoops->tpl()->assign('pagenav', $pagenav->renderNav(4));
            }
        } else {
            $xoops->tpl()->assign('error', \TdmcreateLocale::THEREARENT_SETTINGS);
        }
        break;
    case 'new':
        // Define main template
        $templateMain = 'tdmcreate_settings.tpl';
        $GLOBALS['xoTheme']->addScript('modules/tdmcreate/assets/js/functions.js');
        $xoops->tpl()->assign('navigation', $adminObject->displayNavigation('settings.php'));
        $adminObject->addItemButton(\TdmcreateLocale::SETTINGS_LIST, 'settings.php', 'list');
        $xoops->tpl()->assign('buttons', $adminObject->displayButton());

        $settingsObj = $helper->getHandler('Settings')->create();
//        $form = $settingsObj->getFormSettings();
        $form = new \XoopsModules\Tdmcreate\Form\SettingsForm($settingsObj);
        $xoops->tpl()->assign('form', $form->render());
        break;
    case 'save':
        if ($GLOBALS['xoopsSecurity']->check()) {
            $xoops->redirect('settings.php', 3, implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
        }
        if (isset($setId)) {
            $settingsObj = $helper->getHandler('Settings')->get($setId);
        } else {
            $settingsObj = $helper->getHandler('Settings')->create();
        }
        $setModuleDirname = preg_replace('/[^a-zA-Z0-9]\s+/', '', mb_strtolower($_POST['set_dirname']));
        //Form module save
        $settingsObj->setVars([
                                  'set_name' => $_POST['set_name'],
                                  'set_dirname' => $setModuleDirname,
                                  'set_version' => $_POST['set_version'],
                                  'set_since' => $_POST['set_since'],
                                  'set_min_php' => $_POST['set_min_php'],
                                  'set_min_xoops' => $_POST['set_min_xoops'],
                                  'set_min_admin' => $_POST['set_min_admin'],
                                  'set_min_mysql' => $_POST['set_min_mysql'],
                                  'set_description' => $_POST['set_description'],
                                  'set_author' => $_POST['set_author'],
                                  'set_author_mail' => $_POST['set_author_mail'],
                                  'set_author_website_url' => $_POST['set_author_website_url'],
                                  'set_author_website_name' => $_POST['set_author_website_name'],
                                  'set_credits' => $_POST['set_credits'],
                                  'set_license' => $_POST['set_license'],
                                  'set_release_info' => $_POST['set_release_info'],
                                  'set_release_file' => $_POST['set_release_file'],
                                  'set_manual' => $_POST['set_manual'],
                                  'set_manual_file' => $_POST['set_manual_file'],
                              ]);
        //Form set_image
        $settingsObj->setVar('set_image', $_POST['set_image']);
        //Form module save
        $settingsObj->setVars([
                                  'set_demo_site_url' => $_POST['set_demo_site_url'],
                                  'set_demo_site_name' => $_POST['set_demo_site_name'],
                                  'set_support_url' => $_POST['set_support_url'],
                                  'set_support_name' => $_POST['set_support_name'],
                                  'set_website_url' => $_POST['set_website_url'],
                                  'set_website_name' => $_POST['set_website_name'],
                                  'set_release' => $_POST['set_release'],
                                  'set_status' => $_POST['set_status'],
                                  'set_donations' => $_POST['set_donations'],
                                  'set_subversion' => $_POST['set_subversion'],
                              ]);
        $settingOption = \XoopsRequest::getArray('setting_option', []);
        $settingsObj->setVar('set_admin', in_array('admin', $settingOption, true));
        $settingsObj->setVar('set_user', in_array('user', $settingOption, true));
        $settingsObj->setVar('set_blocks', in_array('blocks', $settingOption, true));
        $settingsObj->setVar('set_search', in_array('search', $settingOption, true));
        $settingsObj->setVar('set_comments', in_array('comments', $settingOption, true));
        $settingsObj->setVar('set_notifications', in_array('notifications', $settingOption, true));
        $settingsObj->setVar('set_permissions', in_array('permissions', $settingOption, true));
        $settingsObj->setVar('set_inroot_copy', in_array('inroot', $settingOption, true));

        $settingsObj->setVar('set_type', $_POST['set_type']);

        if ($helper->getHandler('Settings')->insert($settingsObj)) {
            $xoops->redirect('settings.php', 5, sprintf(\TdmcreateLocale::MODULE_FORM_UPDATED_OK, $_POST['set_name']));
        }

        $xoops->tpl()->assign('error', $settingsObj->getHtmlErrors());
        //        $form = $settingsObj->getFormSettings();
        $form = new \XoopsModules\Tdmcreate\Form\SettingsForm($settingsObj);
        $xoops->tpl()->assign('form', $form->render());
        break;
    case 'edit':
        // Define main template
        $templateMain = 'tdmcreate_settings.tpl';
        $xoops->tpl()->assign('navigation', $adminObject->displayNavigation('settings.php'));
        $adminObject->addItemButton(\TdmcreateLocale::ADD_SETTING, 'settings.php?op=new', 'add');
        $adminObject->addItemButton(\TdmcreateLocale::SETTINGS_LIST, 'settings.php', 'list');
        $xoops->tpl()->assign('buttons', $adminObject->displayButton());
        $settingsObj = $helper->getHandler('Settings')->get($setId);
        //        $form = $settingsObj->getFormSettings();
        $form = new \XoopsModules\Tdmcreate\Form\SettingsForm($settingsObj);
        $xoops->tpl()->assign('form', $form->render());
        break;
    case 'delete':
        $settingsObj = $helper->getHandler('Settings')->get($setId);
        if (isset($_REQUEST['ok']) && 1 === $_REQUEST['ok']) {
            if (!$GLOBALS['xoopsSecurity']->check()) {
                $xoops->redirect('settings.php', 3, implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
            }
            if ($helper->getHandler('Settings')->delete($settingsObj)) {
                $xoops->redirect('settings.php', 3, \TdmcreateLocale::FORMDELOK);
            } else {
                $xoops->tpl()->assign('error', $settingsObj->getHtmlErrors());
            }
        } else {
            $xoops->confirm(['ok' => 1, 'set_id' => $setId, 'op' => 'delete'], $_SERVER['REQUEST_URI'], sprintf(\TdmcreateLocale::FORMSUREDEL, $settingsObj->getVar('set_name')));
        }
        break;
    case 'display':
        $id = \XoopsRequest::getInt('set_id', 0, 'POST');
        if ($id > 0) {
            $settingsObj = $helper->getHandler('Settings')->get($id);
            if (isset($_POST['set_type'])) {
                $setType = $settingsObj->getVar('set_type');
                $settingsObj->setVar('set_type', !$setType);
            }
            $xoops->tpl()->assign('error', $settingsObj->getHtmlErrors());
        }
        break;
}
require __DIR__ . '/footer.php';
