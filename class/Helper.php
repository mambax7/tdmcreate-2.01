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
 * @author          TXMod Xoops (aka Timgno)
 */
use XoopsModules\Tdmcreate;
use Xoops\Core\Database\Connection;

class Helper extends \Xoops\Module\Helper\HelperAbstract
{
    /**
     * Init the module.
     *
     * @return null|void
     */
    public function init()
    {
        $this->setDirname('tdmcreate');
    }

    /**
     * @return \Xoops\Module\Helper\HelperAbstract
     */
    public static function getInstance()
    {
        return parent::getInstance();
    }

    /**
     * @return \Xoops\Core\Kernel\XoopsObjectHandler
     */
    public function getModulesHandler()
    {
        return $this->getHandler('Modules');
    }

    /**
     * @return \Xoops\Core\Kernel\XoopsObjectHandler
     */
    public function getTablesHandler()
    {
        return $this->getHandler('Tables');
    }

    /**
     * @return \Xoops\Core\Kernel\XoopsObjectHandler
     */
    public function getFieldsHandler()
    {
        return $this->getHandler('Fields');
    }

    /**
     * @return \Xoops\Core\Kernel\XoopsObjectHandler
     */
    public function getLocalesHandler()
    {
        return $this->getHandler('Locales');
    }

    /**
     * @return \Xoops\Core\Kernel\XoopsObjectHandler
     */
    public function getImportsHandler()
    {
        return $this->getHandler('Imports');
    }

    /**
     * @return \Xoops\Core\Kernel\XoopsObjectHandler
     */
    public function getFieldTypeHandler()
    {
        return $this->getHandler('Fieldtype');
    }

    /**
     * @return \Xoops\Core\Kernel\XoopsObjectHandler
     */
    public function getFieldAttributesHandler()
    {
        return $this->getHandler('Fieldattributes');
    }

    /**
     * @return \Xoops\Core\Kernel\XoopsObjectHandler
     */
    public function getFieldNullHandler()
    {
        return $this->getHandler('Fieldnull');
    }

    /**
     * @return \Xoops\Core\Kernel\XoopsObjectHandler
     */
    public function getFieldKeyHandler()
    {
        return $this->getHandler('Fieldkey');
    }

    /**
     * @return \Xoops\Core\Kernel\XoopsObjectHandler
     */
    public function getSettingsHandler()
    {
        return $this->getHandler('Settings');
    }

    /**
     * @return \Xoops\Core\Kernel\XoopsObjectHandler
     */
    public function getFieldElementsHandler()
    {
        return $this->getHandler('Fieldelements');
    }

    /**
     * Get an Object Handler
     *
     * @param string $name name of handler to load
     *
     * @return bool|\XoopsObjectHandler|\XoopsPersistableObjectHandler
     */
    public function getHandler($name)
    {
        $ret   = false;

        $class = '\\XoopsModules\\' . ucfirst(mb_strtolower(basename(dirname(__DIR__)))) . '\\' . $name . 'Handler';
        if (!class_exists($class)) {
            throw new \RuntimeException("Class '$class' not found");
        }
        /** @var \Xoops\Core\Database\Connection $db */
//        $db     = \XoopsDatabaseFactory::getDatabaseConnection();
        $db = \Xoops::getInstance()->db();
        $helper = self::getInstance();
        $ret    = new $class($db, $helper);
        $this->addLog("Getting handler '{$name}'");
        return $ret;
    }
}
