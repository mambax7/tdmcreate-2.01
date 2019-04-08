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
 * settings class.
 *
 * @copyright       XOOPS Project (https://xoops.org)
 * @license         GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 *
 * @since           2.5.7
 *
 * @author          TDM TEAM DEV MODULE
 */
use XoopsModules\Tdmcreate;

/**
 * Class SettingsHandler.
 */
class SettingsHandler extends \XoopsPersistableObjectHandler
{
    /**
     * @param \Xoops\Core\Database\Connection $db
     */
    public function __construct(\Xoops\Core\Database\Connection $db)
    {
        parent::__construct($db, 'tdmcreate_settings', Settings::class, 'set_id', 'set_name');
    }

    /**
     * @param bool $isNew
     *
     * @return object
     */
    public function create($isNew = true)
    {
        return parent::create($isNew);
    }

    /**
     * retrieve a field.
     *
     * @param int  $i field id
     * @param null $fields
     *
     * @return mixed reference to the <a href='psi_element://Tdmcreate\Settings'>Tdmcreate\Settings</a> object
     *               object
     */
    public function get($i = null, $fields = null)
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
    public function getInsertId()
    {
        return $this->db->getInsertId();
    }

    /**
     * Get Count Settings.
     * @param int    $start
     * @param int    $limit
     * @param string $sort
     * @param string $order
     * @return int
     */
    public function getCountSettings($start = 0, $limit = 0, $sort = 'set_id ASC, set_name', $order = 'ASC')
    {
        $criCountSettings = new \CriteriaCompo();
        $criCountSettings = $this->getSettingsCriteria($criCountSettings, $start, $limit, $sort, $order);

        return $this->getCount($criCountSettings);
    }

    /**
     * Get All Settings.
     * @param int    $start
     * @param int    $limit
     * @param string $sort
     * @param string $order
     * @return array
     */
    public function getAllSettings($start = 0, $limit = 0, $sort = 'set_id ASC, set_name', $order = 'ASC')
    {
        $criAllSettings = new \CriteriaCompo();
        $criAllSettings = $this->getSettingsCriteria($criAllSettings, $start, $limit, $sort, $order);

        return $this->getAll($criAllSettings);
    }

    /**
     * Get Settings Criteria.
     * @param $criSettings
     * @param $start
     * @param $limit
     * @param $sort
     * @param $order
     * @return
     */
    private function getSettingsCriteria($criSettings, $start, $limit, $sort, $order)
    {
        $criSettings->setStart($start);
        $criSettings->setLimit($limit);
        $criSettings->setSort($sort);
        $criSettings->setOrder($order);

        return $criSettings;
    }
}
