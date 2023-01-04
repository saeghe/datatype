<?php

namespace Tests\Tree\TreeTest;

use Saeghe\Datatype\Collection;
use Saeghe\Datatype\Tree;
use function Saeghe\TestRunner\Assertions\Boolean\assert_true;

test(
    title: 'it should make a tree',
    case: function () {
        $tree = new Tree('/');

        assert_true($tree->root === '/');
        assert_true($tree->vertices() instanceof Collection);
        assert_true($tree->edges() instanceof Collection);
        assert_true(['/'] === $tree->vertices()->items());
        assert_true([] === $tree->edges()->items());
    }
);
