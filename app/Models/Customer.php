<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = [''];

    public static function createOrUpdateCustomer(array $data): self
    {
        $customer = self::where('getfly_id', $data['getfly_id'])->first();

        if ($customer) {
            $customer->update($data);
            return $customer;
        }

        return self::create($data);
    }



}
