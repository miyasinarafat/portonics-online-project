<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatusEnum;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class IpnHandlerController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        $order = Order::query()
            ->where('invoice_id', $request->input('invoice'))
            ->where('order_code', $request->input('reference'))
            ->first();

        $order?->update(['status_idx' => $this->orderStatus($request->input('status'))]);

        return response()->json();
    }

    /**
     * @param string $paymentStatus
     * @return OrderStatusEnum
     */
    private function orderStatus(string $paymentStatus): OrderStatusEnum
    {
        return match ($paymentStatus) {
            'ACCEPTED' => OrderStatusEnum::PAID,
            'REJECTED' => OrderStatusEnum::PAYMENT_FAILED,
        };
    }
}
