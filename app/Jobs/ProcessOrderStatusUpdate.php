<?php

namespace App\Jobs;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ProcessOrderStatusUpdate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $orderId;

    public function __construct($orderId)
    {
        $this->orderId = $orderId;
    }

    public function handle()
    {
        Log::info('UpdateOrderStatusJob is being handled for order ID: ' . $this->orderId);

        $order = Order::find($this->orderId);
        if ($order) {
            $order->status = 'success';
            $order->save();

            foreach ($order->orderItems as $item) {
                $item->product->status = 'success';
                $item->product->save();
            }

            Log::info('Order and product statuses updated to success for order ID: ' . $this->orderId);
        } else {
            Log::warning('Order not found for order ID: ' . $this->orderId);
        }
    }
}
