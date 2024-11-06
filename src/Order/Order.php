<?php

namespace App;
use App\Order\OrderLine;


class Order
{
    private $lines=[];
    public function __construct(
        private Client $client
    )
    {
        //
    }

    public function addLine(OrderLine $orderLine) : Order
    {
        if ($this->hasLineByName(string: $orderLine->product->name)) {
            $this->lines[$orderLine->product->name] = $orderLine;
            return $this;
        }

        $this->lines[]=$orderLine;
        return $this;
    }

    /**
     * @return Product Es necesario revisar esta funcion para cuadrarla con lo necesario para elegir del orderline
    */
    public function getOrderLine(string $string): OrderLine
    {
        return $this->lines[$string];
    }


    public function hasLineByName(string $string) : bool
    {
        return isset($this->lines[$string]);
    }

}