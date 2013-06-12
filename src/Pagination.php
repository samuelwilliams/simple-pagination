<?php

class Pagination
{
    /**
     * @param int $totalPages Total number of pages to show
     * @param int $currentPage The current page
     * @param int $pagesToShow The number of pages to show
     * @return array
     */
    public function paginate($totalPages, $currentPage, $pagesToShow = 10)
    {
        if ($pagesToShow % 2 === 0) {
            $pagesLeft = ($pagesToShow / 2) - 1;
            $pagesRight = ($pagesToShow / 2);
        } else {
            $pagesLeft = $pagesRight = ($pagesToShow - 1) / 2;
        }

        if ($pagesLeft >= $currentPage) {
            $diff = $pagesLeft - $currentPage + 1;
            $pagesLeft -= $diff;
            $pagesRight += $diff;
        }

        if (($totalPages - $pagesRight) <= $currentPage) {
            $diff = $currentPage + $pagesRight - $totalPages;
            $pagesLeft += $diff;
            $pagesRight -= $diff;
        }

        $pages = array();

        for ($i = ($currentPage - $pagesLeft); $i <= ($currentPage + $pagesRight); $i++) {
            $pages[] = $i;
        }

        return $pages;
    }
}