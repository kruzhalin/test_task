<?php

namespace Kruzhalin\TestTask\Controller\Index;

/**
 * Class Index
 * @package Kruzhalin\TestTask\Controller
 */
class Index extends \Magento\Framework\App\Action\Action
{
    /** @var \Magento\Framework\View\Result\PageFactory */
    protected $pageFactory;

    /** @var \Magento\Framework\Controller\ResultFactory */
    protected $resultRedirect;

    /**
     * Index constructor.
     * @param \Magento\Framework\App\Action\Context       $context
     * @param \Magento\Framework\View\Result\PageFactory  $pageFactory
     * @param \Magento\Framework\Controller\ResultFactory $result
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Framework\Controller\ResultFactory $result
    ) {
        $this->pageFactory       = $pageFactory;
        $this->resultRedirect    = $result;

        return parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        return $this->pageFactory->create();
    }
}
