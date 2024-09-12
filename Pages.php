<?php 
    class Pages
{
    function findStart($limit)
    {
        if((!isset($_GET['page'])) || ($_GET['page']=="1"))
        {
            $start = 0;
            $_GET['page']=1;
            
        }
        else{
            $start=($_GET['page']-1)*$limit;
        }
        return $start;
    }
    function findPages($count, $limit)
    {
        $pages = (($count % $limit)== 0) ? $count / $limit : floor($count/$limit) +1;
        return $pages;
    }
    function pageList($curPage, $pages, $param = NULL)
    {
        $ma_khoa_hoc = "Khóa LTrinh PHP";
        $page_list="";
        if(($curPage !=1)&&($curPage))
        {
            $page_list .= "<a style=font-size:25px href = \"".$_SERVER['PHP_SELF']."?"."page=1$param\" title=\"Trang đầu\">First |</a>";

        }
        if(($curPage - 1)>0)
        {
            $page_list .= "<a style=font-size:25px href = \"".$_SERVER['PHP_SELF']."?"."page=".($curPage-1)."$param\" title=\"Về trang trước\">Frevious | </a>";

        }
        $vtdau = max($curPage-2,1 );
        $vtcuoi = min($curPage+2,$pages);
        for($i = $vtdau; $i <= $vtcuoi; $i++)
        {
            if($i == $curPage)
            {
                $page_list .= "<span style=color:black;>".$i."</span>";
            }
            else
            {
                $page_list .= "<a style=font-size:25px href='".$_SERVER['PHP_SELF']."?"."page=".$i."$param 'title = 'Trang ".$i."'>".$i."</a>";
            }
        }
        if($curPage + 1 <= $pages)
        {
            $page_list .= "<a style=font-size:25px href = \"".$_SERVER['PHP_SELF']."?"."page=".($curPage+1)."$param\" title=\"Đến trang sau\">| Next</a>";
            $page_list .= "<a style=font-size:25px href = \"".$_SERVER['PHP_SELF']."?"."page=".$pages."$param\" title=\"Đến trang cuối\">| Last</a>";

        }
         return $page_list;
    }
    function nextPrev($curPage, $pages)
    {
        $next_prev = "";
        if($curPage-1<0)
        {
            $next_prev .= "Về trang trước";
        }else
        {
            $next_prev .= "<a href=\"".$_SERVER['PHP_SELF']."?page=".($curPage-1)."\">Về trang trước </a>";

        }
        $next_prev .= "     |   ";
        if(($curPage +1)> $pages)
        {
            $next_prev .= "Đến trang sau";
        }else
        {
            $next_prev .= "<a href=\"".$_SERVER['PHP_SELF']."?page=".($curPage+1)."\">Về trang sau </a>";
        }
        return $next_prev;
    }
}?>