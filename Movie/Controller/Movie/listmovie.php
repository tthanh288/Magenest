<?php
namespace Magenest\Movie\Controller\Movie;
class listmovie extends
    \Magento\Framework\App\Action\Action {
    public function execute() {
        $listmovie = $this->_objectManager->create
            ('Magento\Catalog\Model\ResourceModel\Product\Collection')
            ->setPageSize(10,1);
        $output = '';
        foreach ($listmovie as $movie) {

        }

        $this->getResponse()->setBody($output);
    }
}
