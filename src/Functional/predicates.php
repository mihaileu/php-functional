<?php

declare(strict_types=1);

namespace Widmogrod\Functional;

const eql = 'Widmogrod\Functional\eql';

/**
 * eql :: a -> a -> Bool
 *
 * @param mixed $expected
 * @param mixed $value
 *
 * @return mixed
 */
function eql($expected, $value = null)
{
    return curryN(2, function ($expected, $value) {
        return $expected === $value;
    })(...func_get_args());
}

const lt = 'Widmogrod\Functional\lt';

/**
 * lt :: a -> a -> Bool
 *
 * @param mixed $expected
 * @param mixed $value
 *
 * @return mixed
 */
function lt($expected, $value = null)
{
    return curryN(2, function ($expected, $value) {
        return $value < $expected;
    })(...func_get_args());
}


const orr = 'Widmogrod\Functional\orr';

/**
 * orr :: (a -> Bool) -> (a -> Bool) -> a -> Bool
 *
 * @param callable      $predicateA
 * @param callable|null $predicateB
 * @param mixed         $value
 *
 * @return mixed
 */
function orr(callable $predicateA, callable $predicateB = null, $value = null)
{
    return curryN(3, function (callable $a, callable $b, $value) {
        return $a($value) || $b($value);
    })(...func_get_args());
}
