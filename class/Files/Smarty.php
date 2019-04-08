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
 * @since           2.5.0
 *
 * @author          Txmod Xoops http://www.txmodxoops.org
 */
use XoopsModules\Tdmcreate;

/**
 * Class Smarty.
 */
class Smarty
{
    /**
     * constructor
     */
    public function __construct()
    {
    }

    /**
     * Get a reference to the only instance of this class
     *
     * @return  object Html reference to the only instance
     */
    public static function getInstance()
    {
        static $instance;
        if (!isset($instance)) {
            $class = __CLASS__;
            $instance = new $class();
        }

        return $instance;
    }

    /**
     * @public function getSmartyTag
     *
     * @param       $tag
     * @param       $attributes
     * @param       $content
     * @param mixed $t
     *
     * @return string
     */
    public function getSmartyTag($tag = '', $attributes = [], $content = '', $t = '')
    {
        if (empty($attributes)) {
            $attributes = null;
        }
        $attr = $this->getAttributes($attributes);
        $ret = "{$t}<{{$tag}{$attr}}>{$content}<{/{$tag}}>";

        return $ret;
    }

    /*
    *  @private function setAttributes
    *  @param array $attributes
    */

    /**
     * @param  $attributes
     *
     * @return string
     */
    private function getAttributes($attributes)
    {
        $str = '';
        foreach ($attributes as $name => $value) {
            if ('_' !== $name) {
                $str .= ' ' . $name . '="' . $value . '"';
            }
        }

        return $str;
    }
}
