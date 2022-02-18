<?php
namespace Magenest\Movie\Observer;


use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\Config\Storage\WriterInterface;
class MagenestConfigObserver implements ObserverInterface
{
    const XML_PATH_FAQ_URL = 'movie/moviepage/text_field';

    /**
     * @var RequestInterface
     */
    private $request;

    /**
     * ConfigChange constructor.
     * @param RequestInterface $request
     * @param WriterInterface $configWriter
     */
    public function __construct(
        RequestInterface $request,
        WriterInterface $configWriter
    ) {
        $this->request = $request;
        $this->configWriter = $configWriter;

    }

    public function execute(EventObserver $observer)
    {
        $textField = $this->request->getParam('groups');
        $value = $textField['moviepage']['fields']['text_field']['value']; //Current  value, Here you can filter current value
        if($value=="ping"){
            $value="pong";
        }
        $this->configWriter->save('movie/moviepage/text_field', $value);
        return $this;
    }
}
