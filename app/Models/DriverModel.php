<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverModel extends Model
{
    use HasFactory;
    protected $table = 'driver';

    public function admin_table()
    {
        return $this->belongsTo(UserModel::class,'admin_id','id');
    }

    public function vendor()
    {
        return $this->belongsTo(VendorModel::class,'vendor_id','id');
    }

}
