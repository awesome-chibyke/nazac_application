<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Pagination_html {


        function totalPages($numrows, $rowsperpage){
            // find out total pages
            $this->totalpages = ceil($numrows / $rowsperpage);
            return $this;
        }

        function currentPage($curPage){
            //$curPage = $_GET['currentpage']
            if (isset($curPage) && is_numeric($curPage)) {
                // cast var as int
                $this->currentpage = $curPage;
            } else {
                // default page num
                $this->currentpage = 1;
            } // end if
        }

        function currentPageCheck($the_currentpage, $totalpages){
            // if current page is greater than total pages...
            if ($the_currentpage > $totalpages) {
                // set current page to last page
                $the_currentpage = $totalpages;
            } // end if
            // if current page is less than first page...
            if ($the_currentpage < 1) {
                // set current page to first page
                $the_currentpage = 1;
            } // end if

            return $the_currentpage;
        }

        function offsetIt($the_currentpage, $rowsperpage){

            // the offset of the list, based on current page
            $this->offset = ($the_currentpage - 1) * $rowsperpage;
            return $this;
        }

        function prevLinks($page, $the_currentpage){
            //$page = $_SERVER['PHP_SELF']
            // if not on page 1, don't show back links
            if ($the_currentpage > 1) {
                // show << link to go back to page 1
                // get previous page num
                $prevpage = $the_currentpage - 1;
                // show < link to go back to 1 page
                return "<li class='page-item first'><a class='page-link' href='$page/1'><i class='fa fa-angle-double-left'></i></a></li><li class='page-item'><a class='page-link' href='$page/$prevpage'><i class='fa fa-angle-left'></i></a></li>";
            } // end if
        }


        function loopLinks($the_currentpage, $range, $totalpages, $page){

            // loop to show links to range of pages around current page
            $looped_links = "";
            for ($x = ($the_currentpage - $range); $x < (($the_currentpage + $range) + 1); $x++) {
                // if it's a valid page number...
                if (($x > 0) && ($x <= $totalpages)) {
                    // if we're on current page...
                    if ($x == $the_currentpage) {
                        // 'highlight' it but don't make a link
                        //echo " [<b>$x</b>] ";
                        $looped_links .= "<li class='page-item next active disabled'><a class='page-link a-prevent' href='javascript:;'>$x</a></li>";
                        // if not current page...
                    } else {
                        // make it a link
                        $looped_links .= "<li class='page-item next '><a class='page-link a-prevent' href='$page/$x'>$x</a></li>";
                    } // end else
                } // end if
            } // end for
            return $looped_links;
        }


        function nextLinks($currentpage, $totalpages, $page){

            // if not on last page, show forward and last page links
            if ($currentpage != $totalpages) {
                // get next page
                $nextpage = $currentpage + 1;
                // echo forward link for next page

                // echo forward link for lastpage
                return "<li class='page-item next'><a class='page-link a-prevent' href='$page/$nextpage'><i class='fa fa-angle-right'></i></a></li><li class='page-item next last '><a class='page-link a-prevent' href='$page/$totalpages'><i class='fa fa-angle-double-right'></i></a></li> ";
            } // end if
        }


    }



?>
