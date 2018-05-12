<?php
/**
 * Created by PhpStorm.
 * User: egorlarionov1
 * Date: 12.05.2018
 * Time: 10:46
 */

namespace Abebooks\API\Actions\InventoryUpdateMethod;


abstract class Method
{
    protected $methodName;

    /**
     * @return mixed
     */
    public function getMethodName() {
        return $this->methodName;
    }
}