<?php
    $arr1 = [1,2,4,5];
    print("ARR1:".in_array(5, $arr1)."<br>");

    $u1 = array("nombre"=>"juan", "password"=>"1234");    
    $u2 = array("nombre"=>"toni", "password"=>"1234");

    $u3 = array("password"=>"1234", "nombre"=>"juan");

    $arr2 = [$u1, $u2];
    print("ARR2:".in_array($u3, $arr2)."<br>");

    $obj = array_column($arr2, null, "name")["juan"];
    print_r($obj);

  ?>