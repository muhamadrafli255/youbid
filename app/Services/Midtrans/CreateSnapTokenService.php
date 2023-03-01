<?php
 
namespace App\Services\Midtrans;
 
use Midtrans\Snap;
 
class CreateSnapTokenService extends Midtrans
{
    protected $order;
 
    public function __construct($order)
    {
        parent::__construct();
 
        $this->order = $order;
    }
 
    public function getSnapToken()
    {
        $params = [
            'transaction_details' => [
                'order_id' => $this->order->number,
                'gross_amount' => $this->order->total_price,
            ],
            'item_details' => [
                [
                    'id' => 1,
                    'price' => $this->order->total_price,
                    'quantity' => $this->order->quantity,
                    'name' => $this->order->name,
                ],
            ],
            'customer_details' => [
                'first_name' => $this->order->User->full_name,
                'email' => $this->order->User->email,
                'phone' => $this->order->User->phone_number,
            ]
        ];
 
        $snapToken = Snap::getSnapToken($params);
 
        return $snapToken;
    }
}