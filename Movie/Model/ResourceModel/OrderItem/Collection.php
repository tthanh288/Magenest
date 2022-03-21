<?php
namespace Magenest\Movie\Model\ResourceModel\OrderItem;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Magenest\Movie\Model\OrderItem', 'Magenest\Movie\Model\ResourceModel\OrderItem');
    }


//    public function joinSales(){
//        $saleTable = $this->getTable('sales_order_grid');
//
//        $result = $this
//            ->addFieldToSelect('sku',)
//            ->addFieldToSelect('name')
//            ->join($saleTable,
//                'main_table.order_id='.$saleTable.'.entity_id',
//            );
//
//        return $result->getSelect();


//    }


}
