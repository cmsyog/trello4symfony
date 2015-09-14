<?php

namespace Site\HomeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AuditEntry
 *
 * @ORM\Table(name="audit_entry")
 * @ORM\Entity
 */
class AuditEntry
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=true)
     */
    private $created;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer", nullable=true)
     */
    private $userId;

    /**
     * @var float
     *
     * @ORM\Column(name="duration", type="float", precision=10, scale=0, nullable=true)
     */
    private $duration;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=45, nullable=true)
     */
    private $ip;

    /**
     * @var string
     *
     * @ORM\Column(name="request_method", type="string", length=10, nullable=true)
     */
    private $requestMethod;

    /**
     * @var integer
     *
     * @ORM\Column(name="ajax", type="integer", nullable=true)
     */
    private $ajax;

    /**
     * @var string
     *
     * @ORM\Column(name="route", type="string", length=255, nullable=true)
     */
    private $route;

    /**
     * @var integer
     *
     * @ORM\Column(name="memory_max", type="integer", nullable=true)
     */
    private $memoryMax;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set created
     *
     * @param \DateTime $created
     * @return AuditEntry
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     * @return AuditEntry
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set duration
     *
     * @param float $duration
     * @return AuditEntry
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return float 
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return AuditEntry
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set requestMethod
     *
     * @param string $requestMethod
     * @return AuditEntry
     */
    public function setRequestMethod($requestMethod)
    {
        $this->requestMethod = $requestMethod;

        return $this;
    }

    /**
     * Get requestMethod
     *
     * @return string 
     */
    public function getRequestMethod()
    {
        return $this->requestMethod;
    }

    /**
     * Set ajax
     *
     * @param integer $ajax
     * @return AuditEntry
     */
    public function setAjax($ajax)
    {
        $this->ajax = $ajax;

        return $this;
    }

    /**
     * Get ajax
     *
     * @return integer 
     */
    public function getAjax()
    {
        return $this->ajax;
    }

    /**
     * Set route
     *
     * @param string $route
     * @return AuditEntry
     */
    public function setRoute($route)
    {
        $this->route = $route;

        return $this;
    }

    /**
     * Get route
     *
     * @return string 
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * Set memoryMax
     *
     * @param integer $memoryMax
     * @return AuditEntry
     */
    public function setMemoryMax($memoryMax)
    {
        $this->memoryMax = $memoryMax;

        return $this;
    }

    /**
     * Get memoryMax
     *
     * @return integer 
     */
    public function getMemoryMax()
    {
        return $this->memoryMax;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
