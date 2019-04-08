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
 * tdmcreate module
 *
 * @copyright       XOOPS Project (https://xoops.org)
 * @license         GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 * @package         tdmcreate
 * @since           2.6.0
 * @author          Timgno <txmodxoops@gmail.com>
 */
use XoopsModules\Tdmcreate;

defined('XOOPS_ROOT_PATH') || die('Restricted access');

class CLocale extends File
{
    /**
     * Constructor
     *
     * @param TDMCreate\File|null $file
     * @param string             $module
     * @param mixed              $text
     */
    public function __construct(TDMCreate\File $file = null, $module = '', $text = '')
    {
        if (isset($file)) {
            $this->create($file, $module);
            $this->text = $text;
        }
    }
}
