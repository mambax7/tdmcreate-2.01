<?php namespace XoopsModules\Tdmcreate;

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
 *
 * @version         $Id: tables.php 10665 2012-12-27 10:14:15Z timgno $
 */

use XoopsModules\Tdmcreate;
use Xoops\Core\Database\Connection;

/**
 * Class TablesHandler.
 */
class TablesHandler extends \XoopsPersistableObjectHandler
{
    /**
     * @param null|Connection $db
     */
    public function __construct(Connection $db = null)
    {
        parent::__construct($db, 'tdmcreate_tables', 'tdmcreatetables', 'table_id', 'table_name');
    }

    /**
     * Get All Tables.
     * @param mixed $start
     * @param mixed $limit
     * @param mixed $sort
     * @param mixed $order
     */
    public function getAllTables($start = 0, $limit = 0, $sort = 'table_id ASC, table_name', $order = 'ASC')
    {
        $criteria = new CriteriaCompo();
        $criteria->setSort($sort);
        $criteria->setOrder($order);
        $criteria->setStart($start);
        $criteria->setLimit($limit);

        return $this->getAll($criteria);
    }

    /**
     * Get All Tables By Module Id.
     * @param mixed $mid
     * @param mixed $start
     * @param mixed $limit
     * @param mixed $sort
     * @param mixed $order
     */
    public function getAllTablesByModuleId($mid, $start = 0, $limit = 0, $sort = 'table_id ASC, table_name', $order = 'ASC')
    {
        $criteria = new CriteriaCompo();
        $criteria->add(new Criteria('table_mid', $mid));
        $criteria->setSort($sort);
        $criteria->setOrder($order);
        $criteria->setStart($start);
        $criteria->setLimit($limit);

        return $this->getAll($criteria);
    }

    /**
     * Get Count Tables.
     * @param mixed $start
     * @param mixed $limit
     * @param mixed $sort
     * @param mixed $order
     */
    public function getCountTables($start = 0, $limit = 0, $sort = 'table_id ASC, table_name', $order = 'ASC')
    {
        $criteria = new CriteriaCompo();
        $criteria->setSort($sort);
        $criteria->setOrder($order);
        $criteria->setStart($start);
        $criteria->setLimit($limit);

        return $this->getCount($criteria);
    }
}
