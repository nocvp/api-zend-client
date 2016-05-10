<?php
/**
 * Created by NOC.
 * User: semihs
 * Date: 6.05.2016
 * Time: 16:13
 */

namespace NocVpClient\Model\Response;

/**
 * Class Subscription
 * @package NocVpClient\Model\Response
 */
class Subscription extends AbstractResponse
{
    const STATUS_ACTIVE = 'ACTIVE';
    const STATUS_PASSIVE = 'PASSIVE';
    const STATUS_SUSPEND = 'SUSPEND';

    const TYPE_ENTERPRISE = 'ENTERPRISE';
    const TYPE_PERSONAL = 'PERSONAL';

    /**
     * @var string
     */
    protected $id;

    /**
     * @var int
     */
    protected $delivery;
    /**
     * @var int
     */
    protected $storage;
    /**
     * @var int
     */
    protected $transcoderHours;
    /**
     * @var int
     */
    protected $asset;
    /**
     * @var int
     */
    protected $liveAsset;
    /**
     * @var string
     */
    protected $type;
    /**
     * @var string
     */
    protected $status;
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
    }

    /**
     * @return int
     */
    public function getDelivery()
    {
        return $this->delivery;
    }

    /**
     * @param int $delivery
     */
    public function setDelivery($delivery)
    {
        $this->delivery = $delivery;
    }

    /**
     * @return int
     */
    public function getStorage()
    {
        return $this->storage;
    }

    /**
     * @param int $storage
     */
    public function setStorage($storage)
    {
        $this->storage = $storage;
    }

    /**
     * @return int
     */
    public function getTranscoderHours()
    {
        return $this->transcoderHours;
    }

    /**
     * @param int $transcoderHours
     */
    public function setTranscoderHours($transcoderHours)
    {
        $this->transcoderHours = $transcoderHours;
    }

    /**
     * @return int
     */
    public function getAsset()
    {
        return $this->asset;
    }

    /**
     * @param int $asset
     */
    public function setAsset($asset)
    {
        $this->asset = $asset;
    }

    /**
     * @return int
     */
    public function getLiveAsset()
    {
        return $this->liveAsset;
    }

    /**
     * @param int $liveAsset
     */
    public function setLiveAsset($liveAsset)
    {
        $this->liveAsset = $liveAsset;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
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