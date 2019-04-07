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
 * @author          Timgno <txmodxoops@gmail.com>
 *
 * @version         $Id: locales.php 13058 2015-05-06 14:56:29Z txmodxoops $
 */

use XoopsModules\Tdmcreate;
use Xoops\Core\Database\Connection;

/**
 * Class LocaleHandler.
 */
class LocalesHandler extends \XoopsPersistableObjectHandler
{
    /**
     * @param null|Connection $db
     */
    public function __construct(Connection $db = null)
    {
        parent::__construct($db, 'tdmcreate_locales', 'tdmcreatelocales', 'loc_id', 'loc_mid');
    }

    public function getAllLocales($start = 0, $limit = 0, $sort = 'loc_id ASC, loc_mid', $order = 'ASC')
    {
        $criteria = new CriteriaCompo();
        $criteria->setSort($sort);
        $criteria->setOrder($order);
        $criteria->setStart($start);
        $criteria->setLimit($limit);

        return parent::getAll($criteria);
    }

    public function getCountLocales($start = 0, $limit = 0, $sort = 'loc_id ASC, loc_mid', $order = 'ASC')
    {
        $criteria = new CriteriaCompo();
        $criteria->setSort($sort);
        $criteria->setOrder($order);
        $criteria->setStart($start);
        $criteria->setLimit($limit);

        return parent::getCount($criteria);
    }
}
