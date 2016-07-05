<?php

function fetch_og($url)
{
    $data = file_get_contents($url);
    $dom = new DomDocument;
    @$dom->loadHTML($data);

    $xpath = new DOMXPath($dom);
    # query metatags with og prefix
    $metas = $xpath->query('//*/meta[starts-with(@property, \'og:\')]');

    $og = array();

    foreach($metas as $meta){
        # get property name without og: prefix
        $property = str_replace('og:', '', $meta->getAttribute('property'));
        # get content
        $content = $meta->getAttribute('content');
        $og[$property] = $content;
    }

    return $og;
}

?>
