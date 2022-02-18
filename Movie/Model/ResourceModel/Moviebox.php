<?php
namespace Magenest\Movie\Model\ResourceModel;

class Moviebox extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb{
    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    )
    {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('magenest_movie', 'movie_id');
    }
}
