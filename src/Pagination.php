<?php
/*
 * This file is part of Simple Pagination.
 *
 * (c) Samuel Williams <sam@badcow.co>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 
class Pagination
{
    /**
     * @param int $totalPages Total number of pages to show
     * @param int $currentPage The current page
     * @param int $pagesToShow The number of pages to show
     * @return array
     */
    public static function paginate($totalPages, $currentPage, $pagesToShow = 10)
    {
        if ($totalPages < $pagesToShow) {
            return range(1, $totalPages);
        }

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

        return range(
            $currentPage - $pagesLeft,
            $currentPage + $pagesRight
        );
    }
}
