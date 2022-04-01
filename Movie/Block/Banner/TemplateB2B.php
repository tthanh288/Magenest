<?php
namespace Magenest\Movie\Block\Banner;

use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

class Template extends Template implements BlockInterface {

    protected $_template = "widget/banner.phtml";

    public function addData(array $arr)
    {
        // TODO: Implement addData() method.
    }

    public function setData($key, $value = null)
    {
        // TODO: Implement setData() method.
    }
}
