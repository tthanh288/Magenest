<?php
namespace Magenest\Movie\Model\ResourceModel\PhoneNumber;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Magenest\Movie\Model\PhoneNumber', 'Magenest\Movie\Model\ResourceModel\PhoneNumber');
    }





}
