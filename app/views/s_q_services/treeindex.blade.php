@extends('layouts.scaffold')
@section('main')

<h1>All S_q_services</h1>
<?php

    //ArrayPrint
    function array_print($array)
    {
        foreach ($array as $element) {
            if (is_array($element))
            {   
                echo "<LI>".$element['name']."</LI>";
                if (array_key_exists('children',$element))
                {
                    echo "<ul>";
                    array_print($element['children']);
                    echo "</ul>";
                } 
            } 
        }
    }
    function buildTree(array $elements, $parentId = 0) {
        $branch = array();
        foreach ($elements as $element) {
            if ($element['parent_id'] == $parentId) {
                $children = buildTree($elements, $element['id']);
                if ($children) {
                    $element['children'] = $children;
                }
                $branch[] = $element;
            }
        }
        return $branch;
    }
    
    
    foreach ($s_q_services as $serv)
    {
        $array[(int)$serv->id]=array(
            'id' => $serv->id,
            'name' => $serv->name,
            'parent_id' => $serv->parent_id,
                );
    }
    $tree=buildTree($array);
   
    array_print($tree);
?>


@stop
