<?php
/**
 * Created by PhpStorm.
 * User: egorlarionov1
 * Date: 11.05.2018
 * Time: 12:42
 */

namespace Abebooks\API\Actions;


interface Action
{
    public function getActionName();

    public function generateXml();
}