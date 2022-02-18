<?php

namespace Magenest\Movie\Block\Adminhtml\FrontendModel;

class Button extends \Magento\Config\Block\System\Config\Form\Field
{


    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magenest\Movie\Model\ResourceModel\Actorbox\ActorCollection $actorCollection,
        array $data = []
    ) {
        parent::__construct($context, $data);

    }
    protected function _getElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement $element) {

        $html = $element->getElementHtml();
        $value = "Refresh";
        $html .= "<script type=\"text/javascript\">
        require([\"jquery\"], function($) {
            $(document).ready(function(e) {
                $(\"#".$element->getHtmlId()."\").attr('value','".$value."');
                $(\"#".$element->getHtmlId()."\").click(function(){
                    window.location.href=window.location.href;
                });
            });
        });
        </script>";
        return $html;
    }
}
