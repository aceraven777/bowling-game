<?php

class BowlingGame
{
    protected $rolls = [];

    public function roll($pins)
    {
        $this->rolls[] = $pins;
    }

    public function score()
    {
        $score = 0;
        $roll = 0;
        
        for ($frame = 0; $frame < 10; $frame++) {
            if ($this->rolls[$roll] == 10) {
                $score += 10 + $this->rolls[$roll+1] + $this->rolls[$roll + 2];
                $roll++;
                continue;
            } elseif ($this->rolls[$roll] + $this->rolls[$roll + 1] == 10) {
                $score += 10 + $this->rolls[$roll+2];
            } else {
                $score += $this->rolls[$roll] + $this->rolls[$roll + 1];
            }

            $roll += 2;
        }

        return $score;
    }

}
