Simple Pagination
=================

This is a simple library to generate a numerical array of page numbers based on:
 * Total number of pages
 * Current page
 * Number of pages to show

It will generate the page numbers about the current page:

    // Will return array(19, 20, 21, 22, 23, 24, 25, 26, 27, 28)
    Pagination::paginate(76, 23, 10);
