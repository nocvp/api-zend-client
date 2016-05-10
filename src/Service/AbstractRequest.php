<?php
/**
 * Created by NOC.
 * User: semihs
 * Date: 6.05.2016
 * Time: 15:48
 */

namespace NocVpClient\Service;

use NocVpClient\Service\Exception\ApiServerException;
use NocVpClient\Service\Exception\MethodNotAllowedException;
use NocVpClient\Service\Exception\BadRequestException;
use NocVpClient\Service\Exception\EntityNotFoundException;
use NocVpClient\Service\Exception\ForbiddenException;

use Zend\Http\Client;
use Zend\Http\Request;

/**
 * Class AbstractRequest
 * @package NocVpClient\Service
 */
abstract class AbstractRequest implements RequestInterface
{
    /**
     * @var string
     */
    protected $_endpoint = '/v1/subscription';
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

                $this->_token = $token->getTokenType() . ' ' . $token->getAccessToken();

                $dt = fopen($file, 'w+');
                fwrite($dt, $this->_token);
                fclose($dt);
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

        $request->getHeaders()->addHeaders(array(
            'Content-Type' => 'application/json',
        ));

        if ($widthToken === true) {
            $request->getHeaders()->addHeaders(array(
                'Authorization' => $this->getToken(),
            ));
        }

        $client = new Client();
        $client->send($request);

        if ($client->getResponse()->getStatusCode() == 401) {
            $this->getToken(true);

            $this->request($path, $method, $widthToken, $body);
        } else if ($client->getResponse()->getStatusCode() == 403) {
            throw new ForbiddenException('Forbidden this endpoint.');
        } else if ($client->getResponse()->getStatusCode() == 404) {
            throw new EntityNotFoundException('Entity not found.');
        } else if ($client->getResponse()->getStatusCode() == 405) {
            throw new MethodNotAllowedException('Forbidden this endpoint.');
        } else if ($client->getResponse()->getStatusCode() == 400) {
            throw new BadRequestException('Bad Request.');
        } else if ($client->getResponse()->getStatusCode() == 500) {
            throw new ApiServerException('Api server exception.');
        } else {
            return $client->getResponse();
        }

        return $client->getResponse();
    }

    public function fetch($id)
    {
        throw new MethodNotAllowedException('Method Not Allowed');
    }

    public function fetchAll(array $params = array())
    {
        throw new MethodNotAllowedException('Method Not Allowed');
    }

    public function create($data)
    {
        throw new MethodNotAllowedException('Method Not Allowed');
    }

    public function update($id, $data)
    {
        throw new MethodNotAllowedException('Method Not Allowed');
    }

    public function delete($id)
    {
        throw new MethodNotAllowedException('Method Not Allowed');
    }

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

    /**
     * @return string
     */
    public function getEndpoint()
    {
        return $this->_endpoint;
    }

    /**
     * @param string $endpoint
     */
    public function setEndpoint($endpoint)
    {
        $this->_endpoint = $endpoint;
    }
}