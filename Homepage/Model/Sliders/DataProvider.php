<?php


namespace Neosoft\Homepage\Model\Sliders;

use Magento\Framework\App\Request\DataPersistorInterface;
use Neosoft\Homepage\Model\ResourceModel\Sliders\CollectionFactory;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{

    protected $collection;

    protected $dataPersistor;

    protected $loadedData;

    /**
     * Constructor
     *
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $collectionFactory
     * @param DataPersistorInterface $dataPersistor
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
	\Magento\Store\Model\StoreManagerInterface $storeManager,
        DataPersistorInterface $dataPersistor,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $collectionFactory->create();
        $this->dataPersistor = $dataPersistor;
	$this->_storeManager=$storeManager;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
	 $baseurl =  $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        foreach ($items as $model) {
            $this->loadedData[$model->getId()] = $model->getData();
	$temp = $model->getData();
             if($temp['image']):
            $img = [];
            $img[0]['image'] = $temp['image'];
            $img[0]['url'] = $baseurl.'test/'.$temp['image'];
            $temp['image'] = $img;
            endif;
        }
        $data = $this->dataPersistor->get('neosoft_homepage_sliders');
        
        if (!empty($data)) {
            $model = $this->collection->getNewEmptyItem();
            $model->setData($data);
            $this->loadedData[$model->getId()] = $model->getData();
            $this->dataPersistor->clear('neosoft_homepage_sliders');
        }else{
	if($items):
            if ($model->getData('image') != null) {

                $t2[$model->getId()] = $temp;     
                 
                return $t2;
            } else {                
                 
            
               return $this->loadedData;
                
            }
            endif;
	}
        
        return $this->loadedData;
    }
}
