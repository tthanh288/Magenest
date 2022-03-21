<?php
namespace Magenest\Movie\Model\ResourceModel\Salesorder;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Magenest\Movie\Model\Salesorder', 'Magenest\Movie\Model\ResourceModel\Salesorder');
    }


    protected function _initSelect()
    {
        parent::_initSelect();

        $actormovieTable = $this->getTable('sales_order_item');
        $this->getSelect()->join($actormovieTable,
                'main_table.entity_id='.$actormovieTable.'.order_id'
        );

        return $this;
    }

}
