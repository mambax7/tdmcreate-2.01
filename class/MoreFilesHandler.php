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
 * morefiles class.
 *
 * @copyright       XOOPS Project (https://xoops.org)
 * @license         GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 *
 * @since           2.5.7
 *
 * @author          Txmod Xoops <webmaster@txmodxoops.org> - <http://www.txmodxoops.org/>
 *
 * @version         $Id: morefiles.php 13080 2015-06-12 10:12:32Z timgno $
 */

use XoopsModules\Tdmcreate;
use Xoops\Core\Database\Connection;

//include __DIR__ . '/autoload.php';
/*
*  @Class MoreFiles
*  @extends \XoopsObject
*/

/**
 * @Class   Tdmcreate\MoreFilesHandler
 * @extends \XoopsPersistableObjectHandler
 */
class MoreFilesHandler extends \XoopsPersistableObjectHandler
{
    /**
     * @public function constructor class
     * @param null|object $db
     */
    public function __construct(&$db)
    {
        parent::__construct($db, 'tdmcreate_morefiles', 'tdmcreatemorefiles', 'file_id', 'file_name');
    }

    /**
     * @param bool $isNew
     *
     * @return object
     */
    public function &create($isNew = true)
    {
        return parent::create($isNew);
    }

    /**
     * retrieve a field.
     *
     * @param int  $i field id
     * @param null $fields
     *
     * @return mixed reference to the <a href='psi_element://Tdmcreate\Fields'>Tdmcreate\Fields</a> object
     *               object
     */
    public function &get($i = null, $fields = null)
    {
        return parent::get($i, $fields);
    }

    /**
     * get inserted id.
     *
     * @param null
     *
     * @return int reference to the {@link Tdmcreate\Tables} object
     */
    public function &getInsertId()
    {
        return $this->db->getInsertId();
    }

    /**
     * insert a new field in the database.
     *
     * @param object $field reference to the {@link Tdmcreate\Fields} object
     * @param bool   $force
     *
     * @return bool FALSE if failed, TRUE if already present and unchanged or successful
     */
    public function &insert(&$field, $force = false)
    {
        if (!parent::insert($field, $force)) {
            return false;
        }

        return true;
    }

    /**
     * Get Count MoreFiles.
     * @param int    $start
     * @param int    $limit
     * @param string $sort
     * @param string $order
     * @return int
     */
    public function getCountMoreFiles($start = 0, $limit = 0, $sort = 'file_id ASC, file_name', $order = 'ASC')
    {
        $criteriaMoreFilesCount = new CriteriaCompo();
        $criteriaMoreFilesCount = $this->getMoreFilesCriteria($criteriaMoreFilesCount, $start, $limit, $sort, $order);

        return $this->getCount($criteriaMoreFilesCount);
    }

    /**
     * Get All MoreFiles.
     * @param int    $start
     * @param int    $limit
     * @param string $sort
     * @param string $order
     * @return array
     */
    public function getAllMoreFiles($start = 0, $limit = 0, $sort = 'file_id ASC, file_name', $order = 'ASC')
    {
        $criteriaMoreFilesAdd = new CriteriaCompo();
        $criteriaMoreFilesAdd = $this->getMoreFilesCriteria($criteriaMoreFilesAdd, $start, $limit, $sort, $order);

        return $this->getAll($criteriaMoreFilesAdd);
    }

    /**
     * Get All MoreFiles By Module Id.
     * @param        $modId
     * @param int    $start
     * @param int    $limit
     * @param string $sort
     * @param string $order
     * @return array
     */
    public function getAllMoreFilesByModuleId($modId, $start = 0, $limit = 0, $sort = 'file_id ASC, file_name', $order = 'ASC')
    {
        $criteriaMoreFilesByModuleId = new CriteriaCompo();
        $criteriaMoreFilesByModuleId->add(new Criteria('file_mid', $modId));
        $criteriaMoreFilesByModuleId = $this->getMoreFilesCriteria($criteriaMoreFilesByModuleId, $start, $limit, $sort, $order);

        return $this->getAll($criteriaMoreFilesByModuleId);
    }

    /**
     * Get MoreFiles Criteria.
     * @param $criteriaMoreFiles
     * @param $start
     * @param $limit
     * @param $sort
     * @param $order
     * @return
     */
    private function getMoreFilesCriteria($criteriaMoreFiles, $start, $limit, $sort, $order)
    {
        $criteriaMoreFiles->setStart($start);
        $criteriaMoreFiles->setLimit($limit);
        $criteriaMoreFiles->setSort($sort);
        $criteriaMoreFiles->setOrder($order);

        return $criteriaMoreFiles;
    }
}
