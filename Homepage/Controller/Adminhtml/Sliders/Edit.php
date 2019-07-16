<?php


namespace Neosoft\Homepage\Controller\Adminhtml\Sliders;

class Edit extends \Neosoft\Homepage\Controller\Adminhtml\Sliders
{

    protected $resultPageFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context, $coreRegistry);
    }

    /**
     * Edit action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        // 1. Get ID and create model
        $id = $this->getRequest()->getParam('sliders_id');
        $model = $this->_objectManager->create(\Neosoft\Homepage\Model\Sliders::class);
        
        // 2. Initial checking
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This Sliders no longer exists.'));
                /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }
        $this->_coreRegistry->register('neosoft_homepage_sliders', $model);
        
        // 3. Build edit form
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $this->initPage($resultPage)->addBreadcrumb(
            $id ? __('Edit Sliders') : __('New Sliders'),
            $id ? __('Edit Sliders') : __('New Sliders')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Sliderss'));
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? __('Edit Sliders %1', $model->getId()) : __('New Sliders'));
        return $resultPage;
    }
}
