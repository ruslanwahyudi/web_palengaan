<?php
function tes(){
    return "Helper Oke..!";
}

function randomBadges(){
    $i = rand(0,3);
    $badges = array('bg-danger', 'bg-primary', 'bg-secondary', 'bg-success');
    return $badges[$i];
}
?>