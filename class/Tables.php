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
 * Class Tables.
 */
class Tables extends \XoopsObject
{
    /**
     * Options.
     */
    public $optionsTables = [
        'blocks',
        'admin',
        'user',
        'submenu',
        'submit',
        'tag',
        'broken',
        'search',
        'comments',
        'notifications',
        'permissions',
        'rate',
        'print',
        'pdf',
        'rss',
        'single',
        'visit',
    ];

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->initVar('table_id', XOBJ_DTYPE_INT);
        $this->initVar('table_mid', XOBJ_DTYPE_INT);
        $this->initVar('table_category', XOBJ_DTYPE_INT);
        $this->initVar('table_name', XOBJ_DTYPE_TXTBOX);
        $this->initVar('table_solename', XOBJ_DTYPE_TXTBOX);
        $this->initVar('table_fieldname', XOBJ_DTYPE_TXTBOX);
        $this->initVar('table_nbfields', XOBJ_DTYPE_INT);
        $this->initVar('table_order', XOBJ_DTYPE_INT);
        $this->initVar('table_image', XOBJ_DTYPE_TXTBOX);
        $this->initVar('table_autoincrement', XOBJ_DTYPE_INT);
        $this->initVar('table_blocks', XOBJ_DTYPE_INT);
        $this->initVar('table_admin', XOBJ_DTYPE_INT);
        $this->initVar('table_user', XOBJ_DTYPE_INT);
        $this->initVar('table_submenu', XOBJ_DTYPE_INT);
        $this->initVar('table_submit', XOBJ_DTYPE_INT);
        $this->initVar('table_tag', XOBJ_DTYPE_INT);
        $this->initVar('table_broken', XOBJ_DTYPE_INT);
        $this->initVar('table_search', XOBJ_DTYPE_INT);
        $this->initVar('table_comments', XOBJ_DTYPE_INT);
        $this->initVar('table_notifications', XOBJ_DTYPE_INT);
        $this->initVar('table_permissions', XOBJ_DTYPE_INT);
        $this->initVar('table_rate', XOBJ_DTYPE_INT);
        $this->initVar('table_print', XOBJ_DTYPE_INT);
        $this->initVar('table_pdf', XOBJ_DTYPE_INT);
        $this->initVar('table_rss', XOBJ_DTYPE_INT);
        $this->initVar('table_single', XOBJ_DTYPE_INT);
        $this->initVar('table_visit', XOBJ_DTYPE_INT);
    }

    /**
     * Get Values.
     * @param null|mixed $keys
     * @param null|mixed $format
     * @param null|mixed $maxDepth
     * @return array|mixed
     */
    public function getValues($keys = null, $format = null, $maxDepth = null)
    {
        $ret = $this->getValues($keys, $format, $maxDepth);
        $ret['id'] = $this->getVar('table_id');
        $ret['mid'] = $this->getVar('table_mid');
        $ret['name'] = $this->getVar('table_name');
        if (\XoopsLoad::fileExists(XOOPS_ICONS32_PATH . '/' . $this->getVar('table_image'))) {
            $ret['image'] = XOOPS_ICONS32_URL . '/' . $this->getVar('table_image');
        } else {
            $ret['image'] = TDMC_UPLOAD_IMAGES_TABLES_URL . '/' . $this->getVar('table_image');
        }
        $ret['nbfields'] = number_format($this->getVar('table_nbfields'), 0);
        $ret['order'] = $this->getVar('table_order');
        $ret['admin'] = $this->getVar('table_admin');
        $ret['user'] = $this->getVar('table_user');
        $ret['blocks'] = $this->getVar('table_blocks');
        $ret['submenu'] = $this->getVar('table_submenu');
        $ret['search'] = $this->getVar('table_search');
        $ret['comments'] = $this->getVar('table_comments');
        $ret['notifications'] = $this->getVar('table_notifications');
        $ret['permissions'] = $this->getVar('table_permissions');

        return $ret;
    }

    /**
     * To Array.
     */
    public function toArray()
    {
        $ret = $this->getValues();

        return $ret;
    }

    /**
     * Get Insert Id.
     */
    public function getNewId()
    {
        return \Xoops::getInstance()->db()->getInsertId();
    }

    /**
     * Get Options.
     */
    public function getTablesOptions()
    {
        $retTable = [];
        foreach ($this->optionsTables as $optionTable) {
            if (1 === $this->getVar('table_' . $optionTable)) {
                $retTable[] = $optionTable;
            }
        }

        return $retTable;
    }
}
