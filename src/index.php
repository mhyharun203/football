<?php
declare(strict_types=1);

$test = new \App\Controller\TableController(new \App\Core\Api());

$teamFinalArray = $test->tableAction();

$json = json_encode($teamFinalArray);

file_put_contents("football.json",$json);

$content = file_get_contents("football.json");

$data = json_decode($content, true);

?>

<table border=1>
    <tr>
        <th>Platz</th>
    </tr>


<?php
foreach ($data as $item)  { ?>
    <tr>

        <td><?php echo $item['position']; ?></td>
        <td><a href="test2.php?club=<?php echo $item['name']; ?>"><?php echo $item['name']; ?></a></td>
    </tr>
<?php }












?>
</table>
