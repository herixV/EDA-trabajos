<?php

class BingoGame
{
    private $bingoCard;
    private $calledNumbers;

    public function __construct()
    {
        $this->bingoCard = $this->generateBingoCard();
        $this->calledNumbers = [];
    }

    public function play()
    {
        while (!$this->checkForBingo()) {
            $calledNumber = $this->callNumber();
            echo " $calledNumber\n";
            $this->calledNumbers[] = $calledNumber;
        }
        echo "¡Bingo! Ganaste.\n";
    }

    private function generateBingoCard()
    {
        $bingoCard = [];
        for ($i = 0; $i < 5; $i++) {
            $bingoCard[$i] = array_slice(range($i * 15 + 1, $i * 15 + 15), 0, 5);
        }
        $bingoCard[2][2] = null;
        return $bingoCard;
    }

    private function callNumber()
    {
        do {
            $number = rand(1, 75);
        } while (in_array($number, $this->calledNumbers));
        return $number;
    }

    private function checkForBingo()
    {
        foreach ($this->bingoCard as $row) {
            if (count(array_intersect($row, $this->calledNumbers)) == 5) {
                return true;
            }
        }
        for ($i = 0; $i < 5; $i++) {
            $column = array_column($this->bingoCard, $i);
            if (count(array_intersect($column, $this->calledNumbers)) == 5) {
                return true;
            }
        }
        $mainDiagonal = array_map(function ($index) {
            return $this->bingoCard[$index][$index];
        }, range(0, 4));
        $antiDiagonal = array_map(function ($index) {
            return $this->bingoCard[$index][4 - $index];
        }, range(0, 4));
        if (count(array_intersect($mainDiagonal, $this->calledNumbers)) == 5 ||
            count(array_intersect($antiDiagonal, $this->calledNumbers)) == 5) {
            return true;
        }
        return false;
    }
}
$bingoGame = new BingoGame();
$bingoGame->play();
