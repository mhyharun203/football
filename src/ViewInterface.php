<?php
declare(strict_types=1);

namespace App;

interface ViewInterface
{
    public function render(string $template, array $context): void;
    public function init():  void;
}
