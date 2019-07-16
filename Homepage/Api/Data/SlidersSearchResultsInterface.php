<?php


namespace Neosoft\Homepage\Api\Data;

interface SlidersSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Sliders list.
     * @return \Neosoft\Homepage\Api\Data\SlidersInterface[]
     */
    public function getItems();

    /**
     * Set name list.
     * @param \Neosoft\Homepage\Api\Data\SlidersInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
