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

class DbFile
{
    /**
     * @var null|array
     */
    public $_class = null;

    /**
     * Constructor.
     *
     * @param string $class
     */
    public function __construct($class)
    {
        $this->_class = $class;
    }

    /**
     * @param mixed  $tablename
     *
     * @param int    $nb_fields
     * @param mixed  $data_type
     * @param mixed  $handler
     * @param string $options
     * @return string
     */
    public function tdmc_dbTable($tablename, $nb_fields = null, $data_type = 'int', $handler = null, $options = '')
    {
        $ret = '#
# Structure for table `' . mb_strtolower($tablename) . '` ' . $nb_fields . '
#

CREATE TABLE  `' . mb_strtolower($tablename) . '` (';

        $j = 0;
        for ($i = 0; $i < $nb_fields; ++$i) {
            $structure = explode(':', $fields[$i]);

            //Debut
            if (' ' !== $structure[0]) {
                //If as text, (not value)
                if ('text' === $structure[1] || 'date' === $structure[1] || 'timestamp' === $structure[1]) {
                    $type = $structure[1];
                } else {
                    $type = $structure[1] . ' (' . $structure[2] . ')';
                }
                //If as empty is default not string(not value), if as text not default, if as numeric default is 0 or 0.0000
                if (empty($structure[5])) {
                    $default = "default ''";
                } elseif ('text' === $structure[1]) {
                    $default = '';
                } elseif ('int' === $structure[1] || 'tinyint' === $structure[1] || 'mediumint' === $structure[1] || 'smallint' === $structure[1]) {
                    $default = "default '0'";
                } elseif ('decimal' === $structure[1] || 'double' === $structure[1] || 'float' === $structure[1]) {
                    $default = "default '0.0000'";
                } elseif ('date' === $structure[1]) {
                    $default = "default '0000-00-00'";
                } elseif ('datetime' === $structure[1] || 'timestamp' === $structure[1]) {
                    $default = "default '0000-00-00 00:00:00'";
                } elseif ('time' === $structure[1]) {
                    $default = "default '00:00:00'";
                } elseif ('year' === $structure[1]) {
                    $default = "default '0000'";
                } else {
                    $default = "default '" . $structure[5] . "'";
                }

                if (0 === $i) {
                    $comma[$j] = 'PRIMARY KEY (`' . $structure[0] . '`)';
                    ++$j;
                    $ret .= '`' . $structure[0] . '` ' . $type . ' ' . $structure[3] . ' ' . $structure[4] . ' auto_increment,
';
                } else {
                    if ('unique' === $structure[6] || 'index' === $structure[6] || 'fulltext' === $structure[6]) {
                        if ('unique' === $structure[6]) {
                            $ret .= '`' . $structure[0] . '` ' . $type . ' ' . $structure[3] . ' ' . $structure[4] . ' ' . $default . ',
';
                            $comma[$j] = 'KEY `' . $structure[0] . '` (`' . $structure[0] . '`)';
                        } elseif ('index' === $structure[6]) {
                            $ret .= '`' . $structure[0] . '` ' . $type . ' ' . $structure[3] . ' ' . $structure[4] . ' ' . $default . ',
';
                            $comma[$j] = 'INDEX (`' . $structure[0] . '`)';
                        } elseif ('fulltext' === $structure[6]) {
                            $ret .= '`' . $structure[0] . '` ' . $type . ' ' . $structure[3] . ' ' . $structure[4] . ' ' . $default . ',
';
                            $comma[$j] = 'FULLTEXT KEY `' . $structure[0] . '` (`' . $structure[0] . '`)';
                        }
                        ++$j;
                    } else {
                        $ret .= '`' . $structure[0] . '` ' . $type . ' ' . $structure[3] . ' ' . $structure[4] . ' ' . $default . ',
';
                    }
                }
            }
        }

        //Problem comma
        $key = '';
        for ($i = 0; $i < $j; ++$i) {
            if ($i != $j - 1) {
                $key .= $comma[$i] . ',
';
            } else {
                $key .= $comma[$i] . '
';
            }
        }
        $ret .= $key;
        $ret .= ') ENGINE=MyISAM;';

        return $ret;
    }
}
