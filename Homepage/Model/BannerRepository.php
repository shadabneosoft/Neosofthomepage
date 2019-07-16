<?php


namespace Neosoft\Homepage\Model;

use Neosoft\Homepage\Api\Data\BannerInterfaceFactory;
use Neosoft\Homepage\Model\ResourceModel\Banner\CollectionFactory as BannerCollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Neosoft\Homepage\Api\BannerRepositoryInterface;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Neosoft\Homepage\Api\Data\BannerSearchResultsInterfaceFactory;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Reflection\DataObjectProcessor;
use Neosoft\Homepage\Model\ResourceModel\Banner as ResourceBanner;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\ExtensibleDataObjectConverter;

class BannerRepository implements BannerRepositoryInterface
{

    private $storeManager;

    protected $resource;

    protected $dataObjectProcessor;

    protected $dataObjectHelper;

    private $collectionProcessor;

    protected $extensionAttributesJoinProcessor;

    protected $searchResultsFactory;

    protected $bannerCollectionFactory;

    protected $bannerFactory;

    protected $dataBannerFactory;

    protected $extensibleDataObjectConverter;

    /**
     * @param ResourceBanner $resource
     * @param BannerFactory $bannerFactory
     * @param BannerInterfaceFactory $dataBannerFactory
     * @param BannerCollectionFactory $bannerCollectionFactory
     * @param BannerSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceBanner $resource,
        BannerFactory $bannerFactory,
        BannerInterfaceFactory $dataBannerFactory,
        BannerCollectionFactory $bannerCollectionFactory,
        BannerSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->bannerFactory = $bannerFactory;
        $this->bannerCollectionFactory = $bannerCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataBannerFactory = $dataBannerFactory;
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
        \Neosoft\Homepage\Api\Data\BannerInterface $banner
    ) {
        /* if (empty($banner->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $banner->setStoreId($storeId);
        } */
        
        $bannerData = $this->extensibleDataObjectConverter->toNestedArray(
            $banner,
            [],
            \Neosoft\Homepage\Api\Data\BannerInterface::class
        );
        
        $bannerModel = $this->bannerFactory->create()->setData($bannerData);
        
        try {
            $this->resource->save($bannerModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the banner: %1',
                $exception->getMessage()
            ));
        }
        return $bannerModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getById($bannerId)
    {
        $banner = $this->bannerFactory->create();
        $this->resource->load($banner, $bannerId);
        if (!$banner->getId()) {
            throw new NoSuchEntityException(__('Banner with id "%1" does not exist.', $bannerId));
        }
        return $banner->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->bannerCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Neosoft\Homepage\Api\Data\BannerInterface::class
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
        \Neosoft\Homepage\Api\Data\BannerInterface $banner
    ) {
        try {
            $bannerModel = $this->bannerFactory->create();
            $this->resource->load($bannerModel, $banner->getBannerId());
            $this->resource->delete($bannerModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Banner: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($bannerId)
    {
        return $this->delete($this->getById($bannerId));
    }
}
