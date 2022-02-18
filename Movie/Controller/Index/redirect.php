<?php
namespace Magenest\Movie\Controller\Index;
class redirect extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        $this->_forward('movie');
    }
}
