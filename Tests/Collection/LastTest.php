<?php

namespace Tests\Collection\LastTest;

use Saeghe\Datatype\Collection;
use function Saeghe\Datatype\Str\first_character;
use function Saeghe\TestRunner\Assertions\Boolean\assert_true;

test(
    title: 'it should last item of the collection',
    case: function () {
        $collection = new class(['foo', 'baz']) extends Collection {
            public function key_is_valid(mixed $key): bool
            {
                return true;
            }

            public function value_is_valid(mixed $value): bool
            {
                return true;
            }
        };
        assert_true('baz' === $collection->last());
    }
);

test(
    title: 'it should return any type as the last item',
    case: function () {
        $collection = new class(['foo', null]) extends Collection {
            public function key_is_valid(mixed $key): bool
            {
                return true;
            }

            public function value_is_valid(mixed $value): bool
            {
                return true;
            }
        };
        assert_true(null === $collection->last());

        $collection = new class(['foo', 1]) extends Collection {
            public function key_is_valid(mixed $key): bool
            {
                return true;
            }

            public function value_is_valid(mixed $value): bool
            {
                return true;
            }
        };
        assert_true(1 === $collection->last());

        $collection = new class(['foo', ['bar']]) extends Collection {
            public function key_is_valid(mixed $key): bool
            {
                return true;
            }

            public function value_is_valid(mixed $value): bool
            {
                return true;
            }
        };
        assert_true(['bar'] === $collection->last());
    }
);

test(
    title: 'it should return null when the given collection is empty',
    case: function () {
        $collection = new class([]) extends Collection {
            public function key_is_valid(mixed $key): bool
            {
                return true;
            }

            public function value_is_valid(mixed $value): bool
            {
                return true;
            }
        };
        $arr = [];
        assert_true(null === $collection->last());
    }
);

test(
    title: 'it should return the last one that meets the condition',
    case: function () {
        $collection = new class(['foo', 'bar', 'baz']) extends Collection {
            public function key_is_valid(mixed $key): bool
            {
                return true;
            }

            public function value_is_valid(mixed $value): bool
            {
                return true;
            }
        };
        assert_true('baz' === $collection->last(fn ($item) => first_character($item) === 'b'));
    }
);
