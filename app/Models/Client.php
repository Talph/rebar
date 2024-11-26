<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class Client extends Model implements HasMedia
{
    use HasFactory;
    use softDeletes;
    use InteractsWithMedia;

    //
    protected $table = 'clients';
    protected $fillable = [
        'client_name', 'user_id', 'client_desc', 'value_added', 'industry_id', 'slug', 'is_published',
    ];

    /**
     * @return BelongsToMany
     */
    public function relatedSolutions(): BelongsToMany
    {
        return $this->belongsToMany(Solution::class, 'solutions_clients', 'client_id');
    }

    /**
     * @return BelongsToMany
     */
    public function relatedIndustries(): BelongsToMany
    {
        return $this->belongsToMany(Industry::class, 'industries_clients', 'client_id');
    }

    /**
     * @return mixed
     */
    public function relatedUser(): mixed
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed();
    }

    /**
     * @return void
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('logos');
        $this->addMediaCollection('project-images');
    }

    public function getLastMediaUrl(string $value)
    {
        return $this->getFirstMedia($value) ? $this->getMedia($value)
            ->last()
            ->getUrl() : 'https://avatars.dicebear.com/api/bottts/' . $this->name. '.svg';
    }
}