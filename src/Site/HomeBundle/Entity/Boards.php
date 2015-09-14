<?php

namespace Site\HomeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToMany;

/**
 * Boards
 *
 * @ORM\Table(name="boards")
 * @ORM\Entity
 */
class Boards
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=false)
     */
    private $description;

    /**
     * @var boolean
     *
     * @ORM\Column(name="open", type="boolean", nullable=false)
     */
    private $open;

    /**
     * @var integer
     *
     * @ORM\Column(name="board_visibility", type="integer", nullable=false)
     */
    private $boardVisibility;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=false)
     */
    private $updatedAt;

    /**
     * @var integer
     *
     * @ORM\Column(name="ip", type="integer", nullable=true)
     */
    private $ip;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


    /**
     * @ORM\ManyToMany(targetEntity="User",inversedBy="boards",cascade={"all"})
     * @ORM\JoinTable(
     *                  name="BoardMembers",
     *                  joinColumns={@ORM\JoinColumn(name="board_id",referencedColumnName="id")},
     *                  inverseJoinColumns={@ORM\JoinColumn(name="member_id", referencedColumnName="id")}
     *              )
     * @var User[]
     */
    private  $users;


    /**
     * Set name
     *
     * @param string $name
     * @return Boards
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Boards
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set open
     *
     * @param boolean $open
     * @return Boards
     */
    public function setOpen($open)
    {
        $this->open = $open;

        return $this;
    }

    /**
     * Get open
     *
     * @return boolean 
     */
    public function getOpen()
    {
        return $this->open;
    }

    /**
     * Set boardVisibility
     *
     * @param integer $boardVisibility
     * @return Boards
     */
    public function setBoardVisibility($boardVisibility)
    {
        $this->boardVisibility = $boardVisibility;

        return $this;
    }

    /**
     * Get boardVisibility
     *
     * @return integer 
     */
    public function getBoardVisibility()
    {
        return $this->boardVisibility;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Boards
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Boards
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set ip
     *
     * @param integer $ip
     * @return Boards
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return integer 
     */
    public function getIp()
    {
        return $this->ip;
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
