<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

final class Company extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'address',
    ];

    protected $hidden = [
        'id',
    ];

    public function customers(): ?BelongsToMany
    {
        return $this->belongsToMany(Customer::class, 'company_customer', 'company_id', 'customer_id');
    }
}
