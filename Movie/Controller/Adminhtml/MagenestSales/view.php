<?php

namespace Magenest\Movie\Controller\Adminhtml\MagenestSales;

use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action;

class view extends \Magento\Backend\App\Action
{
    protected $_pageFactory;

    public function __construct(Action\Context $context, PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->_pageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Test Sales'));
        return $resultPage;
    }
}
