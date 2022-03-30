<?php

namespace Magenest\Movie\Observer;

use Magento\Framework\Event\Observer;

class ChangeName implements \Magento\Framework\Event\ObserverInterface
{
    public function execute(Observer $observer)
    {
        $data = $observer->getData('customer');
//        $data->setData('firstname', 'Magenest');
        $observer->setData('customer', $data);
    }
}
