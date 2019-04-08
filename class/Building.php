<?php

namespace XoopsModules\Tdmcreate;

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
 * @author          Timgno <txmodxoops@gmail.com>
 */
use XoopsModules\Tdmcreate;

/**
 * Class Building.
 */
class Building extends \Xoops\Form\ThemeForm
{
    /*
    *  @public function constructor class
    *  @param null
    */

    public function __construct()
    {
        $helper = Helper::getInstance();
        $xoops = \Xoops::getInstance();
        $xoops->theme()->addStylesheet('modules/tdmcreate/assets/css/styles.css');

        parent::__construct(\TdmcreateLocale::BUILDING_TITLE, 'form', 'building.php', 'post', true, 'raw');

//        $modulesHandler = $helper->getModulesHandler()->getObjects(null);
        $modulesHandler = new \XoopsModules\Tdmcreate\ModulesHandler();
        $modulesSelect = new \Xoops\Form\Select(\TdmcreateLocale::BUILDING_MODULES, 'mod_id', 'mod_id');
        $modulesSelect->addOption(0, \TdmcreateLocale::BUILDING_SELECT_DEFAULT);
        //$modulesSelect->addOptionArray($modulesHandler->getList());
        foreach ($modulesHandler as $mod) {
            $modulesSelect->addOption($mod->getVar('mod_id'), $mod->getVar('mod_name'));
        }
        $this->addElement($modulesSelect, true);

        $this->addElement(new \Xoops\Form\Hidden('op', 'build'));
        $this->addElement(new \Xoops\Form\Button(\XoopsLocale::REQUIRED . ' <sup class="red bold">*</sup>', 'submit', \XoopsLocale::A_SUBMIT, 'submit'));
    }

    /*
    *  @static function &getInstance
    *  @param null
    */

    /**
     * @return Tdmcreate\Building
     */
    public static function &getInstance()
    {
        static $instance = false;
        if (!$instance) {
            $instance = new self();
        }

        return $instance;
    }
}
