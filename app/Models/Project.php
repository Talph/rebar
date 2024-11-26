<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class Project extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;

    protected $fillable = [
        'project_name','project_number', 'project_desc', 'client_id', 'project_value', 'fees','location','role','start_date', 'end_date', 'meta_desc',
        'project_status', 'user_id','posted_at','slug', 'is_published',
    ];

    /**
     * @return BelongsTo
     */
    public function relatedUsers(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return BelongsTo
     */
    public function relatedClients(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    /**
     * @return Model|null
     */
    public function getRelatedUser(): User|null
    {
        return $this->relatedUsers()->first();
    }

    /**
     * @return BelongsToMany
     */
    public function relatedCategories(): BelongsToMany
    {
        return $this->belongstoMany(ProjectCategory::class, 'project_project_categories');
    }

    /**
     * @return Model|null
     */
    public function getRelatedClients(): Client|null
    {
        return $this->relatedClients()->first();
    }

    /**
     * @return Collection
     */
    public function getRelatedCategories(): Collection
    {
        return $this->relatedCategories()->get();
    }
}
