<?php

namespace Kruzhalin\TestTask\Controller\Index;

/**
 * Class Ajax
 * @package Kruzhalin\TestTask\Controller\Index
 */
class Ajax extends \Magento\Framework\App\Action\Action
{
    /** @var \Magento\Framework\Controller\Result\JsonFactory */
    protected $resultJsonFactory;

    /** @var \Kruzhalin\TestTask\Helper\Data */
    protected $testHelper;

    /** @var \Psr\Log\LoggerInterface */
    protected $logger;

    /**
     * Ajax constructor.
     * @param \Magento\Framework\App\Action\Context            $context
     * @param \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory
     * @param \Kruzhalin\TestTask\Helper\Data                  $testHelper
     * @param \Psr\Log\LoggerInterface                         $logger
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
        \Kruzhalin\TestTask\Helper\Data $testHelper,
        \Psr\Log\LoggerInterface $logger
    ) {
        $this->resultJsonFactory = $resultJsonFactory;
        $this->testHelper        = $testHelper;
        $this->logger            = $logger;

        return parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Json|\Magento\Framework\Controller\ResultInterface|string
     */
    public function execute()
    {
        $result = $this->resultJsonFactory->create();
        $rub    = $this->getRequest()->getParam('rub', '0');

        //Checking input data
        if (!empty($rub) && is_numeric($rub)) {
            try {
                //send request to API
                $resultAmount = $this->testHelper->convertCurrency($rub);
                $result->setData($resultAmount);
                return $result;
            } catch (\Exception $e) {
                $this->logger->error($e->getMessage());
            }
        }

        $result->setData(__('Wrong value for RUB field.'));
        return $result;
    }
}
