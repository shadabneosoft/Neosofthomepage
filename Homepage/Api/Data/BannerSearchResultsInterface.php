<?php


namespace Neosoft\Homepage\Api\Data;

interface BannerSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Banner list.
     * @return \Neosoft\Homepage\Api\Data\BannerInterface[]
     */
    public function getItems();

    /**
     * Set name list.
     * @param \Neosoft\Homepage\Api\Data\BannerInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
