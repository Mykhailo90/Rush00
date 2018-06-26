<?php
require_once 'db_connect.php';

$sql = "SELECT * FROM images_url";
$result = mysqli_query($db, $sql);

$sql = "SELECT * FROM catalog_id";
$result2 = mysqli_query($db, $sql);
mysqli_close($db);

$ar_url = array();
$ar_catalog = array();
if($result)
{
    $rows = mysqli_num_rows($result);
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        $ar_url[$row[0]] = $row[1];
    }
    mysqli_free_result($result);
}
if($result2)
{
    $rows = mysqli_num_rows($result2);
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result2);
        $ar_catalog[$row[0]] = $row[1];
    }
    mysqli_free_result($result2);
};
// foreach ($ar_catalog as $key => $value) {
//    echo "$value";
// }
?>
