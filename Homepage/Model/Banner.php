<?php


namespace Neosoft\Homepage\Model;

use Neosoft\Homepage\Api\Data\BannerInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;
use Neosoft\Homepage\Api\Data\BannerInterface;

class Banner extends \Magento\Framework\Model\AbstractModel
{

    protected $dataObjectHelper;

    protected $bannerDataFactory;

    protected $_eventPrefix = 'neosoft_homepage_banner';

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param BannerInterfaceFactory $bannerDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Neosoft\Homepage\Model\ResourceModel\Banner $resource
     * @param \Neosoft\Homepage\Model\ResourceModel\Banner\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        BannerInterfaceFactory $bannerDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Neosoft\Homepage\Model\ResourceModel\Banner $resource,
        \Neosoft\Homepage\Model\ResourceModel\Banner\Collection $resourceCollection,
        array $data = []
    ) {
        $this->bannerDataFactory = $bannerDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve banner model with banner data
     * @return BannerInterface
     */
    public function getDataModel()
    {
        $bannerData = $this->getData();
        
        $bannerDataObject = $this->bannerDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $bannerDataObject,
            $bannerData,
            BannerInterface::class
        );
        
        return $bannerDataObject;
    }
}
