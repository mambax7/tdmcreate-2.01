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

class ClassesFile
{
    /**
     * @var null|array
     */
    public $_class = null;

    /**
     * @var bool
     */
    public $is_form = false;

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
     * @param mixed  $key
     * @param string $data_type
     * @param bool   $required
     * @param int    $maxlength
     * @param string $options
     * @return string
     * @return string
     */
    public function tdmc_initVar($key, $data_type = 'INT', $required = false, $maxlength = null, $options = '')
    {
        $r = true === $required ? ', ' . $required : '';
        $m = (null !== $maxlength) ? ', ' . $maxlength : $maxlength;
        $o = ('' !== $options) ? ', ' . $options : $options;

        return '$this->initVar(\'' . $key . '\', XOBJ_DTYPE_' . $data_type . ', null' . $r . $m . $o . ');';
    }

    /**
     * @param string $key
     * @param mixed  $value
     * @param bool   $not_gpc
     * @return string
     */
    public function tdmc_setVar($key, $value, $not_gpc = false)
    {
        $res = '';
        if ($not_gpc) {
            $res .= '$this->setVar(\'' . $key . '\', ' . $value . ', ' . $not_gpc . ');';
        } else {
            $res .= '$this->setVar(\'' . $key . '\', ' . $value . ');';
        }

        return $res;
    }

    /**
     * @param array $var_arr
     * @param bool  $not_gpc
     * @return string
     */
    public function tdmc_setVars($var_arr, $not_gpc = false)
    {
        $comma = ', ';
        $c = 0;
        foreach ($var_arr as $key => $value) {
            $_array[$c] = $key . '\' => ' . $value;
            ++$c;
        }
        $res = '';
        foreach ($_array as $i => $iValue) {
            if ($i != $c - 1) {
                $res .= $iValue . $comma;
            } else {
                $res .= $iValue;
            }
        }
        if ($not_gpc) {
            $res .= '$this->setVars(array(\'' . $res . '), ' . $not_gpc . ');';
        } else {
            $res .= '$this->setVars(array(\'' . $res . '));';
        }

        return $res;
    }

    /**
     * @param int    $i
     * @param string $modname
     * @param string $tablename
     * @param string $fieldname
     * @param string $fieldelements
     * @param string $langform
     * @param array  $structure
     */
    public function tdmc_formElements($i, $modname, $tablename, $fieldname, $fieldelements, $langform, $structure)
    {
    }

    /**
     * @param string $key
     * @param string $value
     * @param string $sort
     * @param string $order
     * @param int    $id
     * @return string
     * @return string
     */
    public function tdmc_Criteria($key, $value, $sort = '', $order = '', $id = null)
    {
        $criteria = '$criteria = new \CriteriaCompo();';
        if ($id) {
            $criteria = '$criteria->add(new \Criteria(\'' . $key . '\', ' . $value . ')));';
        } else {
            $criteria = '$criteria->add(new \Criteria(\'' . $key . '\', ' . $id . ', ' . $value . ')));';
        }
        if ('' !== $sort) {
            $criteria = '$criteria->setSort(\'' . $sort . '\');';
        }
        if ('' !== $order) {
            $criteria = '$criteria->setOrder(\'' . $order . '\');';
        }

        return $criteria;
    }
}
