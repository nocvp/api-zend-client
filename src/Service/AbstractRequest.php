<?php
/**
 * Created by NOC.
 * User: semihs
 * Date: 6.05.2016
 * Time: 15:48
 */

namespace NocVpClient\Service;

use NocVpClient\Service\Exception\MethodNotAllowedException;
use Zend\Http\Client;
use Zend\Http\Request;

/**
 * Class AbstractRequest
 * @package NocVpClient\Service
 */
class AbstractRequest implements RequestInterface
{
    /**
     * @var array
     */
    protected $_options;
    /**
     * @var TokenService
     */
    protected $_token_client;
    /**
     * @var string
     */
    protected $_token;

    /**
     * @param array $options
     */
    public function __construct(array $options = array())
    {
        $this->_options = $options;
    }

    /**
     * @param bool|false $reload
     * @return string
     */
    public function getToken($reload = false)
    {
        if (empty($this->_token) === true || $reload === true) {
            $file = 'data/cache/token';
            if (file_exists($file) === true && $reload === false) {
                $this->_token = file_get_contents($file);
            } else {
                $token = $this->_token_client->create(array(
                    'client_id' => $this->_options['client_id'],
                    'client_secret' => $this->_options['client_secret'],
                ));

                $dt = fopen($file, 'w+');
                fwrite($dt, $token);
                fclose($dt);

                $this->_token = $token->getTokenType() . ' ' . $token->getAccessToken();
            }
        }

        return $this->_token;
    }

    public function request($path, $method, $widthToken = true, $body = null)
    {
        $request = new Request();
        $request->setMethod($method);
        $request->setUri($this->_options['url'] . $path);
        $request->setContent($body);

        if ($widthToken === true) {
            $request->getHeaders()->addHeaders(array(
                'Authorization' => $this->getToken(),
            ));
        }

        $client = new Client();
        $client->send($request);

        return $client->getResponse();
    }

    /**
     * @param $id
     * @throws MethodNotAllowedException
     */
    public function fetch($id)
    {
        throw new MethodNotAllowedException('Method Not Allowed');
    }

    /**
     * @param array $params
     * @throws MethodNotAllowedException
     */
    public function fetchAll(array $params = array())
    {
        throw new MethodNotAllowedException('Method Not Allowed');
    }

    /**
     * @param array $data
     * @throws MethodNotAllowedException
     */
    public function create(array $data)
    {
        throw new MethodNotAllowedException('Method Not Allowed');
    }

    /**
     * @param $id
     * @param array $data
     * @throws MethodNotAllowedException
     */
    public function update($id, array $data)
    {
        throw new MethodNotAllowedException('Method Not Allowed');
    }

    /**
     * @param $id
     * @throws MethodNotAllowedException
     */
    public function delete($id)
    {
        throw new MethodNotAllowedException('Method Not Allowed');
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->_options;
    }

    /**
     * @param array $options
     */
    public function setOptions($options)
    {
        $this->_options = $options;
    }

    /**
     * @return TokenService
     */
    public function getTokenClient()
    {
        return $this->_token_client;
    }

    /**
     * @param TokenService $token_client
     */
    public function setTokenClient($token_client)
    {
        $this->_token_client = $token_client;
    }
}