<?php

namespace XoopsModules\Tdmcreate\Files;

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

defined('XOOPS_ROOT_PATH') || die('Restricted access');

class Admin extends Tdmcreate\File
{
    /**
     * File.
     *
     * @var array of {@link TDMCreate\File} objects
     */
    protected $adminFile = [];

    /**
     * Modules.
     *
     * @var array
     */
    protected $module = [];

    /**
     * Text.
     *
     * @var array
     */
    public $text = [];

    /**
     * Permissions.
     *
     * @var bool
     */
    private $permissions = false;

    /**
     * Adminpager.
     *
     * @var bool
     */
    private $adminpager = false;

    /**
     * Constructor.
     *
     * @param TDMCreate\File|null $file
     * @param string             $module
     * @param mixed              $text
     */
    public function __construct(TDMCreate\File $file = null, $module = '', $text = '')
    {
        if (isset($file)) {
            $this->create($file, $module);
            $this->text = $text;
        }
    }

    /**
     * @param TDMCreate\File $adminFile
     * @param string        $module
     *
     * @return \XoopsModules\Tdmcreate\Files\Admin
     */
    public function create(TDMCreate\File $adminFile, $module = '')
    {
        $this->adminFile[] = $adminFile;
        $this->module[] = $module;

        return $this;
    }

    /**
     * @param string $module
     * @param string $module_name
     * @param mixed  $tables_arr
     *
     * @return $this->text
     */
    public function adminHeader($module = null, $module_name = null, $tables_arr = [])
    {
        $this->text = [];
        $this->text[] = '<?php';
        $this->text[] = TDMCreate\Files\Common::getCommonHeader($module);
        $this->text[] = 'require_once dirname(dirname(dirname(__DIR__))) . \'/include/cp_header.php\';';
        $this->text[] = 'require_once dirname(__DIR__) . \'/include/common.php\';';
        $this->text[] = 'require_once dirname(__DIR__) . \'/include/functions.php\';';
        $this->text[] = '// Get main instance';
        $this->text[] = 'XoopsLoad::load(\'system\', \'system\');';
        $this->text[] = '$system = \System::getInstance();';
        $this->text[] = '// Get main locale instance';
        $this->text[] = '$xoops = \Xoops::getInstance();';
        $this->text[] = '$helper = ' . ucfirst($module_name) . '::getInstance();';
        $this->text[] = '$request = $xoops->request();';
        foreach (array_keys($tables_arr) as $i) {
            $table_name = $tables_arr[$i]->getVar('table_name');
            $this->text[] = '// Get handler ' . ucfirst($table_name);
            $this->text[] = '$' . mb_strtolower($table_name) . 'Handler = $helper->getHandler' . ucfirst($table_name) . '();';
        }
        $this->text[] = '// Get $_POST, $_GET, $_REQUEST';
        $this->text[] = '$op = $request->asStr(\'op\', \'list\');';
        $this->text[] = '$start = $request->asInt(\'start\', 0);';
        if ($this->getAdminPager()) {
            $this->text[] = '// Parameters';
            $this->text[] = '$nb_pager = $helper->getConfig(\'adminpager\');';
        }
        $this->text[] = '// Get admin menu istance';
        $this->text[] = '$admin_menu = new \XoopsModuleAdmin();';

        return $this->text;
    }

    /**
     * @param string $module
     * @param string $module_name
     *
     * @return $this->text
     */
    public function adminIndex($module = null, $module_name = null)
    {
        $this->text = [];
        $this->text[] = '<?php';
        $this->text[] = TDMCreate\Files\Common::getCommonHeader($module);

        return $this->text;
    }

    /**
     * @param string $module
     * @param string $module_name
     *
     * @return $this->text
     */
    public function adminFooter($module = null, $module_name = null)
    {
        $this->text[] = '<?php';
        $this->text[] = TDMCreate\Files\Common::getCommonHeader($module);
        $this->text[] = '$xoops->footer();';

        return $this->text;
    }

