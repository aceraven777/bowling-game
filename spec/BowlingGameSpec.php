<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BowlingGameSpec extends ObjectBehavior
{
    
    function it_scores_gutter_game_as_zero()
    {
        for ($i = 0; $i < 20; $i++) {
            $this->roll(0);
        }

        $this->score()->shouldBe(0);
    }

    function it_scores_the_sum_of_all_knocked_down_pins_for_a_game()
    {
        for ($i = 0; $i < 20; $i++) {
            $this->roll(1);
        }

        $this->score()->shouldBe(20);
    }

    function it_awards_a_one_roll_bonus_for_every_spare()
    {
        $this->roll(2);
        $this->roll(8); // Spare
        $this->roll(5);

        for ($i = 0; $i < 17; $i++) {
            $this->roll(0);
        }

        $this->score()->shouldBe(20);
    }

    function it_awards_a_two_roll_bonus_for_every_strike()
    {
        $this->roll(10); // Strike
        $this->roll(5);
        $this->roll(7);

        for ($i = 0; $i < 17; $i++) {
            $this->roll(0);
        }

        $this->score()->shouldBe(34);
    }

    function it_scores_a_perfect_game()
    {
        for ($i = 0; $i < 12; $i++) {
            $this->roll(10);
        }

        $this->score()->shouldBe(300);
    }
}
