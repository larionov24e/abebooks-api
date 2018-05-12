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
    /**
     * Get action name
     *
     * @return mixed
     */
    public function getActionName();

    /**
     * Generate XML file
     *
     * @return mixed
     */
    public function generateXml();
}