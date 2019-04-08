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
 * tdmcreate module
 *
 * @copyright       XOOPS Project (https://xoops.org)
 * @license         GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 * @package         tdmcreate
 * @since           2.6.0
 * @author          XOOPS Development Team
 */
require __DIR__ . '/header.php';
// Get $_POST, $_GET, $_REQUEST
$op = Request::getCmd('op', 'list');
$start = Request::getInt('start', 0);
// Parameters
$limit = $helper->getConfig('adminpager');
// heaser
$xoops->header('admin:tdmcreate/tdmcreate_locale.tpl');

$localeId = Request::getInt('loc_id', 0);

$adminObject->renderNavigation('locale.php');

switch ($op) {
    case 'list':
        $adminObject->addTips(\TdmcreateLocale::LOCALE_TIPS);
        $adminObject->addItemButton(\TdmcreateLocale::A_ADD_LOCALE, 'locale.php?op=new', 'add');
        $adminObject->renderTips();
        $adminObject->displayButton();
        // Get modules list
        $criteria = new \CriteriaCompo();
        $criteria->setSort('loc_id');
        $criteria->setOrder('ASC');
        $criteria->setStart($start);
        $criteria->setLimit($limit);
        $numLocale = $localeHandler->getCount($criteria);
        $localeArr = $localeHandler->getAll($criteria);
        // Assign Template variables
        $xoops->tpl()->assign('locale_count', $numLocale);
        unset($criteria);
        if ($numLocale > 0) {
            foreach (array_keys($localeArr) as $i) {
                $locale['id'] = $localeArr[$i]->getVar('loc_id');
                $locale['mid'] = $localeArr[$i]->getVar('loc_mid');
                $locale['name'] = $localeArr[$i]->getVar('loc_file');
                $locale['define'] = $localeArr[$i]->getVar('loc_define');
                $locale['description'] = $localeArr[$i]->getVar('loc_description');
                $xoops->tpl()->appendByRef('locale', $locale);
                unset($locale);
            }
            // Display Page Navigation
            if ($numrows > $limit) {
                $nav = new \XoopsPageNav($numrows, $limit, $start, 'start');
                $xoops->tpl()->assign('pagenav', $nav->renderNav(4));
            }
        } else {
            $xoops->tpl()->assign('error_message', \TdmcreateLocale::E_NO_LOCALE);
        }
        break;
    case 'new':
        $adminObject->addItemButton(\TdmcreateLocale::A_LIST_LOCALE, 'locale.php', 'application-view-detail');
        $adminObject->displayButton();

        $localeObj = $localeHandler->create();
//        $form = $xoops->getModuleForm($localeObj, 'locale');
        $form = new \XoopsModules\Tdmcreate\Form\LocaleForm($localeObj);
        $xoops->tpl()->assign('form', $form->render());
        break;
    case 'save':
        if (!$xoops->security()->check()) {
            $xoops->redirect('modules.php', 3, implode(',', $xoops->security()->getErrors()));
        }

        if ($localeId > 0) {
            $localeObj = $localeHandler->get($localeId);
            //Form imported edited save
            $localeObj->setVar('loc_mid', Request::getInt('loc_mid'));
            $localeObj->setVar('loc_file', Request::getString('loc_file'));
            $localeObj->setVar('loc_define', Request::getString('loc_define'));
            $localeObj->setVar('loc_description', Request::getString('loc_description'));
            $xoops->redirect('locale.php', 3, \TdmcreateLocale::E_DATABASE_SQL_FILE_NOT_IMPORTED);
        }
        if ($localeHandler->insert($localeObj)) {
            $xoops->redirect('locale.php', 3, \TdmcreateLocale::FORM_OK);
        }

        $xoops->error($localeObj->getHtmlErrors());
        //        $form = $xoops->getModuleForm($localeObj, 'locale');
        $form = new \XoopsModules\Tdmcreate\Form\LocaleForm($localeObj);
        $xoops->tpl()->assign('form', $form->render());
        break;
    case 'edit':
        $adminObject->addItemButton(\TdmcreateLocale::A_ADD_LOCALE, 'locale.php?op=new', 'add');
        $adminObject->addItemButton(\TdmcreateLocale::A_LIST_LOCALE, 'locale.php', 'application-view-detail');
        $adminObject->displayButton();

        $localeObj = $localeHandler->get($localeId);
        //        $form = $xoops->getModuleForm($localeObj, 'locale');
        $form = new \XoopsModules\Tdmcreate\Form\LocaleForm($localeObj);
        $xoops->tpl()->assign('form', $form->render());
        break;
    case 'delete':
        if ($localeId > 0) {
            $localeObj = $localeHandler->get($localeId);
            if (isset($_POST['ok']) && 1 === $_POST['ok']) {
                if (!$xoops->security()->check()) {
                    $xoops->redirect('locale.php', 3, implode(',', $xoops->security()->getErrors()));
                }
                if ($localeHandler->delete($localeObj)) {
                    $xoops->redirect('locale.php', 2, sprintf(\TdmcreateLocale::S_DELETED, \TdmcreateLocale::IMPORT));
                } else {
                    $xoops->error($localeObj->getHtmlErrors());
                }
            } else {
                $xoops->confirm(['ok' => 1, 'id' => $localeId, 'op' => 'delete'], 'locale.php', sprintf(\TdmcreateLocale::QF_ARE_YOU_SURE_TO_DELETE, $localeObj->getVar('loc_file')) . '<br>');
            }
        } else {
            $xoops->redirect('locale.php', 1, \TdmcreateLocale::E_DATABASE_ERROR);
        }
        break;
}

require __DIR__ . '/footer.php';
