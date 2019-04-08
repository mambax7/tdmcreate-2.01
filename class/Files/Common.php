<?php

namespace XoopsModules\Tdmcreate\Files;

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

defined('XOOPS_ROOT_PATH') || die('Restricted access');

class Common /*extends File*/
{
    /**
     * Constructor.
     *
     * @param string $module
     * @param string $text
     */
    public function __construct($module = '', $text = '')
    {
        $this->module = $module;
        $this->text = $text;
    }

    /**
     * @param string $module
     * @return string
     */
    public static function getCommonHeader($module)
    {
        $name = $module->getVar('mod_name');
        $version = $module->getVar('mod_version');
        $author = $module->getVar('mod_author');
        $mail = $module->getVar('mod_author_mail');
        $nickname = $module->getVar('mod_credits');
        $subversion = $module->getVar('mod_subversion');
        $datetime = date('Y/m/d G:i:s');

        $text = '/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

/**
 * ' . $module_name . ' module
 *
 * @copyright       XOOPS Project (https://xoops.org)
 * @license         GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 * @package         ' . $module_name . '
 * @since           2.6.0
 * @author          ' . $author . ' <' . $mail . '>
 * @version         $Id: ' . $version . ' ' . $filename . '.php ' . $subversion . ' ' . $datetime . 'Z ' . $nickname . ' $
 */';

        return $text;
    }
}
