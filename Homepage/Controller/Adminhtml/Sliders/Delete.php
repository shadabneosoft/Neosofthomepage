<?php


namespace Neosoft\Homepage\Controller\Adminhtml\Sliders;

class Delete extends \Neosoft\Homepage\Controller\Adminhtml\Sliders
{

    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('sliders_id');
        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create(\Neosoft\Homepage\Model\Sliders::class);
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccessMessage(__('You deleted the Sliders.'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['sliders_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addErrorMessage(__('We can\'t find a Sliders to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}
