<?php
declare(strict_types=1);


namespace App\Core;

interface ApiInterface
{
    public function getPlStandings(): array;
    public function getPLTeams(): array;
}