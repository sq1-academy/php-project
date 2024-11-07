<?php

namespace App;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Client;
use App\Product;
use App\Invoice;
use App\ValueObject\Money;
use App\Enum\Currency;

class IndexController
{
    public function index(Request $request) : Response
    {
        return new Response('Store');
    }

    public function createInvoice(): Response
    {
        // Crear cliente
        $client = new Client("001", "Cliente de Ejemplo");

        // Crear productos y precios
        $product1 = new Product("Producto A");
        $product2 = new Product("Producto B");
        $price1 = new Money(1000, Currency::USD);
        $price2 = new Money(1500, Currency::USD);

        // Crear factura con tipo de pago
        $invoice = new Invoice($client, Currency::USD, "Tarjeta de Crédito");
        $invoice->addItem($product1, 2, $price1); // Agregar unidades
        $invoice->addItem($product2, 1, $price2); 

        // respuesta con los detalles de la factura
        $clientName = $invoice->getClientName();
        $paymentType = $invoice->getPaymentType();
        $items = $invoice->getItems();
        $totalAmount = $invoice->getTotal()->amount;
        $currency = $invoice->getTotal()->currency->value;

        $responseContent = "Factura para $clientName\n";
        $responseContent .= "Tipo de Pago: $paymentType\n\n";
        $responseContent .= "Items:\n";

        foreach ($items as $item) {
            $productName = $item['product_name'];
            $quantity = $item['quantity'];
            $pricePerUnit = $item['price_per_unit']->amount;
            $totalPrice = $item['total_price']->amount;
            $responseContent .= "- $productName: $quantity x $pricePerUnit = $totalPrice $currency\n";
        }

        $responseContent .= "\nTotal: $totalAmount $currency";

        return new Response(nl2br($responseContent));
    }
}
