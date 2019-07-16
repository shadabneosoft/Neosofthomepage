<?php


namespace Neosoft\Homepage\Api\Data;

interface SlidersInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const TYPE = 'type';
    const IMAGE = 'image';
    const URL = 'url';
    const NAME = 'name';
    const UPDATED_AT = 'updated_at';
    const STATUS = 'status';
    const SLIDERS_ID = 'sliders_id';
    const CREATED_AT = 'created_at';

    /**
     * Get sliders_id
     * @return string|null
     */
    public function getSlidersId();

    /**
     * Set sliders_id
     * @param string $slidersId
     * @return \Neosoft\Homepage\Api\Data\SlidersInterface
     */
    public function setSlidersId($slidersId);

    /**
     * Get name
     * @return string|null
     */
    public function getName();

    /**
     * Set name
     * @param string $name
     * @return \Neosoft\Homepage\Api\Data\SlidersInterface
     */
    public function setName($name);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Neosoft\Homepage\Api\Data\SlidersExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Neosoft\Homepage\Api\Data\SlidersExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Neosoft\Homepage\Api\Data\SlidersExtensionInterface $extensionAttributes
    );

    /**
     * Get status
     * @return string|null
     */
    public function getStatus();

    /**
     * Set status
     * @param string $status
     * @return \Neosoft\Homepage\Api\Data\SlidersInterface
     */
    public function setStatus($status);

    /**
     * Get type
     * @return string|null
     */
    public function getType();

    /**
     * Set type
     * @param string $type
     * @return \Neosoft\Homepage\Api\Data\SlidersInterface
     */
    public function setType($type);

    /**
     * Get url
     * @return string|null
     */
    public function getUrl();

    /**
     * Set url
     * @param string $url
     * @return \Neosoft\Homepage\Api\Data\SlidersInterface
     */
    public function setUrl($url);

    /**
     * Get image
     * @return string|null
     */
    public function getImage();

    /**
     * Set image
     * @param string $image
     * @return \Neosoft\Homepage\Api\Data\SlidersInterface
     */
    public function setImage($image);

    /**
     * Get created_at
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set created_at
     * @param string $createdAt
     * @return \Neosoft\Homepage\Api\Data\SlidersInterface
     */
    public function setCreatedAt($createdAt);

    /**
     * Get updated_at
     * @return string|null
     */
    public function getUpdatedAt();

    /**
     * Set updated_at
     * @param string $updatedAt
     * @return \Neosoft\Homepage\Api\Data\SlidersInterface
     */
    public function setUpdatedAt($updatedAt);
}
