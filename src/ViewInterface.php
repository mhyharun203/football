<?php
declare(strict_types=1);


namespace App;

interface ViewInterface
{
        public function render($template,$key,$value);

}