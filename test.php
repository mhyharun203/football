<?php
declare(strict_types=1);



$uri = 'http://api.football-data.org/v2/competitions/PL/standings';
$reqPrefs['http']['method'] = 'GET';
$reqPrefs['http']['header'] = 'X-Auth-Token:3c03798f19d54d6e8d641691763d899f';
$stream_context = stream_context_create($reqPrefs);

$response = file_get_contents($uri, false, $stream_context);
$matches = json_decode($response, true);

$teamsInfo = ($matches['standings'][0]['table']);
$teamFinalArray = [];
foreach ($teamsInfo as $team) {
    $teamName = $team['team']['name'];
    $teamPosition = $team['position'];
    $teamFinalArray[] = ['name' => $teamName,
        'position' => $teamPosition,];
}
$json = json_encode($teamFinalArray);

file_put_contents("football.json", $json);


$content = file_get_contents("football.json");

$data = json_decode($content, true);

?>

<table border=1
<?php
foreach ($data as $item)  { ?>
    <tr>
        <td><?php echo $item['position']; ?></td>
        <td><?php echo $item['name']; ?></td>
    </tr>
<?php } ?>
</table>
