<?php

namespace Magenest\Blog\Controller\Adminhtml\Category;

use Magento\Backend\App\Action;
use Magenest\Blog\Model\ResourceModel\Category\CollectionFactory;
use Magenest\Blog\Model\CategoryFactory;
use Magento\Ui\Component\MassAction\Filter;
use Magento\Backend\Model\View\Result\RedirectFactory;

class Delete extends Action
{
    private $categoryFactory;
    private $filter;
    private $collectionFactory;
    private $resultRedirect;

    public function __construct(
        Action\Context $context,
        categoryFactory $categoryFactory,
        Filter $filter,
        CollectionFactory $collectionFactory,
        RedirectFactory $redirectFactory
    )
    {
        parent::__construct($context);
        $this->categoryFactory = $categoryFactory;
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        $this->resultRedirect = $redirectFactory;
    }

    public function execute()
    {
        try {
            $collection = $this->filter->getCollection($this->collectionFactory->create());
        } catch (\Exception $exception) {
            $this->_redirect('blog/category/index');
        }

        $total = 0;
        $err = 0;
        foreach ($collection->getItems() as $item) {
            $deleteCategory = $this->categoryFactory->create();
            $deleteCategory->load($item->getData('category_id'));
            try {
                $deleteCategory->delete();
                $total++;
            } catch (\Exception $exception) {
                $err++;
            }
        }

        if ($total) {
            $this->messageManager->addSuccessMessage(
                __('A total of %1 record(s) have been deleted.', $total)
            );
        }

        if ($err) {
            $this->messageManager->addErrorMessage(
                __(
                    'A total of %1 record(s) haven\'t been deleted. Please see server logs for more details.',
                    $err
                )
            );
        }
        return $this->resultRedirect->create()->setPath('blog/category/index');
    }
}
