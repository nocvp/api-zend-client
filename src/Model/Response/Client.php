<?php
/**
 * Created by NOC.
 * User: semihs
 * Date: 6.05.2016
 * Time: 16:13
 */

namespace NocVpClient\Model\Response;

/**
 * Class Client
 * @package NocVpClient\Model\Response
 */
class Client extends AbstractResponse
{
    const ROLE_STANDARD = 'STANDARD';
    const ROLE_ADMIN = 'ADMIN';

    /**
     * @var string
     */
    protected $id;
    /**
     * @var string
     */
    protected $grantTypes;
    /**
     * @var string
     */
    protected $clientSecretOriginal;
    /**
     * @var string
     */
    protected $clientId;
    /**
     * @var string
     */
    protected $redirectUri;
    /**
     * @var string
     */
    protected $role;
    /**
     * @var User
     */
    protected $user;
    /**
     * @var int
     */
    protected $creationTime;
    /**
     * @var int
     */
    protected $modificationTime;

    /**
     * @param array $data
     */
    public function __construct(array $data = array())
    {
        parent::__construct($data);

        $this->user = new User($data['user']);
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getGrantTypes()
    {
        return $this->grantTypes;
    }

    /**
     * @param string $grantTypes
     */
    public function setGrantTypes($grantTypes)
    {
        $this->grantTypes = $grantTypes;
    }

    /**
     * @return string
     */
    public function getClientSecretOriginal()
    {
        return $this->clientSecretOriginal;
    }

    /**
     * @param string $clientSecretOriginal
     */
    public function setClientSecretOriginal($clientSecretOriginal)
    {
        $this->clientSecretOriginal = $clientSecretOriginal;
    }

    /**
     * @return string
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @param string $clientId
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
    }

    /**
     * @return string
     */
    public function getRedirectUri()
    {
        return $this->redirectUri;
    }

    /**
     * @param string $redirectUri
     */
    public function setRedirectUri($redirectUri)
    {
        $this->redirectUri = $redirectUri;
    }

    /**
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param string $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return int
     */
    public function getCreationTime()
    {
        return $this->creationTime;
    }

    /**
     * @param int $creationTime
     */
    public function setCreationTime($creationTime)
    {
        $this->creationTime = $creationTime;
    }

    /**
     * @return int
     */
    public function getModificationTime()
    {
        return $this->modificationTime;
    }

    /**
     * @param int $modificationTime
     */
    public function setModificationTime($modificationTime)
    {
        $this->modificationTime = $modificationTime;
    }
}