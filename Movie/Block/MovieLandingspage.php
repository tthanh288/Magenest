<?php
namespace Magenest\Movie\Block;

use Magento\Framework\View\Element\Template;
use \Magenest\Movie\Model\ResourceModel\Moviebox\CollectionFactory;
use \Magenest\Movie\Model\ResourceModel\Moviebox\Collection;

class MovieLandingspage extends Template
{
    public $movieCollectFactory;
    public $movieCollection;

    public function __construct(
        Template\Context   $context,
        CollectionFactory  $movieCollectFactory,
        Collection  $movieCollection,
        array  $data = []
    )
    {
        parent::__construct($context, $data);

        $this->movieCollectFactory = $movieCollectFactory;
        $this->movieCollection = $movieCollection;
    }

    public function getMovies()
    {
        $movie = $this->movieCollectFactory->create();
        $movie->joinMovie();
        return $movie;
    }
}


