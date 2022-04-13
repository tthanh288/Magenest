<?php

namespace Magenest\Blog\Controller\Adminhtml\Banner;

use Magento\Backend\App\Action;
use Magenest\Blog\Model\ResourceModel\Banner\CollectionFactory;
use Magenest\Blog\Model\BannerFactory;
use Magento\Ui\Component\MassAction\Filter;
use Magento\Backend\Model\View\Result\RedirectFactory;

class Delete extends Action
{
    private $bannerFactory;
    private $filter;
    private $collectionFactory;
    private $resultRedirect;

    public function __construct(
        Action\Context $context,
        BannerFactory $bannerFactory,
        Filter $filter,
        CollectionFactory $collectionFactory,
        RedirectFactory $redirectFactory
    )
    {
        parent::__construct($context);
        $this->bannerFactory = $bannerFactory;
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        $this->resultRedirect = $redirectFactory;
    }

    public function execute()
    {

        $collection = $this->filter->getCollection($this->collectionFactory->create());

        $total = 0;
        $err = 0;
        foreach ($collection->getItems() as $item) {
            $deleteBanner = $this->bannerFactory->create();
            $deleteBanner->load($item->getData('id'));
            try {
                $deleteBanner->delete();
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
        return $this->resultRedirect->create()->setPath('blog/banner/index');
    }
}