    /**
     * @param string $module
     * @param string $module_name
     *
     * @return $this->text
     */
    public function adminPages($module = null, $module_name = null)
    {
        $this->text[] = '<?php';
        $this->text[] = TDMCreate\Files\Common::getCommonHeader($module);

        return $this->text;
    }

    /**
     * @param string $module
     * @param string $module_name
     * @param mixed  $tables_arr
     *
     * @return $this->text
     */
    public function adminMenu($module = null, $module_name = null, $tables_arr = [])
    {
        $menu = 1;
        $this->text[] = '<?php';
        $this->text[] = TDMCreate\Files\Common::getCommonHeader($module);
        $this->text[] = '$adminmenu =[];';
        $this->text[] = '$i = 0;';
        $this->text[] = '$adminmenu[$i][\'title\'] = ' . $module_name . 'Locale::ADMIN_MENU' . $menu . ';';
        $this->text[] = '$adminmenu[$i][\'link\'] = \'admin/index.php\';';
        $this->text[] = '$adminmenu[$i][\'icon\'] = \'dashboard.png\';';
        $this->text[] = '$i++;';
        ++$menu;
        foreach (array_keys($tables_arr) as $i) {
            $this->text[] = '$adminmenu[$i][\'title\'] = ' . $module_name . 'Locale::ADMIN_MENU' . $menu . ';';
            $this->text[] = '$adminmenu[$i][\'link\'] = \'admin/' . $tables_arr[$i]->getVar('table_name') . '.php\';';
            $this->text[] = '$adminmenu[$i][\'icon\'] = \'' . $tables_arr[$i]->getVar('table_image') . '\';';
            $this->text[] = '$i++;';
            ++$menu;
        }
        if ($this->getPermissions()) {
            $this->text[] = '$adminmenu[$i][\'title\'] = ' . $module_name . 'Locale::ADMIN_MENU' . $menu . ';';
            $this->text[] = '$adminmenu[$i][\'link\'] = \'admin/permissions.php\';';
            $this->text[] = '$adminmenu[$i][\'icon\'] = \'permissions.png\';';
            $this->text[] = '$i++;';
            ++$menu;
        }
        $this->text[] = '$adminmenu[$i][\'title\'] = ' . $module_name . 'Locale::ADMIN_MENU' . $menu . ';';
        $this->text[] = '$adminmenu[$i][\'link\'] = \'admin/about.php\';';
        $this->text[] = '$adminmenu[$i][\'icon\'] = \'about.png\';';
        $this->text[] = 'unset($i);';
        unset($menu);

        return $this->text;
    }

    /**
     * @param string $module
     * @param mixed  $paypal
     *
     * @return $this->text
     */
    public function adminAbout($module = null, $paypal = '6KJ7RW5DR3VTJ')
    {
        $this->text[] = '<?php';
        $this->text[] = TDMCreate\Files\Common::getCommonHeader($module);
        $this->text[] = 'require __DIR__ . \'/header.php\'';
        $this->text[] = '// Header';
        $this->text[] = '$xoops->header();';
        $this->text[] = '// About';
        $this->text[] = '$admin_menu->displayNavigation(\'about.php\');';
        $this->text[] = '$admin_menu->displayAbout(\'' . $paypal . '\', true);';
        $this->text[] = '$xoops->footer();';

        return $this->text;
    }

    /**
     * @param string $module
     * @param string $module_name
     *
     * @return $this->text
     */
    public function adminPermissions($module = null, $module_name = null)
    {
        $this->text[] = '<?php';
        $this->text[] = TDMCreate\Files\Common::getCommonHeader($module);

        return $this->text;
    }

    /**
     * @param null
     * @return bool
     */
    private function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * @param null
     * @return bool
     */
    private function getAdminPager()
    {
        return $this->adminpager;
    }
}
