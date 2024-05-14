<?php

namespace App\Http\Controllers;

use App\Actions\Order\OrderAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

final class OrderController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function create(Request $request): JsonResponse
    {
        $this->validate($request, [
            'customer_id' => [
                'required',
                'integer',
                Rule::exists('users', 'id')->where('is_admin', 0),
            ],
            'product_id' => [
                'required',
                'integer',
                Rule::exists('products', 'id'),
            ],
        ]);

        $order = app(OrderAction::class)
            ->create($request->input('customer_id'), $request->input('product_id'));

        return response()->json(['order' => $order]);
    }
}
