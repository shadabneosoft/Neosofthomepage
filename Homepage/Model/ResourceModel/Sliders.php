<?php


namespace Neosoft\Homepage\Model\ResourceModel;

class Sliders extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('neosoft_homepage_sliders', 'sliders_id');
    }
}
