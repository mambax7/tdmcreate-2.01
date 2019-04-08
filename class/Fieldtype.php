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
 * @author          TDM Xoops (AKA Developers)
 */
use XoopsModules\Tdmcreate;

/**
 * Class Fieldtype.
 */
class Fieldtype extends \XoopsObject
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->initVar('fieldtype_id', XOBJ_DTYPE_INT);
        $this->initVar('fieldtype_name', XOBJ_DTYPE_TXTBOX);
        $this->initVar('fieldtype_value', XOBJ_DTYPE_TXTBOX);
    }
}
