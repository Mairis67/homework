<?php
class a {
    public function shuffle(): void
    {
        $this->cards = [];
        for ($i = 1; $i <= 13; $i++) {
            for ($j = 0; $j < 4; $j++) {
                switch ($i) {
                    case 11:
                        break;
                    case 12:
                        if ($this->symbols === $this->black) {
                            $this->cards[] = new Card($this->symbols[$j], 'Q', 'black');
                        } elseif ($this->symbols === $this->red) {
                            $this->cards[] = new Card($this->symbols[$j], 'Q', 'red');
                        }
                        break;
                    case 13:
                        if ($this->symbols === $this->black) {
                            $this->cards[] = new Card($this->symbols[$j], 'K', 'black');
                        } elseif ($this->symbols === $this->red) {
                            $this->cards[] = new Card($this->symbols[$j], 'K', 'red');
                        }
                        break;
                    default:
                        if ($this->symbols === $this->black) {
                            $this->cards[] = new Card($this->symbols[$j], $i, 'black');
                        } elseif ($this->symbols === $this->red) {
                            $this->cards[] = new Card($this->symbols[$j], $i, 'red');
                        }
                        break;

                }
            }
        }
        $this->cards[] = new Card('♠', 'J', 'black');
    }
}
