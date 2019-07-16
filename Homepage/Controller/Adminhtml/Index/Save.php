<?php
namespace Neosoft\Homepage\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Exception\LocalizedException;

class Save extends \Magento\Backend\App\Action
{
    
    protected $dataProcessor;    
    protected $dataPersistor;
    protected $imageUploader;


    public function __construct(
        Action\Context $context,
       // PostDataProcessor $dataProcessor,
        DataPersistorInterface $dataPersistor
    ) {
        //$this->dataProcessor = $dataProcessor;
        $this->dataPersistor = $dataPersistor;
        parent::__construct($context);
    }

    public function execute()
    {
        
        $data = $this->getRequest()->getPostValue();
      

        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data) {
            if (isset($data['image'][0]['name']) && isset($data['image'][0]['tmp_name'])) {
                $data['image'] =$data['imagae'][0]['name'];
                $this->imageUploader = \Magento\Framework\App\ObjectManager::getInstance()->get('Neosoft\Homepage\HomepageImageUpload');
                $this->imageUploader->moveFileFromTmp($data['image']);
            } elseif (isset($data['image'][0]['image']) && !isset($data['image'][0]['tmp_name'])) {
                $data['image'] = $data['image'][0]['image'];
            } else {
                $data['image'] = null;
            }
        return $resultRedirect->setPath('*/*/');
    }
}
}
