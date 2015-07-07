<?php
namespace example;

use Monad;
use Functional as f;

class ListComprehensionWithMonadTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_should_combine_two_lists()
    {
        // [1,2] >>= \n -> ['a','b'] >>= \ch -> return (n,ch) == [(1,'a'),(1,'b'),(2,'a'),(2,'b')]
        $result = Monad\Collection::create([1, 2])->bind(function ($n) {
            return Monad\Collection::create(['a', 'b'])
                ->bind(function ($x) use ($n) {
                    return [[$n, $x]];
                });
        });

        $this->assertEquals([
            [1, 'a'],
            [1, 'b'],
            [2, 'a'],
            [2, 'b']
        ], $result);
    }
}

