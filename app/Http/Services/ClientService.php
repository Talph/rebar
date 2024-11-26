<?php

namespace App\Http\Services;

use App\Models\Client;
use App\Traits\StringCaseTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ClientService
{
    use StringCaseTrait;
    public function storeClient(Client $client, mixed $request): Model|Builder
    {
        return $client::query()->updateOrCreate(
            [
                'id' => $client->id,
            ],[
            'client_name' => $this->stringCapitalizeAllFirstLetters($request->get('client_name')),
            'client_desc' => $this->stringCapitalizeFirstLetter($request->get('client_desc')),
            'value_added' => $this->stringCapitalizeFirstLetter($request->get('value_added')),
            'is_published' => $request->get('is_published'),
            'user_id' => auth()->id(),
        ]);
    }
}