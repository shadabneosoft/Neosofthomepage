<?php


namespace Neosoft\Homepage\Model;

use Neosoft\Homepage\Model\ResourceModel\Sliders\CollectionFactory as SlidersCollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Neosoft\Homepage\Api\Data\SlidersSearchResultsInterfaceFactory;
use Neosoft\Homepage\Model\ResourceModel\Sliders as ResourceSliders;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\CouldNotSaveException;
use Neosoft\Homepage\Api\SlidersRepositoryInterface;
use Neosoft\Homepage\Api\Data\SlidersInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\ExtensibleDataObjectConverter;

class SlidersRepository implements SlidersRepositoryInterface
{

    private $storeManager;

    protected $resource;

    protected $dataObjectProcessor;

    protected $slidersFactory;

    protected $slidersCollectionFactory;

    protected $dataObjectHelper;

    private $collectionProcessor;

    protected $extensionAttributesJoinProcessor;

    protected $searchResultsFactory;

    protected $dataSlidersFactory;

    protected $extensibleDataObjectConverter;

    /**
     * @param ResourceSliders $resource
     * @param SlidersFactory $slidersFactory
     * @param SlidersInterfaceFactory $dataSlidersFactory
     * @param SlidersCollectionFactory $slidersCollectionFactory
     * @param SlidersSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceSliders $resource,
        SlidersFactory $slidersFactory,
        SlidersInterfaceFactory $dataSlidersFactory,
        SlidersCollectionFactory $slidersCollectionFactory,
        SlidersSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->slidersFactory = $slidersFactory;
        $this->slidersCollectionFactory = $slidersCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataSlidersFactory = $dataSlidersFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Neosoft\Homepage\Api\Data\SlidersInterface $sliders
    ) {
        /* if (empty($sliders->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $sliders->setStoreId($storeId);
        } */
        
        $slidersData = $this->extensibleDataObjectConverter->toNestedArray(
            $sliders,
            [],
            \Neosoft\Homepage\Api\Data\SlidersInterface::class
        );
        
        $slidersModel = $this->slidersFactory->create()->setData($slidersData);
        
        try {
            $this->resource->save($slidersModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the sliders: %1',
                $exception->getMessage()
            ));
        }
        return $slidersModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getById($slidersId)
    {
        $sliders = $this->slidersFactory->create();
        $this->resource->load($sliders, $slidersId);
        if (!$sliders->getId()) {
            throw new NoSuchEntityException(__('Sliders with id "%1" does not exist.', $slidersId));
        }
        return $sliders->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->slidersCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Neosoft\Homepage\Api\Data\SlidersInterface::class
        );
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \Neosoft\Homepage\Api\Data\SlidersInterface $sliders
    ) {
        try {
            $slidersModel = $this->slidersFactory->create();
            $this->resource->load($slidersModel, $sliders->getSlidersId());
            $this->resource->delete($slidersModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Sliders: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($slidersId)
    {
        return $this->delete($this->getById($slidersId));
    }
}
