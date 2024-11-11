<?php

class ItemFactura {
    private $producto;
    private $cantidad;

    public function __construct($producto, $cantidad) {
        $this->producto = $producto;
        $this->cantidad = $cantidad;
    }

    public function calcularSubtotal() {
        return $this->cantidad * $this->producto->getPrecio();
    }

    public function getProducto() {
        return $this->producto;
    }

    public function getCantidad() {
        return $this->cantidad;
    }
}

class Factura {
    private $id;
    private $cliente;
    private $fecha;
    private $items = [];

    public function __construct($id, $cliente, $fecha) {
        $this->id = $id;
        $this->cliente = $cliente;
        $this->fecha = $fecha;
    }

    public function agregarItem($producto, $cantidad) {
        $item = new ItemFactura($producto, $cantidad);
        $this->items[] = $item;
    }

    public function calcularTotal() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->calcularSubtotal();
        }
        return $total;
    }

    public function obtenerDetalle() {
        $detalle = "Factura ID: {$this->id}\n";
        $detalle .= "Cliente: {$this->cliente->getNombre()}\n";
        $detalle .= "Fecha: {$this->fecha}\n";
        $detalle .= "Items:\n";

        foreach ($this->items as $item) {
            $detalle .= "- Producto: {$item->getProducto()->getNombre()}, ";
            $detalle .= "Cantidad: {$item->getCantidad()}, ";
            $detalle .= "Subtotal: $" . $item->calcularSubtotal() . "\n";
        }

        $detalle .= "Total: $" . $this->calcularTotal() . "\n";
        return $detalle;
    }
}