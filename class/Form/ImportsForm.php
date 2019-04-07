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
 * @author          Timgno <txmodxoops@gmail.com>
 *
 * @version         $Id: imports.php 10607 2012-12-30 00:36:57Z timgno $
 */


use XoopsModules\Tdmcreate;
class ImportsForm extends \Xoops\Form\ThemeForm
{
    /**
     * @param Tdmcreate\Imports|XoopsObject $obj
     */
    public function __construct(Tdmcreate\Imports &$obj)
    {
        $xoops = Xoops::getInstance();

        parent::__construct(Tdmcreate\Locale::IMPORT_TITLE, 'form', false, 'post', true);
        $this->setExtra('enctype="multipart/form-data"');

        $this->addElement(new Xoops\Form\Text(XoopsLocale::NAME, 'import_name', 50, 255, $obj->getVar('import_name')), true);

        $filetray = new Xoops\Form\ElementTray('', '<br />');
        $filetray->addElement(new Xoops\Form\File(XoopsLocale::A_UPLOAD, 'importfile', $xoops->getModuleConfig('maxuploadsize')));
        $filetray->addElement(new Xoops\Form\Label(''));
        $this->addElement($filetray);

        $this->addElement(new Xoops\Form\Hidden('op', 'save'));
        $this->addElement(new Xoops\Form\Button('', 'upload', XoopsLocale::A_SUBMIT, 'submit'));
    }
}
