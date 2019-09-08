<?php

namespace LaraLuke\Mapbox;

use LaraLuke\Mapbox\Requests\AccountsRequest;

class Mapbox
{
    public function accounts()
    {
        return new AccountsRequest;
    }
}