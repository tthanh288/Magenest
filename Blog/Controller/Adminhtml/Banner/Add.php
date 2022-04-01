<?php
namespace Magenest\Blog\Controller\Adminhtml\Banner;
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
        $resultPage->setActiveMenu('Magenest_Blog::banner');
        $resultPage->addBreadcrumb(__('MagenestBanner'), __('MagenestBanner'));
        $resultPage->addBreadcrumb(__('Add Banner'),__('Add Banner'));
        $resultPage->getConfig()->getTitle()->prepend(__('Add Banner'));
        return $resultPage;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Magenest_Movie::banner');
    }
}
