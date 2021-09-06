<?php
$uri = 'http://api.football-data.org/v2/competitions/PL/teams';
$reqPrefs['http']['method'] = 'GET';
$reqPrefs['http']['header'] = 'X-Auth-Token:3c03798f19d54d6e8d641691763d899f';
$stream_context = stream_context_create($reqPrefs);

$response = file_get_contents($uri, false, $stream_context);
$matches = json_decode($response, true);


$teamsInfo = $matches['teams']['0'];
$teamsInfo = array($teamsInfo);
$teamFinalInfoArray = [];
foreach ($teamsInfo as $team) {

    $teamName = $team['name'];
    $teamPosition = $team['shortname'];
    $teamFinalArray[] =
        [
            'name' => $teamName,
            'shortname' => $teamPosition,];
}
var_dump($teamFinalInfoArray);

