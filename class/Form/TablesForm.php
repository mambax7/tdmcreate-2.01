<?php namespace XoopsModules\Tdmcreate\Form;

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
 * @version         $Id: tables.php 11387 2013-04-16 15:19:57Z txmodxoops $
 */

use XoopsModules\Tdmcreate;

defined('XOOPS_ROOT_PATH') || die('XOOPS root path not defined');

class TablesForm extends \Xoops\Form\ThemeForm
{
    /**
     * @param Tdmcreate\Tables|XoopsObject $obj
     */
    public function __construct(Tdmcreate\Tables &$obj)
    {
        $helper = \XoopsModules\Tdmcreate\Helper::getInstance();
        $xoops = $helper->xoops();
        $xoops->theme()->addStylesheet('modules/tdmcreate/assets/css/styles.css');

        $title = $obj->isNew() ? sprintf(Tdmcreate\Locale::A_ADD_TABLE) : sprintf(Tdmcreate\Locale::A_EDIT_TABLE);
        parent::__construct($title, 'form', 'tables.php', 'post', true, 'raw');

        $tabtray = new Xoops\Form\TabTray('', 'uniqueid', $xoops->getModuleConfig('jquery_theme', 'system'));

        $tab1 = new Xoops\Form\Tab(Tdmcreate\Locale::IMPORTANT, 'important');

        $modulesHandler = $xoops->getModuleHandler('modules');
        $modulesSelect = new Xoops\Form\Select(Tdmcreate\Locale::MODULES_LIST, 'table_mid', $obj->getVar('table_mid'));
        $modulesSelect->addOption(0, Tdmcreate\Locale::MODULE_SELECT_DEFAULT);
        $modulesSelect->addOptionArray($modulesHandler->getList());
        $tab1->addElement($modulesSelect, true);

        $tableName = new Xoops\Form\Text(Tdmcreate\Locale::TABLE_NAME, 'table_name', 50, 255, $obj->getVar('table_name'));
        $tableName->setDescription(Tdmcreate\Locale::TABLE_NAME_DESC);
        $tab1->addElement($tableName, true);
        $tableSoleName = new Xoops\Form\Text(Tdmcreate\Locale::TABLE_SOLE_NAME, 'table_solename', 10, 100, $obj->getVar('table_solename'));
        $tableSoleName->setDescription(Tdmcreate\Locale::TABLE_SOLE_NAME_DESC);
        $tab1->addElement($tableSoleName, true);
        $tableFieldname = new Xoops\Form\Text(Tdmcreate\Locale::TABLE_FIELD_NAME, 'table_fieldname', 3, 50, $obj->getVar('table_fieldname'));
        $tableFieldname->setDescription(Tdmcreate\Locale::TABLE_FIELD_NAME_DESC);
        $tab1->addElement($tableFieldname);
        $tableNmbField = new Xoops\Form\Text(Tdmcreate\Locale::TABLE_FIELDS_NUMBER, 'table_nbfields', 2, 50, $obj->getVar('table_nbfields'));
        $tableNmbField->setDescription(Tdmcreate\Locale::TABLE_FIELDS_NUMBER_DESC);
        $tab1->addElement($tableNmbField, true);
        $tableOrder = $obj->isNew() ? 0 : $obj->getVar('table_order');
        $tableOrder = new Xoops\Form\Text(Tdmcreate\Locale::TABLE_ORDER, 'table_order', 2, 50, $tableOrder);
        $tableOrder->setDescription(Tdmcreate\Locale::TABLE_ORDER_DESC);
        $tab1->addElement($tableOrder, true);
        // Table Image
        $tableImage = $obj->getVar('table_image');
        $tableImage = $tableImage ? $tableImage : 'blank.gif';
        $uploadDir = 'media/xoops/images/icons/32';
        $imageTray = new Xoops\Form\ElementTray(Tdmcreate\Locale::C_IMAGE, '<br />');
        $imagePath = sprintf(Tdmcreate\Locale::CF_IMAGE_PATH, './' . $uploadDir . '/');
        $imageSelect = new Xoops\Form\Select($imagePath, 'tables_image', $tableImage, 5);
        $imageArray = XoopsLists::getImgListAsArray(XOOPS_ROOT_PATH . '/' . $uploadDir);
        foreach ($imageArray as $image) {
            $imageSelect->addOption("{$image}", $image);
        }
        $imageSelect->setExtra("onchange='showImgSelected(\"image3\", \"tables_image\", \"" . $uploadDir . '", "", "' . XOOPS_URL . "\")'");
        $imageTray->addElement($imageSelect);
        $imageTray->addElement(new Xoops\Form\Label('', "<br /><img src='" . XOOPS_URL . '/' . $uploadDir . '/' . $tableImage . "' name='image3' id='image3' alt='' />"));
        $fileSelectTray = new Xoops\Form\ElementTray('', '<br />');
        $fileSelectTray->addElement(new Xoops\Form\File(XoopsLocale::A_UPLOAD, 'tables_image', $xoops->getModuleConfig('maxuploadsize')));
        $fileSelectTray->addElement(new Xoops\Form\Label(''));
        $imageTray->addElement($fileSelectTray);
        $tab1->addElement($imageTray);
        $tabtray->addElement($tab1);
        /*
         * Not important
         */
        $tab2 = new Xoops\Form\Tab(Tdmcreate\Locale::OPTIONS_CHECK, 'options_check');
        $tableAutoIngrement = $obj->isNew() ? 1 : $obj->getVar('table_autoincrement');
        $tableAutoIngrement = new \Xoops\Form\RadioYesNo(Tdmcreate\Locale::TABLE_AUTOINCREMENT, 'table_autoincrement', $tableAutoIngrement);
        $tableAutoIngrement->setDescription(Tdmcreate\Locale::TABLE_AUTOINCREMENT_DESC);
        $tab2->addElement($tableAutoIngrement);
        $tableRadioCategory = $obj->isNew() ? 0 : $obj->getVar('table_category');
        $tableRadioYNCategory = new \Xoops\Form\RadioYesNo(Tdmcreate\Locale::TABLE_CATEGORY, 'table_category', $tableRadioCategory);
        $tableRadioYNCategory->setDescription(Tdmcreate\Locale::TABLE_CATEGORY_DESC);
        $tab2->addElement($tableRadioYNCategory);
        $optionTray = new Xoops\Form\ElementTray(XoopsLocale::OPTIONS, '<br />');
        $tableCheckboxAll = new Xoops\Form\CheckBox('', 'tablebox', 1);
        $tableCheckboxAll->addOption('allbox', Tdmcreate\Locale::C_CHECK_ALL);
        $tableCheckboxAll->setExtra(" onclick='xoopsCheckGroup(\"form\", \"tablebox\" , \"table_option[]\");' ");
        $tableCheckboxAll->setClass('xo-checkall');
        $optionTray->addElement($tableCheckboxAll);

        $tableOption = $obj->getTablesOptions();
        $checkbox = new Xoops\Form\Checkbox('<hr />', 'table_option', $tableOption, false);
        $checkbox->setDescription(Tdmcreate\Locale::TABLE_OPTIONS_DESC);
        foreach ($obj->optionsTables as $option) {
            $checkbox->addOption($option, Xoops_Locale::translate('O_TABLE_' . mb_strtoupper($option), 'tdmcreate'));
        }
        $optionTray->addElement($checkbox);
        $tab2->addElement($optionTray);
        /*
         * Button submit
         */
        $buttonTray = new Xoops\Form\ElementTray('', '');
        $buttonTray->addElement(new Xoops\Form\Hidden('op', 'save'));

        $button = new Xoops\Form\Button('', 'submit', XoopsLocale::A_SUBMIT, 'submit');
        $button->setClass('btn');
        $buttonTray->addElement($button);
        $tab2->addElement($buttonTray);
        $tabtray->addElement($tab2);

        if (!$obj->isNew()) {
            $this->addElement(new Xoops\Form\Hidden('table_id', $obj->getVar('table_id')));
        }

        $this->addElement($tabtray);
    }
}
