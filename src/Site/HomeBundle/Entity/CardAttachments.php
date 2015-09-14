<?php

namespace Site\HomeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CardAttachments
 *
 * @ORM\Table(name="card_attachments")
 * @ORM\Entity
 */
class CardAttachments
{
    /**
     * @var string
     *
     * @ORM\Column(name="file_name", type="string", length=255, nullable=false)
     */
    private $fileName;

    /**
     * @var string
     *
     * @ORM\Column(name="file_extension", type="string", length=45, nullable=false)
     */
    private $fileExtension;

    /**
     * @var string
     *
     * @ORM\Column(name="file_location", type="string", length=255, nullable=false)
     */
    private $fileLocation;

    /**
     * @var boolean
     *
     * @ORM\Column(name="attachment_type", type="boolean", nullable=false)
     */
    private $attachmentType;

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
     * Set fileName
     *
     * @param string $fileName
     * @return CardAttachments
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;

        return $this;
    }

    /**
     * Get fileName
     *
     * @return string 
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * Set fileExtension
     *
     * @param string $fileExtension
     * @return CardAttachments
     */
    public function setFileExtension($fileExtension)
    {
        $this->fileExtension = $fileExtension;

        return $this;
    }

    /**
     * Get fileExtension
     *
     * @return string 
     */
    public function getFileExtension()
    {
        return $this->fileExtension;
    }

    /**
     * Set fileLocation
     *
     * @param string $fileLocation
     * @return CardAttachments
     */
    public function setFileLocation($fileLocation)
    {
        $this->fileLocation = $fileLocation;

        return $this;
    }

    /**
     * Get fileLocation
     *
     * @return string 
     */
    public function getFileLocation()
    {
        return $this->fileLocation;
    }

    /**
     * Set attachmentType
     *
     * @param boolean $attachmentType
     * @return CardAttachments
     */
    public function setAttachmentType($attachmentType)
    {
        $this->attachmentType = $attachmentType;

        return $this;
    }

    /**
     * Get attachmentType
     *
     * @return boolean 
     */
    public function getAttachmentType()
    {
        return $this->attachmentType;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return CardAttachments
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
     * @return CardAttachments
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
