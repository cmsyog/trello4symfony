<?php

namespace Site\HomeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BoardMembers
 *
 * @ORM\Table(name="board_members")
 * @ORM\Entity
 */
class BoardMembers
{
    /**
     * @var boolean
     *
     * @ORM\Column(name="admin", type="boolean", nullable=true)
     */
    private $admin;

    /**
     * @var integer
     *
     * @ORM\Column(name="board_id", type="integer", nullable=false)
     */
    private $boardId;

    /**
     * @var integer
     *
     * @ORM\Column(name="member_id", type="integer", nullable=false)
     */
    private $memberId;

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
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set admin
     *
     * @param boolean $admin
     * @return BoardMembers
     */
    public function setAdmin($admin)
    {
        $this->admin = $admin;

        return $this;
    }

    /**
     * Get admin
     *
     * @return boolean
     */
    public function getAdmin()
    {
        return $this->admin;
    }

    /**
     * Set boardId
     *
     * @param integer $boardId
     * @return BoardMembers
     */
    public function setBoardId($boardId)
    {
        $this->boardId = $boardId;

        return $this;
    }

    /**
     * Get boardId
     *
     * @return integer
     */
    public function getBoardId()
    {
        return $this->boardId;
    }

    /**
     * Set memberId
     *
     * @param integer $memberId
     * @return BoardMembers
     */
    public function setMemberId($memberId)
    {
        $this->memberId = $memberId;

        return $this;
    }

    /**
     * Get memberId
     *
     * @return integer
     */
    public function getMemberId()
    {
        return $this->memberId;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return BoardMembers
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
     * @return BoardMembers
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
