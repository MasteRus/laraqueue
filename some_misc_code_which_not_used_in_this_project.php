<?php
    //recursive_unset - of some array functions
    function recursive_unset(&$array, $unwanted_key) {
        unset($array[$unwanted_key]);
        foreach ($array as &$value) {
            if (is_array($value)) {
                recursive_unset($value, $unwanted_key);
            }
        }
    }
    
    
    
/*
    function ShowTree($ParentID, $lvl) { 
        $lvl++; 
       
        $sSQL="SELECT id,name,parent_id FROM s_q_services WHERE parent_id= ? ORDER BY id";
        $result=DB::select($sSQL,array($ParentID));
            echo("<UL>\n");
            foreach ($result as $row)
                {
                //dd($row);
                $ID1 = $row->id;
                echo("<LI>\n");
                echo("<A HREF=\""."?ID=".$ID1."\">".$row->name."</A>"."  \n");
                ShowTree($ID1, $lvl); 
                $lvl--;
            }
            echo("</UL>\n");
    }
    ShowTree(0, 0); 
*/
    
?>