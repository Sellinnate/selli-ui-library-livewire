<?php

arch('it will not use debugging functions')
    ->expect(['dd', 'dump', 'ray', 'var_dump', 'die'])
    ->each->not->toBeUsed();

arch('strict types and no env outside config')
    ->preset()
    ->php();
