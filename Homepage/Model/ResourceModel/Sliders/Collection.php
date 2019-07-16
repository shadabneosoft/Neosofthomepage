<?php


namespace Neosoft\Homepage\Model\ResourceModel\Sliders;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Neosoft\Homepage\Model\Sliders::class,
            \Neosoft\Homepage\Model\ResourceModel\Sliders::class
        );
    }
}
