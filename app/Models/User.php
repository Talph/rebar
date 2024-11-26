<?php

namespace App\Models;

use App\Traits\HasRolesAndPermissions;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements HasMedia
{
    use Notifiable;
    use SoftDeletes;
    use HasRolesAndPermissions;
    use InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return HasMany
     */
    public function relatedProject(): HasMany
    {
        return $this->hasMany(Project::class, 'user_id');
    }

    public function relatedClients(): HasMany
    {
        return $this->hasMany(Client::class, 'user_id');
    }

    public function relatedDetails(): HasMany
    {
        return $this->hasMany(UserDetails::class, 'user_id');
    }

    /**
     * @return Collection
     */
    public function getRelatedProject(): Collection
    {
        return $this->relatedProject()->get();
    }


}
