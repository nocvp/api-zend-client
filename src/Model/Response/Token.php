<?php
/**
 * Created by NOC.
 * User: semihs
 * Date: 6.05.2016
 * Time: 16:13
 */

namespace NocVpClient\Model\Response;

/**
 * Class Token
 * @package NocVpClient\Model\Response
 */
class Token extends AbstractResponse
{
    /**
     * @var string
     */
    protected $access_token;
    /**
     * @var string
     */
    protected $expires_in;
    /**
     * @var string
     */
    protected $token_type;

    /**
     * @param null $data
     */
    public function __construct($data = null)
    {
        parent::__construct($data);
    }

    /**
     * @return string
     */
    public function getAccessToken()
    {
        return $this->access_token;
    }

    /**
     * @param string $access_token
     */
    public function setAccessToken($access_token)
    {
        $this->access_token = $access_token;
    }

    /**
     * @return string
     */
    public function getExpiresIn()
    {
        return $this->expires_in;
    }

    /**
     * @param string $expires_in
     */
    public function setExpiresIn($expires_in)
    {
        $this->expires_in = $expires_in;
    }

    /**
     * @return string
     */
    public function getTokenType()
    {
        return $this->token_type;
    }

    /**
     * @param string $token_type
     */
    public function setTokenType($token_type)
    {
        $this->token_type = $token_type;
    }
}