<?php
////////////////////////////////////////////////////////////////////////////////
// Title:     PHP_Functions                                     			  //
// Author:    Ian Carpenter                                                   //
// Filename:  PHP_Functions.php                                              //
//                                                                            //
// History      Version     Comments                                          //
// ========================================================================== //
// 08/08/2006    0.01       First release is this script                  	  //
////////////////////////////////////////////////////////////////////////////////
function imagelinethick($image, $x1, $y1, $x2, $y2, $color, $thick)
{
/*//////////////////////////////////////////////////////////////////////////////
Imagelintthick(); draws a thick GD imagline line for graphing...
imagelinethick([GD Image], $x1, $y1, $x2, $y2, $color, [thickness int])
//////////////////////////////////////////////////////////////////////////////*/
    if ($thick == 1) {
        return imageline($image, $x1, $y1, $x2, $y2, $color);
    }
    $t = $thick / 2 - 0.5;
    if ($x1 == $x2 || $y1 == $y2) {
        return imagefilledrectangle($image, round(min($x1, $x2) - $t), round(min($y1, $y2) - $t), round(max($x1, $x2) + $t), round(max($y1, $y2) + $t), $color);
    }
    $k = ($y2 - $y1) / ($x2 - $x1); //y = kx + q
    $a = $t / sqrt(1 + pow($k, 2));
    $points = array(
        round($x1 - (1+$k)*$a), round($y1 + (1-$k)*$a),
        round($x1 - (1-$k)*$a), round($y1 - (1+$k)*$a),
        round($x2 + (1+$k)*$a), round($y2 - (1-$k)*$a),
        round($x2 + (1-$k)*$a), round($y2 + (1+$k)*$a),
    );
    imagefilledpolygon($image, $points, 4, $color);
    return imagepolygon($image, $points, 4, $color);
}
function Get_MDU($location,$system)  {
/*//////////////////////////////////////////////////////////////////////////////
Get_MDU gets Equipment information from EquipmentMDUTBL and returns a value
to be displayed in the HTML alt proberties:-
//////////////////////////////////////////////////////////////////////////////*/
$result = database_connect('0','MsSQL', // is in Database_Functions.php
							"SELECT * FROM EquipmentMDUTbl where Location='$location' AND System='$system'");
$row = mssql_fetch_assoc($result);

$i=1;
extract($row);
	foreach($row as $field => $value)  {
			$value = ucwords($value);
			$mdu = is_numeric($field);
			if($mdu and $mdu<=9){
				$data .= "MDU $i:  \t" . $value . "\n";
				$i++;
				}
			elseif($mdu and $mdu>9) {
				$value = ucwords($value);
				$data .= "MDU $i:\t" . $value . "\n";
				$i++;
				}
		
		}
return $data;
}
?>
