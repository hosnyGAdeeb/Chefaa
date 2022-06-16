<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function pharmacies()
    {
        return $this->belongsToMany(Pharmacy::class)->withPivot(['price']);
    }

    protected static function booted()
    {

        // delete the image file from the storage
        static::deleted(function ($model) {
            if ($model->image != '/uploads/products/default.jpg') {
                Storage::delete($model->image);
            }
        });

        // delete the old image if the request has new image on update
        static::updated(function ($model) {
            if (request()->hasFile('image')) {
                if ($model->getOriginal('image') != '/uploads/products/default.jpg') {
                    Storage::delete($model->getOriginal('image'));
                }
            }
        });
    }

}
