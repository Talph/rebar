<?php

namespace App\Models;
use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    use HasFactory;
    //
    protected $table = 'industries';
    protected $fillable = [
        'industry_name','industry_slug','industry_icon','industry_description'
    ];

    public function relatedClients()
    {
        return $this->belongsToMany(Client::class, 'industries_clients', 'industry_id');
    }
}
