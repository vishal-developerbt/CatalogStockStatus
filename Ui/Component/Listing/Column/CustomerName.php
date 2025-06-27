<?php

namespace Bluethinkinc\CatalogStockStatus\Ui\Component\Listing\Column;

use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

class CustomerName extends Column
{
    protected $urlBuilder;
    protected $customerRepository;

    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        CustomerRepositoryInterface $customerRepository,
        array $components = [],
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        $this->customerRepository = $customerRepository;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                if (isset($item['email'])) {
                    try {
                        $customer = $this->customerRepository->get($item['email']);
                        $url = $this->urlBuilder->getUrl('customer/index/edit', [
                            'id' => $customer->getId()
                        ]);

                        $item[$this->getData('name')] = sprintf(
                            '<a href="%s" target="_blank">%s</a>',
                            $url,
                            $item['customer_name']
                        );
                    } catch (\Exception $e) {
                        // If customer not found, fallback to plain name
                        $item[$this->getData('name')] = $item['customer_name'];
                    }
                }
            }
        }

        return $dataSource;
    }
}
