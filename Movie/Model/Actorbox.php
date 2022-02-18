<?php
namespace Magenest\Movie\Model;
class Actorbox extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'magenest_actor';

    protected function _construct()
    {
        $this->_init('Magenest\Movie\Model\ResourceModel\Actorbox');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}
