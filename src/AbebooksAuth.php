<?php
/**
 * Created by PhpStorm.
 * User: egorlarionov1
 * Date: 11.05.2018
 * Time: 12:26
 */

namespace Abebooks\API;


class AbebooksAuth
{
    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $secret;

    /**
     * AbebooksAuth constructor.
     * @param string $username
     * @param string $secret
     * @throws \Exception
     */
    public function __construct(string $username, string $secret) {

        if(!$username || !$secret) {
            throw new \Exception('Missing data');
        }

        $this->setUserName($username);
        $this->setSecret($secret);
    }

    /**
     * @param string $username
     * @return $this
     */
    public function setUserName(string $username) {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserName() {
        return $this->username;
    }

    /**
     * @param string $secret
     * @return $this
     */
    public function setSecret(string $secret) {
        $this->secret = $secret;
        return $this;
    }

    /**
     * @return string
     */
    public function getSecret() {
        return $this->secret;
    }
}