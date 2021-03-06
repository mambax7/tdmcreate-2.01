<?php

namespace XoopsModules\Tdmcreate\Form;

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

class BuildingForm extends \Xoops\Form\ThemeForm
{
    /**
     * @param Tdmcreate\Building|\XoopsObject $obj
     */
    public function __construct(Tdmcreate\Building $obj)
    {
        parent::__construct(\TdmcreateLocale::BUILDING_TITLE, 'form', 'building.php', 'post', true, 'raw');

        $moduleSelect = new \Xoops\Form\Select(\TdmcreateLocale::BUILDING_MODULES, 'mod_name', 'mod_name');
        $moduleSelect->addOption(0, \TdmcreateLocale::BUILDING_SELECT_DEFAULT_MODULES);
        $moduleSelect->addOptionArray($modulesHandler->getList());
        $form->addElement($moduleSelect);

        $this->addElement(new \XoopsFormHidden('op', 'build'));
        $this->addElement(new \XoopsFormButton('', 'submit', \XoopsLocale::A_SUBMIT, 'submit'));
    }
}
