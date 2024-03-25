<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class CommunityPost extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table    = "community_posts";

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'like_counts',
        'award_points',
        'img_basename'
    ];

    protected $hidden = [
        'id',
        'user_id',
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    protected function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
