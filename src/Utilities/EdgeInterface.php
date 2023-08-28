<?php

namespace App\Utilities;

interface EdgeInterface
{

    public function weight();

    public function id();

    public function node(bool $target);

    public function keys();

}
