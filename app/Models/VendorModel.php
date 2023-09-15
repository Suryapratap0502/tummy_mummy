<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorModel extends Model
{
    use HasFactory;
    protected $table = 'vendor';

    public function vendor_business_1()
    {
        return $this->belongsTo(VendorBusinessModel::class,'vendor_id','id');
    }

    public function admin()
    {
        return $this->belongsTo(UserModel::class,'admin_id','id');
    }
}
