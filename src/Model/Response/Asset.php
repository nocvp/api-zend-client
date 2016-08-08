<?php
/**
 * Created by NOC.
 * User: semihs
 * Date: 6.05.2016
 * Time: 16:13
 */

namespace NocVpClient\Model\Response;

/**
 * Class Asset
 * @package NocVpClient\Model\Response
 */
class Asset extends AbstractResponse
{
    /**
     * @var string
     */
    protected $id;
    /**
     * @var string
     */
    protected $sid;
    /**
     * @var string
     */
    protected $title;
    /**
     * @var string
     */
    protected $tags;
    /**
     * @var string
     */
    protected $description;
    /**
     * @var array
     */
    protected $conversions;
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
}