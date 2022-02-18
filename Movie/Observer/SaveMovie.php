<?php

namespace Magenest\Movie\Observer;

use Magento\Framework\Event\Observer;

class SaveMovie implements \Magento\Framework\Event\ObserverInterface
{
    public function execute(Observer $observer)
    {
        $data = $observer->getData('movie');
        $data->setData('rating', '0');
        $observer->setData('movie', $data);
    }
}
