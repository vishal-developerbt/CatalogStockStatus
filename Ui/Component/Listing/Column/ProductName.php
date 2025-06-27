<?php

namespace Bluethinkinc\CatalogStockStatus\Ui\Component\Listing\Column;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\UrlInterface;

class ProductName extends Column
{
    /** @var UrlInterface */
    protected $urlBuilder;

    /** @var string */
    protected $viewUrlPath = 'catalog/product/edit';

    /** @var string */
    protected $urlEntityParamName = 'id';

    /** @var ProductRepositoryInterface */
    protected $productRepository;

    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param UrlInterface $urlBuilder
     * @param ProductRepositoryInterface $productRepository
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        ProductRepositoryInterface $productRepository,
        array $components = [],
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        $this->productRepository = $productRepository;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepares data source for UI component
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                if (isset($item['product_sku'])) {
                    try {
                        $product = $this->productRepository->get($item['product_sku']);
                        $url = $this->urlBuilder->getUrl($this->viewUrlPath, [
                            $this->urlEntityParamName => $product->getId()
                        ]);

                        $item[$this->getData('name')] = sprintf(
                            '<a href="%s" target="_blank">%s</a>',
                            $url,
                            $item['product_name']
                        );
                    } catch (\Exception $e) {
                        // If SKU not found, fallback to plain name
                        $item[$this->getData('name')] = $item['product_name'];
                    }
                }
            }
        }

        return $dataSource;
    }
}
