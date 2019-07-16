<?php


namespace Neosoft\Homepage\Model;

use Neosoft\Homepage\Api\Data\SlidersInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;
use Neosoft\Homepage\Api\Data\SlidersInterface;

class Sliders extends \Magento\Framework\Model\AbstractModel
{

    protected $dataObjectHelper;

    protected $slidersDataFactory;

    protected $_eventPrefix = 'neosoft_homepage_sliders';

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param SlidersInterfaceFactory $slidersDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Neosoft\Homepage\Model\ResourceModel\Sliders $resource
     * @param \Neosoft\Homepage\Model\ResourceModel\Sliders\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        SlidersInterfaceFactory $slidersDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Neosoft\Homepage\Model\ResourceModel\Sliders $resource,
        \Neosoft\Homepage\Model\ResourceModel\Sliders\Collection $resourceCollection,
        array $data = []
    ) {
        $this->slidersDataFactory = $slidersDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve sliders model with sliders data
     * @return SlidersInterface
     */
    public function getDataModel()
    {
        $slidersData = $this->getData();
        
        $slidersDataObject = $this->slidersDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $slidersDataObject,
            $slidersData,
            SlidersInterface::class
        );
        
        return $slidersDataObject;
    }
}
