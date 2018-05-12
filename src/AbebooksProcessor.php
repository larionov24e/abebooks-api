<?php
/**
 * Created by PhpStorm.
 * User: egorlarionov1
 * Date: 11.05.2018
 * Time: 11:32
 */

namespace Abebooks\API;


use Abebooks\API\Actions\Action;

class AbebooksProcessor
{
    /**
     * Api server url
     */
    const API_SERVER_URL = 'https://{action}.abebooks.com';

    /**
     * Api server port
     */
    const API_SERVER_PORT = 10027;

    /**
     * @var AbebooksAuth
     */
    protected $config;

    /**
     * @var Action
     */
    protected $action;

    /**
     * AbebooksProcessor constructor.
     * @param AbebooksAuth $config
     * @param Action $action
     * @throws \Exception
     */
    public function __construct(AbebooksAuth $config, Action $action) {

        if(!$config || !$action) {
            throw new \Exception('Missing params');
        }

        $this->config = $config;
        $this->action = $action;
    }

    public function run(string $xmlBody) {
        $xml = $this->generateXmlText($xmlBody);

        return $this->exec($xml);
    }

    /**
     * @param $xmlBody
     * @return mixed
     */
    protected function generateXmlText($xmlBody) {
        $xml = $this->action->generateXml();

        $xml = str_replace('{username}', $this->config->getUserName(), $xml);
        $xml = str_replace('{password}', $this->config->getSecret(), $xml);
        $xml = str_replace('{body}', $xmlBody, $xml);

        return $xml;
    }

    /**
     * @param string $xml
     * @return mixed
     */
    protected function exec(string $xml) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, sprintf('https://%s.abebooks.com', $this->action->getActionName()));
        curl_setopt($curl, CURLOPT_PORT, self::API_SERVER_PORT);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $xml);
        $out = curl_exec($curl);
        curl_close($curl);

        return $out;
    }

    /**
     * @param $array
     * @param string $string
     * @return string
     */
    protected function recurse2xml ($array, &$string = "") {
        foreach ($array as $key => $subArray) {
            if (substr($key, -5) == "_attr")
                continue;

            $attrs = "";
            if (isset($array[$key . "_attr"]))
                foreach ($array[$key . "_attr"] as $attr => $value)
                    $attrs .= " $attr='".str_replace($value, "'", "\\'")."'";
            if (empty($subArray)) {
                $string .= "<$key$attrs />";
            } else {
                $string .= "<$key$attrs>";
                if (is_scalar($subArray))
                    $string .= $subArray;
                else
                    $this->recurse2xml($subArray, $string);
                $string .= "</$key>";
            }
        }
        return $string;
    }
}