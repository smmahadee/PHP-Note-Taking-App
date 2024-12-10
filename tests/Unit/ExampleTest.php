<?php

use Core\Container;

test('example', function () {
    $container = new Container();

    $container->bind('foo', 'bar');

    expect($container->resolve('foo'))->toEqual('bar');
});
