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
 * @author          Timgno <txmodxoops@gmail.com>
 */
use XoopsModules\Tdmcreate;

class XoopsVersionFile extends File
{
    /**
     * Constructor.
     *
     * @param string $path   Path to file
     * @param bool   $create Create file if it does not exist (if true)
     * @param int    $mode   Mode to apply to the folder holding the file
     */
    private function __construct($path, $create = false, $mode = 0755)
    {
        parent::__construct($path, $create, $mode);
    }

    /*
     *
     * @param string $folder
     * @param string $file
     */
    public function createXoopsVersionFile($folder, $file, $elements = [])
    {
        $this->file = $file;
        $this->folder = $folder;
    }
}
