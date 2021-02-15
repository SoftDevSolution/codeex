<?
function set_mytime($ttt) {
    $thai_m=array ("Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sep", "Oct", "Nov", "Dec");
    $datetime_array=explode(" ", $ttt);
    $date_array=explode("-", $datetime_array[0]);
    $y=$date_array[0];
    $m=$date_array[1]-1;
    $d=$date_array[2];
    $m=$thai_m[$m];
    $y=$y;

    echo $create_date="$d $m $y";
}
?>