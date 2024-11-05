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
        $this->lines[]=$orderLine;

        return $this;

    }

    /**
     * @return Product Es necesario revisar esta funcion para cuadrarla con lo necesario para elegir del orderline
    */
    public function getProduct(): Product
    {
        return $this->product;
    }

}