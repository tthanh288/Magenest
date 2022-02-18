<?php
namespace Magenest\Movie\Model\ResourceModel\Actorbox;

class ActorCollection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Magenest\Movie\Model\Actorbox', 'Magenest\Movie\Model\ResourceModel\Actorbox');
    }

}
