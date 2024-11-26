<?php

namespace App\Observers;

use App\Models\Client;

class ClientObserver
{
    /**
     * Handle the Client "created" event.
     *
     * @param Client $client
     * @return void
     */
    public function creating(Client $client): void
    {
        $slug = \Str::slug($client->client_name);
        $count = Client::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->withTrashed()->count();
        $client->slug = $count ? "{$slug}-{$count}" : $slug;

    }

    /**
     * Handle the Client "created" event.
     *
     * @param Client $client
     * @return void
     */
    public function updating(Client $client): void
    {
        $slug = \Str::slug($client->slug);
        $count = Client::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->withTrashed()->count();
        $client->slug = $count ? "{$slug}-{$count}" : $slug;
    }
}
