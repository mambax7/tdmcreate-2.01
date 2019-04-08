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
 * Class FieldkeyHandler.
 */
class FieldkeyHandler extends \XoopsPersistableObjectHandler
{
    /**
     * @param null|\Xoops\Core\Database\Connection $db
     */
    public function __construct(\Xoops\Core\Database\Connection $db = null)
    {
        parent::__construct($db, 'tdmcreate_fieldkey', Fieldkey::class, 'fieldkey_id', 'fieldkey_name');
    }
}
