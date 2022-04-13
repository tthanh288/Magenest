<?php
namespace Magenest\Blog\Controller\Adminhtml\Category;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
class Add extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Magenest_Blog::category');
        $resultPage->addBreadcrumb(__('MagenestCategory'), __('MagenestCategory'));
        $resultPage->addBreadcrumb(__('Add Category'),__('Add Category'));
        $resultPage->getConfig()->getTitle()->prepend(__('Add Category'));
        return $resultPage;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Magenest_Blog::category');
    }
}
