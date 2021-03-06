<?php
namespace Magenest\Movie\Model;
class Directorbox extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'magenest_movie_director';

    protected function _construct()
    {
        $this->_init('Magenest\Movie\Model\ResourceModel\Directorbox');
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
