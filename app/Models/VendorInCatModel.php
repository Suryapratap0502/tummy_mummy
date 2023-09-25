<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorInCatModel extends Model
{
    use HasFactory;
    protected $table = 'vendor_in_category';

    public function category_vendor()
    {
        return $this->belongsTo(VendorCategoryModel::class,'category_id','id');
    }
}


