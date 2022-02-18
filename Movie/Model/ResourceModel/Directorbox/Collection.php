<?php
namespace Magenest\Movie\Model\ResourceModel\Directorbox;
/**
 * Subscription Collection
 */
class Collection extends
    \Magento\Framework\Model\Resourcemodel\Db\Collection\AbstractCollection {
    /**
     * Initialize resource collection
     *
     * @return void
     */
    public function _construct() {
        $this->_init('Magenest\Movie\Model\Directorbox', 'Magenest\Movie\Model\ResourceModel\Directorbox');
    }
}
