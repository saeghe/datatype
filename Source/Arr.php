<?php

namespace Saeghe\Datatype\Arr;

function every(array $array, \Closure $check = null): bool
{
    if (is_callable($check)) {
        foreach ($array as $key => $value) {
            if (! $check($value, $key)) {
                return false;
            }
        }

        return true;
    }

    return ! empty(array_filter($array));
}

function first(array $array, \Closure $condition = null): mixed
{
    if (is_callable($condition)) {
        foreach ($array as $key => $value) {
            if ($condition($value, $key)) {
                return $value;
            }
        }

        return null;
    }

    return $array[array_key_first($array)] ?? null;
}

function first_key(array $array, \Closure $condition = null): mixed
{
    if (is_callable($condition)) {
        foreach ($array as $key => $value) {
            if ($condition($value, $key)) {
                return $key;
            }
        }

        return null;
    }

    return array_key_first($array) ?? null;
}

function has(array $array, \Closure $closure): bool
{
    foreach ($array as $key => $value) {
        if ($closure($value, $key)) {
            return true;
        }
    }

    return false;
}

function insert_after(array $array, mixed $key, array $additional): array
{
    $keys = array_keys($array);
    $index = array_search($key, $keys);
    $pos = false === $index ? count($array) : $index + 1;

    return array_merge(array_slice($array, 0, $pos), $additional, array_slice($array, $pos));
}

function last(array $array, \Closure $condition = null): mixed
{
    if (is_callable($condition)) {
        $last = null;
        foreach ($array as $key => $value) {
            $last = $condition($value, $key) ? $value : $last;
        }

        return $last;
    }

    return $array[array_key_last($array)] ?? null;
}

function last_key(array $array, \Closure $condition = null): mixed
{
    if (is_callable($condition)) {
        $last = null;
        foreach ($array as $key => $value) {
            $last = $condition($value, $key) ? $key : $last;
        }

        return $last;
    }

    return array_key_last($array) ?? null;
}
