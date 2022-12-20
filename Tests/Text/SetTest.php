<?php

namespace Tests\Text\SetTest;

use Saeghe\Datatype\Text;
use function Saeghe\TestRunner\Assertions\Boolean\assert_true;

test(
    title: 'it should set given text',
    case: function () {
        $text = new Text('original');

        $text->set('modify');

        assert_true('modify' === $text->string());
    }
);
