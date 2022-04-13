<?php

namespace Magenest\Blog\Controller\Adminhtml\Category;

use Magento\Framework\GraphQl\Exception;
use Magento\Backend\App\Action;
use Magenest\Blog\Model\CategoryFactory;
use Magento\Backend\Model\View\Result\RedirectFactory;

class Save extends Action
{
    private $resultRedirect;
    private $categoryFactory;

    public function __construct(
        Action\Context $context,
        categoryFactory $categoryFactory,
        RedirectFactory $redirectFactory
    )
    {
        parent::__construct($context);
        $this->categoryFactory = $categoryFactory;
        $this->resultRedirect = $redirectFactory;
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $id = !empty($data["category_id"]) ? $data["category_id"] : null;

        if(!isset($data["name"])){
            $this->_redirect('blog/category/index');
        }

        $newData = [
            'name' => $data['name'],
        ];

        $actor = $this->categoryFactory->create();
        if($id){
            $actor->load($id);
        }

        try {
            $actor->addData($newData);
            $actor->save();
            return $this->resultRedirect->create()->setPath('blog/category/index');
        } catch (\Exception $e) {
            return $this->resultRedirect->create()->setPath('blog/category/add');
        }

    }
}
