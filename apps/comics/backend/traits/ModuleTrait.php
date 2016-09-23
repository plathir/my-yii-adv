<?php

namespace apps\comics\backend\traits;

use apps\comics\backend\Module;
use Yii;

/**
 * Class ModuleTrait
 * @package plathir\smartblog\traits
 * Implements `getModule` method, to receive current module instance.
 */
trait ModuleTrait
{
    /**
     * @var \plathir\users\Module|null Module instance
     */
    private $_module;

    /**
     * @return \plathir\users\Module|null Module instance
     */
    public function getModule()
    {
        if ($this->_module === null) {
            $module = Module::getInstance();
            if ($module instanceof Module) {
                $this->_module = $module;
            } else {
                $this->_module = Yii::$app->getModule('comics');
            }
        }
        return $this->_module;
    }
}