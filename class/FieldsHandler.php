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
use Xoops\Core\Database\Connection;
use XoopsModules\Tdmcreate;

/**
 * Class FieldsHandler.
 */
class FieldsHandler extends \XoopsPersistableObjectHandler
{
    /**
     * @param null|Connection $db
     */
    public function __construct(Connection $db = null)
    {
        parent::__construct($db, 'tdmcreate_fields', Fields::class, 'field_id', 'field_name');
    }

    /**
     * Get All Fields.
     * @param mixed $start
     * @param mixed $limit
     * @param mixed $sort
     * @param mixed $order
     * @return array
     */
    public function getAllFields($start = 0, $limit = 0, $sort = 'field_id ASC, field_name', $order = 'ASC')
    {
        $criteria = new \CriteriaCompo();
        $criteria->setSort($sort);
        $criteria->setOrder($order);
        $criteria->setStart($start);
        $criteria->setLimit($limit);

        return $this->getAll($criteria);
    }

    /**
     * Get All Fields By Table Id.
     * @param mixed $mid
     * @param mixed $tid
     * @param mixed $start
     * @param mixed $limit
     * @param mixed $sort
     * @param mixed $order
     * @return array
     */
    public function getAllFieldsByTableId($mid, $tid, $start = 0, $limit = 0, $sort = 'field_id ASC, field_name', $order = 'ASC')
    {
        $criteria = new \CriteriaCompo();
        $criteria->add(new \Criteria('field_mid', $mid));
        $criteria->add(new \Criteria('field_tid', $tid));
        $criteria->setSort($sort);
        $criteria->setOrder($order);
        $criteria->setStart($start);
        $criteria->setLimit($limit);

        return $this->getAll($criteria);
    }

    /**
     * Get Count Tables.
     * @param mixed $mid
     * @param mixed $tid
     * @param mixed $start
     * @param mixed $limit
     * @param mixed $sort
     * @param mixed $order
     * @return int
     */
    public function getCountFields($mid, $tid, $start = 0, $limit = 0, $sort = 'field_id ASC, field_name', $order = 'ASC')
    {
        $criteria = new \CriteriaCompo();
        $criteria->add(new \Criteria('field_mid', $mid));
        $criteria->add(new \Criteria('field_tid', $tid));
        $criteria->setSort($sort);
        $criteria->setOrder($order);
        $criteria->setStart($start);
        $criteria->setLimit($limit);

        return $this->getCount($criteria);
    }
}
