<?php


namespace Neosoft\Homepage\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface BannerRepositoryInterface
{

    /**
     * Save Banner
     * @param \Neosoft\Homepage\Api\Data\BannerInterface $banner
     * @return \Neosoft\Homepage\Api\Data\BannerInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Neosoft\Homepage\Api\Data\BannerInterface $banner
    );

    /**
     * Retrieve Banner
     * @param string $bannerId
     * @return \Neosoft\Homepage\Api\Data\BannerInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($bannerId);

    /**
     * Retrieve Banner matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Neosoft\Homepage\Api\Data\BannerSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Banner
     * @param \Neosoft\Homepage\Api\Data\BannerInterface $banner
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Neosoft\Homepage\Api\Data\BannerInterface $banner
    );

    /**
     * Delete Banner by ID
     * @param string $bannerId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($bannerId);
}
