<?php

namespace App\Models;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    use HasFactory;

        //
        protected $table = 'solutions';
        protected $default = ['id','solution_name','solution_slug','solution_icon','solution_description'];
        protected $fillable = [
            'solution_name','solution_slug'
        ];

        public function relatedClients()
        {
            return $this->belongsToMany(Client::class, 'solutions_clients', 'solution_id');
        }

}
