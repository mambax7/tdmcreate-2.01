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

class File extends \XoopsFileHandler
{
    /**
     * Constructor.
     *
     * @param string $path   Path to file
     * @param bool   $create Create file if it does not exist (if true)
     * @param int    $mode   Mode to apply to the folder holding the file
     */
    public function __construct($path, $create = false, $mode = 0755)
    {
        parent::__construct($path, $create, $mode);
        $this->create();
    }

    /**
     * @param string $path_name
     * @param string $module_name
     * @param string $dirname
     * @param string $file
     * @return string
     */
    public function getDirFile($path_name, $module_name, $dirname, $file)
    {
        return $path_name . '/' . $module_name . '/' . $dirname . '/' . $file;
    }

    /**
     * @param string $path
     * @param string $text
     * @param string $lng_ok
     * @param string $lng_notok
     * @param string $file
     */
    public function createFile($path, $text, $lng_ok, $lng_notok, $file)
    {
        $this->path = $path;
        $this->open('a+');
        if ($this->writable()) {
            if (false === $this->write($text)) {
                echo '<tr>
					 <td>' . sprintf($lng_notok, $file) . '</td>
					 <td><img src=' . $pathIcon16 . '/off.png></td>
				  </tr>';
                exit;
            }
            echo '<tr>
						  <td>' . sprintf($lng_ok, $file) . '</td>
						  <td><img src=' . $pathIcon16 . '/on.png></td>
				  </tr>';
            $this->close();
        } else {
            echo '<tr>
						  <td>' . sprintf($lng_notok, $file) . '</td>
						  <td><img src=' . $pathIcon16 . '/off.png></td>
				  </tr>';
        }
    }
}
