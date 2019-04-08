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

class Structure extends File
{
    /**
     * folder object of the File.
     *
     * @var \XoopsFolderHandler
     */
    public $mod_name = null;

    /**
     * folder object of the File.
     *
     * @var \XoopsFolderHandler
     */
    public $file_name = null;

    /**
     * folder object of the File.
     *
     * @var \XoopsFolderHandler
     */
    public $path = null;

    /**
     * folder object of the File.
     *
     * @var \XoopsFolderHandler
     */
    public $copyFile = null;

    /**
     * Constructor.
     *
     * @param string $path
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * @param string $path
     */
    public function makeDir($path)
    {
        $this->path = $path;
        if (!is_dir($this->path)) {
            if (!mkdir($concurrentDirectory = $this->path, 0777) && !is_dir($concurrentDirectory)) {
                throw new \RuntimeException(sprintf('Directory "%s" was not created', $concurrentDirectory));
            }
            chmod($this->path, 0777);
        }
    }

    /**
     * @param string $folder_name
     */
    public function makeDirInModule($folder_name)
    {
        $this->folder = $folder_name;
        $fname = $this->path . '/' . $this->mod_name . '/' . $this->folder;
        if (!is_dir($fname)) {
            if (!mkdir($fname, 0777) && !is_dir($fname)) {
                throw new \RuntimeException(sprintf('Directory "%s" was not created', $fname));
            }
            chmod($fname, 0777);
        }
    }

    /**
     * @param string $folder_name
     * @param string $copyFile
     * @param string $file
     */
    public function makeDirAndCopyFile($folder_name, $copyFile, $file)
    {
        $this->file_name = $file;
        $this->folder = $folder_name;
        $this->copyFile = $copyFile;
        $fname = $this->path . '/' . $this->mod_name . '/' . $this->folder;
        if (!is_dir($fname)) {
            if (!mkdir($fname, 0777) && !is_dir($fname)) {
                throw new \RuntimeException(sprintf('Directory "%s" was not created', $fname));
            }
            chmod($fname, 0777);
            $this->copyFile($this->folder, $this->copyFile, $this->file_name);
        } else {
            $this->copyFile($this->folder, $this->copyFile, $this->file_name);
        }
    }

    /**
     * @param string $folder_name
     * @param string $copyFile
     * @param string $file
     */
    public function copyFile($folder_name, $copyFile, $file)
    {
        $this->file_name = $file;
        $this->folder = $folder_name;
        $this->copyFile = $copyFile;
        $fname = $this->path . '/' . $this->mod_name . '/' . $this->folder . '/' . $this->file_name;
        if (is_dir($this->folder) && \XoopsLoad::fileExists($fname)) {
            chmod($fname, 0777);
            copy($this->copieFile, $fname);
        } else {
            copy($this->copyFile, $fname);
        }
    }
}
