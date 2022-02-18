<?php

namespace Magenest\Movie\Controller\Index;

class listmovie extends \Magento\Framework\App\Action\Action
{
    protected $postMovie;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magenest\Movie\Model\MovieboxFactory $postMovie
    )
    {
        $this->postMovie = $postMovie;
        return parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->postMovie->create()->getSubscription();
        foreach ($data as $value) {
            echo "<pre>";
            print_r($value->getData());
            echo "</pre>";
        }
    }
}
