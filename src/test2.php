<?php
$uri = 'http://api.football-data.org/v2/competitions/PL/teams';
$reqPrefs['http']['method'] = 'GET';
$reqPrefs['http']['header'] = 'X-Auth-Token:3c03798f19d54d6e8d641691763d899f';
$stream_context = stream_context_create($reqPrefs);
$response = file_get_contents($uri, false, $stream_context);


$matches = json_decode($response, true);
$teamsInfo = $matches['teams'];
$teamsInfo = array($teamsInfo);
$teamFinalInfoArray = [];


foreach ($teamsInfo['0'] as $team) {

    $teamName = $team['name'];
    $teamShortName = $team['shortName'];
    $teamTla = $team['tla'];
    $teamAddress = $team['address'];
    $teamPhone = $team['phone'];
    $teamWebsite = $team['website'];
    $teamEmail = $team['email'];
    $teamClubColors = $team['clubColors'];
    $teamVenue = $team['venue'];

    $teamFinalArray[] =
        [
            'name' => $teamName,
            'shortname' => $teamShortName,
            'tla' => $teamTla,
            'adress' => $teamAddress,
            'phone' => $teamPhone,
            'website' => $teamWebsite,
            'email' => $teamEmail,
            'clubColors' => $teamClubColors,
            'venue' => $teamVenue


        ];
}


$json = json_encode($teamFinalArray);

file_put_contents("teamDetail.json", $json);


$content = file_get_contents("teamDetail.json");

$data = json_decode($content, true);

?>

<table border=1
<?php
foreach ($data as $item) {
    if ($_GET['club'] === $item['name']) { ?>
        <tr>
            <td><?php echo $item['name']; ?></td>
            <td><?php echo $item['shortname']; ?></td>
            <td><?php echo $item['tla']; ?></td>
            <td><?php echo $item['adress']; ?></td>
            <td><?php echo $item['phone']; ?></td>
            <td><?php echo $item['website']; ?></td>
            <td><?php echo $item['email']; ?></td>
            <td><?php echo $item['venue']; ?></td>
            <td><?php echo $item['clubColors']; ?></td>
        </tr>

        <?php
    }
}

?>






<?php ?>
</table>
