<?php

use Evenement\EventEmitterInterface;
use Peridot\Configuration;

return function(EventEmitterInterface $emitter) {
    $emitter->on('peridot.configure', function(Configuration $config) {
        $config->setPath('specs');
        new ProphecyPlugin($emitter);
    });
};
