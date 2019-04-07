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
 * settings class.
 *
 * @copyright       XOOPS Project (https://xoops.org)
 * @license         GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 *
 * @since           2.5.7
 *
 * @author          TDM TEAM DEV MODULE
 *
 * @version         $Id: settings.php 13070 2015-05-19 12:24:20Z timgno $
 */
use XoopsModules\Tdmcreate;
use Xoops\Core\Database\Connection;

/*
*  @Class Settings
*  @extends \XoopsObject
*/

/**
 * Class Settings.
 */
class Settings extends \XoopsObject
{
    /**
     * Instance of TDMCreate class.
     *
     * @var mixed
     */
    private $tdmcreate;

    /**
     * Options.
     */
    public $options = [
        'admin',
        'user',
        'blocks',
        'search',
        'comments',
        'notifications',
        'permissions',
        'inroot_copy',
    ];

    /*
    *  @public function constructor class
    *  @param null
    */

    public function __construct()
    {
        $this->tdmcreate = Tdmcreate\Helper::getInstance();
        $this->initVar('set_id', XOBJ_DTYPE_INT);
        $this->initVar('set_name', XOBJ_DTYPE_TXTBOX, $this->tdmcreate->getConfig('name'));
        $this->initVar('set_dirname', XOBJ_DTYPE_TXTBOX, $this->tdmcreate->getConfig('dirname'));
        $this->initVar('set_version', XOBJ_DTYPE_TXTBOX, $this->tdmcreate->getConfig('version'));
        $this->initVar('set_since', XOBJ_DTYPE_TXTBOX, $this->tdmcreate->getConfig('since'));
        $this->initVar('set_min_php', XOBJ_DTYPE_TXTBOX, $this->tdmcreate->getConfig('min_php'));
        $this->initVar('set_min_xoops', XOBJ_DTYPE_TXTBOX, $this->tdmcreate->getConfig('min_xoops'));
        $this->initVar('set_min_admin', XOBJ_DTYPE_TXTBOX, $this->tdmcreate->getConfig('min_admin'));
        $this->initVar('set_min_mysql', XOBJ_DTYPE_TXTBOX, $this->tdmcreate->getConfig('min_mysql'));
        $this->initVar('set_description', XOBJ_DTYPE_TXTAREA, $this->tdmcreate->getConfig('description'));
        $this->initVar('set_author', XOBJ_DTYPE_TXTBOX, $this->tdmcreate->getConfig('author'));
        $this->initVar('set_author_mail', XOBJ_DTYPE_TXTBOX, $this->tdmcreate->getConfig('author_email'));
        $this->initVar('set_author_website_url', XOBJ_DTYPE_TXTBOX, $this->tdmcreate->getConfig('author_website_url'));
        $this->initVar('set_author_website_name', XOBJ_DTYPE_TXTBOX, $this->tdmcreate->getConfig('author_website_name'));
        $this->initVar('set_credits', XOBJ_DTYPE_TXTBOX, $this->tdmcreate->getConfig('credits'));
        $this->initVar('set_license', XOBJ_DTYPE_TXTBOX, $this->tdmcreate->getConfig('license'));
        $this->initVar('set_release_info', XOBJ_DTYPE_TXTBOX, $this->tdmcreate->getConfig('release_info'));
        $this->initVar('set_release_file', XOBJ_DTYPE_TXTBOX, $this->tdmcreate->getConfig('release_file'));
        $this->initVar('set_manual', XOBJ_DTYPE_TXTBOX, $this->tdmcreate->getConfig('manual'));
        $this->initVar('set_manual_file', XOBJ_DTYPE_TXTBOX, $this->tdmcreate->getConfig('manual_file'));
        $this->initVar('set_image', XOBJ_DTYPE_TXTBOX, $this->tdmcreate->getConfig('image'));
        $this->initVar('set_demo_site_url', XOBJ_DTYPE_TXTBOX, $this->tdmcreate->getConfig('demo_site_url'));
        $this->initVar('set_demo_site_name', XOBJ_DTYPE_TXTBOX, $this->tdmcreate->getConfig('demo_site_name'));
        $this->initVar('set_support_url', XOBJ_DTYPE_TXTBOX, $this->tdmcreate->getConfig('support_url'));
        $this->initVar('set_support_name', XOBJ_DTYPE_TXTBOX, $this->tdmcreate->getConfig('support_name'));
        $this->initVar('set_website_url', XOBJ_DTYPE_TXTBOX, $this->tdmcreate->getConfig('website_url'));
        $this->initVar('set_website_name', XOBJ_DTYPE_TXTBOX, $this->tdmcreate->getConfig('website_name'));
        $this->initVar('set_release', XOBJ_DTYPE_TXTBOX, $this->tdmcreate->getConfig('release_date'));
        $this->initVar('set_status', XOBJ_DTYPE_TXTBOX, $this->tdmcreate->getConfig('status'));
        $this->initVar('set_admin', XOBJ_DTYPE_INT, $this->tdmcreate->getConfig('display_admin'));
        $this->initVar('set_user', XOBJ_DTYPE_INT, $this->tdmcreate->getConfig('display_user'));
        $this->initVar('set_blocks', XOBJ_DTYPE_INT, $this->tdmcreate->getConfig('active_blocks'));
        $this->initVar('set_search', XOBJ_DTYPE_INT, $this->tdmcreate->getConfig('active_search'));
        $this->initVar('set_comments', XOBJ_DTYPE_INT, $this->tdmcreate->getConfig('active_comments'));
        $this->initVar('set_notifications', XOBJ_DTYPE_INT, $this->tdmcreate->getConfig('active_notifications'));
        $this->initVar('set_permissions', XOBJ_DTYPE_INT, $this->tdmcreate->getConfig('active_permissions'));
        $this->initVar('set_inroot_copy', XOBJ_DTYPE_INT, $this->tdmcreate->getConfig('inroot_copy'));
        $this->initVar('set_donations', XOBJ_DTYPE_TXTBOX, $this->tdmcreate->getConfig('donations'));
        $this->initVar('set_subversion', XOBJ_DTYPE_TXTBOX, $this->tdmcreate->getConfig('subversion'));
        $this->initVar('set_type', XOBJ_DTYPE_TXTBOX);
    }

    /**
     * @param string $method
     * @param array  $args
     *
     * @return mixed
     */
    public function __call($method, $args)
    {
        $arg = isset($args[0]) ? $args[0] : null;

        return $this->getVar($method, $arg);
    }

    /*
    *  @static function getInstance
    *  @param null
    */

    /**
     * @return Tdmcreate\Settings
     */
    public static function getInstance()
    {
        static $instance = false;
        if (!$instance) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Get Values.
     * @param null $keys
     * @param null $format
     * @param null $maxDepth
     * @return array
     */
    public function getValuesSettings($keys = null, $format = null, $maxDepth = null)
    {
        $ret = $this->getValues($keys, $format, $maxDepth);
        // Values
        $ret['id'] = $this->getVar('set_id');
        $ret['name'] = $this->getVar('set_name');
        $ret['version'] = $this->getVar('set_version');
        $ret['image'] = $this->getVar('set_image');
        $ret['release'] = $this->getVar('set_release');
        $ret['status'] = $this->getVar('set_status');
        $ret['type'] = $this->getVar('set_type');

        return $ret;
    }

    /**
     * Get Options Settings
     * @return string
     * @internal param $key
     */
    private function getOptionsSettings()
    {
        $retSet = [];
        foreach ($this->options as $option) {
            if (1 == $this->getVar('set_' . $option)) {
                array_push($retSet, $option);
            }
        }

        return $retSet;
    }

    /**
     * Get Defined Language.
     * @param $lang
     *
     * @return string
     */
    private static function getDefinedLanguage($lang)
    {
        if (defined($lang)) {
            return constant($lang);
        }

        return $lang;
    }
}
