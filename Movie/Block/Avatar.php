<?php
namespace Magenest\Movie\Block;

use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

class Avatar extends Template implements BlockInterface {

    protected $_template = "avatar.phtml";
    protected $_templates = "extra_field.phtml";

}
