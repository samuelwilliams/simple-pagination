<?php

class PaginationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param int $totalPages Total number of pages to show
     * @param int $currentPage The current page
     * @param int $pagesToShow The number of pages to show
     * @return array
     */
    public static function paginate($totalPages, $currentPage, $pagesToShow = 10)
    {
        $p = new Pagination;

        return $p->paginate($totalPages, $currentPage, $pagesToShow);
    }

    public function testPagination_1()
    {
        $expectation = array(45, 46, 47, 48, 49, 50, 51, 52, 53, 54);
        $pages = self::paginate(100, 49, 10);
        $this->assertEquals($expectation, $pages);
    }

    public function testPagination_2()
    {
        $expectation = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
        $pages = self::paginate(100, 3, 10);
        $this->assertEquals($expectation, $pages);
    }

    public function testPagination_3()
    {
        $expectation = array(91, 92, 93, 94, 95, 96, 97, 98, 99, 100);
        $pages = self::paginate(100, 97, 10);
        $this->assertEquals($expectation, $pages);
    }

    public function testPagination_4()
    {
        $expectation = array(19, 20, 21, 22, 23, 24, 25, 26, 27, 28);
        $pages = self::paginate(76, 23, 10);
        $this->assertEquals($expectation, $pages);
    }

    public function testPagination_5()
    {
        $expectation = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
        $pages = self::paginate(100, 5, 10);
        $this->assertEquals($expectation, $pages);
    }

    public function testPagination_6()
    {
        $expectation = array(91, 92, 93, 94, 95, 96, 97, 98, 99, 100);
        $pages = self::paginate(100, 95, 10);
        $this->assertEquals($expectation, $pages);
    }

    public function testPagination_7()
    {
        $expectation = array(12, 13, 14, 15, 16, 17, 18, 19, 20);
        $pages = self::paginate(100, 16, 9);
        $this->assertEquals($expectation, $pages);
    }

    public function testPagination_8()
    {
        $expectation = array(1, 2);
        $pages = self::paginate(2, 1);
        $this->assertEquals($expectation, $pages);
    }
}