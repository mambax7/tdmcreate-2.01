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
 * Class Locale.
 */
class LocaleC extends \XoopsObject
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->initVar('loc_id', XOBJ_DTYPE_INT);
        $this->initVar('loc_mid', XOBJ_DTYPE_INT);
        $this->initVar('loc_file', XOBJ_DTYPE_TXTBOX);
        $this->initVar('loc_define', XOBJ_DTYPE_TXTBOX);
        $this->initVar('loc_description', XOBJ_DTYPE_TXTBOX);
    }

    public function getValues($keys = null, $format = null, $maxDepth = null)
    {
        $ret = parent::getValues($keys, $format, $maxDepth);
        $ret['mid'] = $this->getVar('loc_mid');
        $ret['file'] = $this->getVar('loc_file');
        $ret['define'] = $this->getVar('loc_define');
        $ret['description'] = $this->getVar('loc_description');

        return $ret;
    }

    public function toArray()
    {
        $ret = parent::getValues();
        unset($ret['dohtml']);

        return $ret;
    }
}
