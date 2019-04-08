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

class Folder extends \XoopsFolderHandler
{
    /**
     * Constructor.
     *
     * @param string $path   Path to folder
     * @param bool   $create Create folder if not found
     * @param mixed  $mode   Mode (CHMOD) to apply to created folder, false to ignore
     */
    public function __construct($path = '', $create = true, $mode = false)
    {
        parent::__construct($path, $create, $mode);
    }

    /**
     * Create a directory.
     *
     * @param string   $path The directory structure to create
     * @param int|bool $mode octal value 0755
     */
    public function create($path = '', $mode = false)
    {
        parent::create($path, $mode);
    }

    /**
     * Change the mode on a directory structure recursively.
     *
     * @param string   $path The path to chmod
     * @param int|bool $mode octal value 0755
     */
    public function chmod($path, $mode)
    {
        parent::chmod($path, $mode);
    }
}
