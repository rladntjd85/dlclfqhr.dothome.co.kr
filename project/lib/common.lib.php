<?php

/*************************************************************************
**
**  일반 함수 모음
**
*************************************************************************/


// 한페이지에 보여줄 행, 현재페이지, 총페이지수, URL
function get_paging($write_pages, $cur_page, $total_page, $url, $add="")
{
    //$url = preg_replace('#&amp;page=[0-9]*(&amp;page=)$#', '$1', $url);
    $url = preg_replace('#&amp;page=[0-9]*#', '', $url) . '&amp;page=';

    $str = '';
    if ($cur_page > 1) {
        $str .= '<a href="'.$url.'1'.$add.'" class="pg_page pg_start">처음</a>'.PHP_EOL;
    }

    $start_page = ( ( (int)( ($cur_page - 1 ) / $write_pages ) ) * $write_pages ) + 1;
    $end_page = $start_page + $write_pages - 1;

    if ($end_page >= $total_page) $end_page = $total_page;

    if ($start_page > 1) $str .= '<a href="'.$url.($start_page-1).$add.'" class="pg_page pg_prev">이전</a>'.PHP_EOL;

    if ($total_page > 1) {
        for ($k=$start_page;$k<=$end_page;$k++) {
            if ($cur_page != $k)
                $str .= '<a href="'.$url.$k.$add.'" class="pg_page">'.$k.'<span class="sound_only">페이지</span></a>'.PHP_EOL;
            else
                $str .= '<span class="sound_only">열린</span><strong class="pg_current">'.$k.'</strong><span class="sound_only">페이지</span>'.PHP_EOL;
        }
    }

    if ($total_page > $end_page) $str .= '<a href="'.$url.($end_page+1).$add.'" class="pg_page pg_next">다음</a>'.PHP_EOL;

    if ($cur_page < $total_page) {
        $str .= '<a href="'.$url.$total_page.$add.'" class="pg_page pg_end">맨끝</a>'.PHP_EOL;
    }

    if ($str)
        return "<nav class=\"pg_wrap\"><span class=\"pg\">{$str}</span></nav>";
    else
        return "";
}

// 페이징 코드의 <nav><span> 태그 다음에 코드를 삽입
function page_insertbefore($paging_html, $insert_html)
{
    if(!$paging_html)
        $paging_html = '<nav class="pg_wrap"><span class="pg"></span></nav>';

    return preg_replace("/^(<nav[^>]+><span[^>]+>)/", '$1'.$insert_html.PHP_EOL, $paging_html);
}

// 페이징 코드의 </span></nav> 태그 이전에 코드를 삽입
function page_insertafter($paging_html, $insert_html)
{
    if(!$paging_html)
        $paging_html = '<nav class="pg_wrap"><span class="pg"></span></nav>';

    if(preg_match("#".PHP_EOL."</span></nav>#", $paging_html))
        $php_eol = '';
    else
        $php_eol = PHP_EOL;

    return preg_replace("#(</span></nav>)$#", $php_eol.$insert_html.'$1', $paging_html);
}

 function get_selected($field, $value){ 

        return ($field==$value) ? ' selected="selected"' : '';
}
?>
