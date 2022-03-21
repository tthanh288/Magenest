<?php
namespace Magenest\Movie\Model\ResourceModel;

class Salesorder extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb{
    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    )
    {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('sales_order_grid', 'entity_id');
    }
}
