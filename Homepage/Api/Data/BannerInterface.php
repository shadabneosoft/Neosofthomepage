<?php


namespace Neosoft\Homepage\Api\Data;

interface BannerInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const TYPE = 'type';
    const IMAGE = 'image';
    const URL = 'url';
    const BANNER_ID = 'banner_id';
    const NAME = 'name';
    const UPDATED_AT = 'updated_at';
    const STATUS = 'status';
    const CREATED_AT = 'created_at';

    /**
     * Get banner_id
     * @return string|null
     */
    public function getBannerId();

    /**
     * Set banner_id
     * @param string $bannerId
     * @return \Neosoft\Homepage\Api\Data\BannerInterface
     */
    public function setBannerId($bannerId);

    /**
     * Get name
     * @return string|null
     */
    public function getName();

    /**
     * Set name
     * @param string $name
     * @return \Neosoft\Homepage\Api\Data\BannerInterface
     */
    public function setName($name);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Neosoft\Homepage\Api\Data\BannerExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Neosoft\Homepage\Api\Data\BannerExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Neosoft\Homepage\Api\Data\BannerExtensionInterface $extensionAttributes
    );

    /**
     * Get status
     * @return string|null
     */
    public function getStatus();

    /**
     * Set status
     * @param string $status
     * @return \Neosoft\Homepage\Api\Data\BannerInterface
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
     * @return \Neosoft\Homepage\Api\Data\BannerInterface
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
     * @return \Neosoft\Homepage\Api\Data\BannerInterface
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
     * @return \Neosoft\Homepage\Api\Data\BannerInterface
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
     * @return \Neosoft\Homepage\Api\Data\BannerInterface
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
     * @return \Neosoft\Homepage\Api\Data\BannerInterface
     */
    public function setUpdatedAt($updatedAt);
}
