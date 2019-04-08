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
$xoops->header('admin:tdmcreate/tdmcreate_locales.tpl');

$localeId = Request::getInt('loc_id', 0);

$adminObject->renderNavigation('locale.php');

switch ($op) {
    case 'list':
        $adminObject->addTips(\TdmcreateLocale::LOCALE_TIPS);
        $adminObject->addItemButton(\TdmcreateLocale::A_ADD_LOCALE, 'locales.php?op=new', 'add');
        $adminObject->renderTips();
        $adminObject->displayButton();

        $numbRowsLocales = $localesHandler->getCountLocales();
        $localesArray = $localesHandler->getAllLocales($start, $limit);
        // Assign Template variables
        $xoops->tpl()->assign('locale_count', $numbRowsLocales);
        unset($criteria);
        if ($numbRowsLocales > 0) {
            foreach (array_keys($localesArray) as $i) {
                $locale = $localesHandler->getVars();
                $xoops->tpl()->appendByRef('locales', $locale);
                unset($locale);
            }
            // Display Page Navigation
            if ($numbRowsLocales > $limit) {
                $nav = new \XoopsPageNav($numbRowsLocales, $limit, $start, 'start');
                $xoops->tpl()->assign('pagenav', $nav->renderNav(4));
            }
        } else {
            $xoops->tpl()->assign('error_message', \TdmcreateLocale::E_NO_LOCALES);
        }
        break;
    case 'new':
        $adminObject->addItemButton(\TdmcreateLocale::A_LIST_LOCALE, 'locales.php', 'application-view-detail');
        $adminObject->displayButton();

        $localesObj = $localesHandler->create();
//        $form = $xoops->getModuleForm($localesObj, 'locales');
        $form = new \XoopsModules\Tdmcreate\Form\LocalesForm($localesObj);
        $xoops->tpl()->assign('form', $form->render());
        break;
    case 'save':
        if (!$xoops->security()->check()) {
            $xoops->redirect('locales.php', 3, implode(',', $xoops->security()->getErrors()));
        }

        if ($localeId > 0) {
            $localesObj = $localesHandler->get($localeId);
            //Form imported edited save
            $localesObj->setVar('loc_mid', Request::getInt('loc_mid'));
            $localesObj->setVar('loc_file', Request::getString('loc_file'));
            $localesObj->setVar('loc_define', Request::getString('loc_define'));
            $localesObj->setVar('loc_description', Request::getString('loc_description'));
            $xoops->redirect('locales.php', 3, \TdmcreateLocale::E_DATABASE_SQL_FILE_NOT_IMPORTED);
        }
        if ($localesHandler->insert($localesObj)) {
            $xoops->redirect('locales.php', 3, \TdmcreateLocale::FORM_OK);
        }

        $xoops->error($localesObj->getHtmlErrors());
        //        $form = $xoops->getModuleForm($localesObj, 'locales');
        $form = new \XoopsModules\Tdmcreate\Form\LocalesForm($localesObj);

        $xoops->tpl()->assign('form', $form->render());
        break;
    case 'edit':
        $adminObject->addItemButton(\TdmcreateLocale::A_ADD_LOCALE, 'locales.php?op=new', 'add');
        $adminObject->addItemButton(\TdmcreateLocale::A_LIST_LOCALE, 'locales.php', 'application-view-detail');
        $adminObject->displayButton();

        $localesObj = $localesHandler->get($localeId);
        //        $form = $xoops->getModuleForm($localesObj, 'locales');
        $form = new \XoopsModules\Tdmcreate\Form\LocalesForm($localesObj);

        $xoops->tpl()->assign('form', $form->render());
        break;
    case 'delete':
        if ($localeId > 0) {
            $localesObj = $localesHandler->get($localeId);
            if (isset($_POST['ok']) && 1 === $_POST['ok']) {
                if (!$xoops->security()->check()) {
                    $xoops->redirect('locales.php', 3, implode(',', $xoops->security()->getErrors()));
                }
                if ($localesHandler->delete($localesObj)) {
                    $xoops->redirect('locales.php', 2, sprintf(\TdmcreateLocale::S_DELETED, \TdmcreateLocale::IMPORT));
                } else {
                    $xoops->error($localesObj->getHtmlErrors());
                }
            } else {
                $xoops->confirm(['ok' => 1, 'id' => $localeId, 'op' => 'delete'], 'locales.php', sprintf(\TdmcreateLocale::QF_ARE_YOU_SURE_TO_DELETE, $localesObj->getVar('loc_file')) . '<br>');
            }
        } else {
            $xoops->redirect('locales.php', 1, \TdmcreateLocale::E_DATABASE_ERROR);
        }
        break;
}

require __DIR__ . '/footer.php';
