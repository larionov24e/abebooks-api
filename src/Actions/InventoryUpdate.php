<?php
/**
 * Created by PhpStorm.
 * User: egorlarionov1
 * Date: 11.05.2018
 * Time: 11:32
 */

namespace Abebooks\API\Actions;


use Abebooks\API\Actions\InventoryUpdateMethod\Method;

class InventoryUpdate implements Action
{
    /**
     * action name
     */
    const ACTION = 'inventoryupdate';

    /**
     * @var string
     */
    protected $method;

    public function __construct(Method $method) {
        $this->method = $method;
    }

    /**
     * @return string
     */
    public function getActionName() {
        return self::ACTION;
    }

    /**
     *
     */
    public function generateXml() {
        $xml = "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>
                <inventoryUpdateRequest version=\"1.0\">
                    <action name=\"{$this->method->getMethodName()}\">
                     <username>{username}</username>
                     <password>{password}</password>
                    </action>
                    {body}
                </inventoryUpdateRequest>";

        return $xml;
    }
}