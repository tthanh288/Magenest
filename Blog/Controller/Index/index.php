<?php
namespace Magenest\Blog\Controller\Index;
use Magento\Framework\App\Action\Action;
class Index extends Action
{
    /** @var \Magento\Framework\View\Result\PageFactory
    protected $_pageFactory;
     */

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $blog = $this->_pageFactory->create();
        return $blog;
    }
}
