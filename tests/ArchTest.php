<?php

arch('it will not use debugging functions')
    ->expect(['dd', 'die', 'dump', 'ray'])
    ->each->not->toBeUsed();
