<?php


namespace Neosoft\Homepage\Model\Data;

use Neosoft\Homepage\Api\Data\SlidersInterface;

class Sliders extends \Magento\Framework\Api\AbstractExtensibleObject implements SlidersInterface
{

    /**
     * Get sliders_id
     * @return string|null
     */
    public function getSlidersId()
    {
        return $this->_get(self::SLIDERS_ID);
    }

    /**
     * Set sliders_id
     * @param string $slidersId
     * @return \Neosoft\Homepage\Api\Data\SlidersInterface
     */
    public function setSlidersId($slidersId)
    {
        return $this->setData(self::SLIDERS_ID, $slidersId);
    }

    /**
     * Get name
     * @return string|null
     */
    public function getName()
    {
        return $this->_get(self::NAME);
    }

    /**
     * Set name
     * @param string $name
     * @return \Neosoft\Homepage\Api\Data\SlidersInterface
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Neosoft\Homepage\Api\Data\SlidersExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Neosoft\Homepage\Api\Data\SlidersExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Neosoft\Homepage\Api\Data\SlidersExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get status
     * @return string|null
     */
    public function getStatus()
    {
        return $this->_get(self::STATUS);
    }

    /**
     * Set status
     * @param string $status
     * @return \Neosoft\Homepage\Api\Data\SlidersInterface
     */
    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }

    /**
     * Get type
     * @return string|null
     */
    public function getType()
    {
        return $this->_get(self::TYPE);
    }

    /**
     * Set type
     * @param string $type
     * @return \Neosoft\Homepage\Api\Data\SlidersInterface
     */
    public function setType($type)
    {
        return $this->setData(self::TYPE, $type);
    }

    /**
     * Get url
     * @return string|null
     */
    public function getUrl()
    {
        return $this->_get(self::URL);
    }

    /**
     * Set url
     * @param string $url
     * @return \Neosoft\Homepage\Api\Data\SlidersInterface
     */
    public function setUrl($url)
    {
        return $this->setData(self::URL, $url);
    }

    /**
     * Get image
     * @return string|null
     */
    public function getImage()
    {
        return $this->_get(self::IMAGE);
    }

    /**
     * Set image
     * @param string $image
     * @return \Neosoft\Homepage\Api\Data\SlidersInterface
     */
    public function setImage($image)
    {
        return $this->setData(self::IMAGE, $image);
    }

    /**
     * Get created_at
     * @return string|null
     */
    public function getCreatedAt()
    {
        return $this->_get(self::CREATED_AT);
    }

    /**
     * Set created_at
     * @param string $createdAt
     * @return \Neosoft\Homepage\Api\Data\SlidersInterface
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * Get updated_at
     * @return string|null
     */
    public function getUpdatedAt()
    {
        return $this->_get(self::UPDATED_AT);
    }

    /**
     * Set updated_at
     * @param string $updatedAt
     * @return \Neosoft\Homepage\Api\Data\SlidersInterface
     */
    public function setUpdatedAt($updatedAt)
    {
        return $this->setData(self::UPDATED_AT, $updatedAt);
    }
}
