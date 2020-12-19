<?php


namespace App\Services\ApiServise;



class ShopUserService
{
    public function testForEmptiness($request)
    {
        if (empty($request)) {
            return response()->json(['error' => true, 'message' => 'not found'], 404);
        }
    }

    public function checkOnId()
    {
        return response()->json(['error' => true, 'message' => 'not found'], 404);
    }
}
