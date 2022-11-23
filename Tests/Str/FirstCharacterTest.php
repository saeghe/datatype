<?php

namespace Tests\Str\LastCharacterTest;

use Saeghe\Datatype\Str;
use function Saeghe\TestRunner\Assertions\Boolean\assert_true;

test(
    title: 'it should return first character',
    case: function () {
        assert_true('H' === Str\first_character('Hello World'), 'First character is not what we want');
        assert_true(' ' === Str\first_character(' Hello World!'), 'First character is not what we want');
        assert_true('' === Str\first_character(''), 'First character is not what we want');
    }
);
