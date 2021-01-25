<?php

abstract class PageCollection
{
    private $pages;
    
    public function __construct($pages) {
        $this->pages = $pages;
    }

    public abstract function getNumberOfPages();

    public function getLastPage() {
        return $this->pages[count($this->pages)-1];
    }
}

#interface IPageCollection implements IHavePages, IReadPages, ITearPages
#{
#}

interface IHavePages
{
    public function getNumberOfPages();
    public function getLastPage();
}

interface IReadPages
{
    public function readPage($pageNumber);
}

interface ITearPages
{
    public function tearPage($pageNumber);
}

class Book implements IPageCollection
{
    private $title;

    public function __construct($title, $pages)
    {
        // parent::__construct($pages);
        $this->title = $title;
    }
    
    public function getTitle()
    {
        return $this->title;
    }

    public function getNumberOfPages() {
        return 1;
    }
}

class NoteBook implements IPageCollection
{
    
}

class CalendarAgenda implements IPageCollection
{
    
}

class Magazine extends Book
{
    
}

class ServiceX {
    public static function resolveTitle(Book $collection) {
    }
    public static function action(PageCollection $collection) {
        return $collection->getNumberOfPages();
    }

}




$bookOfArts = new Book('Arts');
$bookOfTricks = new Book('Tricks for games');

$bookOfArts->getLastPage(); //
$bookOfArts->getTitle(); // 'Arts'
$bookOfTricks->getTitle(); // 'Tricks for games'

$collection = new PageCollection();

ServiceX::action($bookOfArts);
ServiceX::action(new CalendarAgenda);
ServiceX::action(new Magazine);

ServiceX::resolveTitle(new $bookOfTricks);
ServiceX::resolveTitle(new Magazine);