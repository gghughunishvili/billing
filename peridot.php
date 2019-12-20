<?php

use Evenement\EventEmitterInterface;
use Peridot\Configuration;
use Peridot\Plugin\Prophecy\ProphecyPlugin;

return function(EventEmitterInterface $emitter) {
    $emitter->on('peridot.configure', function(Configuration $config) {
        $config->setPath('specs');
    });
    new ProphecyPlugin($emitter);
};
