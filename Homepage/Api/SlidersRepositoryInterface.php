<?php


namespace Neosoft\Homepage\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface SlidersRepositoryInterface
{

    /**
     * Save Sliders
     * @param \Neosoft\Homepage\Api\Data\SlidersInterface $sliders
     * @return \Neosoft\Homepage\Api\Data\SlidersInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Neosoft\Homepage\Api\Data\SlidersInterface $sliders
    );

    /**
     * Retrieve Sliders
     * @param string $slidersId
     * @return \Neosoft\Homepage\Api\Data\SlidersInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($slidersId);

    /**
     * Retrieve Sliders matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Neosoft\Homepage\Api\Data\SlidersSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Sliders
     * @param \Neosoft\Homepage\Api\Data\SlidersInterface $sliders
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Neosoft\Homepage\Api\Data\SlidersInterface $sliders
    );

    /**
     * Delete Sliders by ID
     * @param string $slidersId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($slidersId);
}
