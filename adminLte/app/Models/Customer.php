<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

final class Customer extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'surname',
        'phone_number',
    ];

    protected $hidden = [
        'id',
    ];

    public function companies(): ?BelongsToMany
    {
        return $this->belongsToMany(Company::class, 'company_customer', 'customer_id', 'company_id');
    }

}
