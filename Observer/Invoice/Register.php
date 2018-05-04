<?php

namespace Kruzhalin\TestTask\Observer\Invoice;

/**
 * Class Register
 * @package Kruzhalin\TestTask\Observer
 */
class Register implements \Magento\Framework\Event\ObserverInterface
{
    /** @var \Kruzhalin\TestTask\Helper\Data */
    protected $testHelper;

    /** @var \Kruzhalin\TestTask\Model\ResourceModel\LogFactory */
    protected $logResourceFactory;

    /** @var \Kruzhalin\TestTask\Model\LogFactory */
    protected $logFactory;

    /**
     * Register constructor.
     * @param \Kruzhalin\TestTask\Helper\Data                    $testHelper
     * @param \Kruzhalin\TestTask\Model\LogFactory               $logFactory
     * @param \Kruzhalin\TestTask\Model\ResourceModel\LogFactory $logResourceFactory
     */
    public function __construct(
        \Kruzhalin\TestTask\Helper\Data $testHelper,
        \Kruzhalin\TestTask\Model\LogFactory $logFactory,
        \Kruzhalin\TestTask\Model\ResourceModel\LogFactory $logResourceFactory
    ) {
        $this->logFactory         = $logFactory;
        $this->logResourceFactory = $logResourceFactory;
        $this->testHelper         = $testHelper;
    }

    /**
     * @param \Magento\Framework\Event\Observer $observer
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        if (!$this->testHelper->getEnabled()) {
            return;
        }
        /** @var \Magento\Sales\Model\Order $order */
        $order = $observer->getOrder();

        if ($order->getBaseTotalPaid() != $order->getBaseGrandTotal()) {
            return;
        }

        $logModel         = $this->logFactory->create();
        $logResourceModel = $this->logResourceFactory->create();
        $data = [
            'order_id'        => $order->getIncrementId(),
            'factor'          => $this->testHelper->getFactor(),
            'order_sum'       => $order->getGrandTotal(),
            'order_sum_multi' => ($order->getGrandTotal() * $this->testHelper->getFactor()),
        ];
        try {
            $logModel->setData($data);
            $logResourceModel->save($logModel);
        } catch (\Exception $e) {

        }
    }
}
