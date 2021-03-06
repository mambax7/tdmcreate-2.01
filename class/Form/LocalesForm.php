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

class LocalesForm extends \Xoops\Form\ThemeForm
{
    /**
     * @param Tdmcreate\Locales|\XoopsObject $obj
     */
    public function __construct(Tdmcreate\Locales $obj)
    {
        $xoops = \Xoops::getInstance();

        $title = $obj->isNew() ? \TdmcreateLocale::A_ADD_LOCALE : \TdmcreateLocale::A_EDIT_LOCALE;
        parent::__construct($title, 'form', 'locales.php', 'post', true);

        $this->addElement(new \Xoops\Form\Text(\TdmcreateLocale::LOCALE_FILE_NAME, 'loc_file', 50, 255, $obj->getVar('loc_file')), true);
        $this->addElement(new \Xoops\Form\Text(\TdmcreateLocale::LOCALE_DEFINE, 'loc_define', 50, 255, $obj->getVar('loc_define')), true);
        $this->addElement(new \Xoops\Form\Text(\TdmcreateLocale::LOCALE_DESCRIPTION, 'loc_description', 50, 255, $obj->getVar('loc_description')), true);

        $this->addElement(new \XoopsFormHidden('op', 'save'));
        $this->addElement(new \XoopsFormButton('', 'submit', \XoopsLocale::A_SUBMIT, 'submit'));
    }
}
