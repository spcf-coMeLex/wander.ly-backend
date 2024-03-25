<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\User\User;

class AwardPost extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table    = "award_posts";

    protected $fillable = [
        'user_id',
        'community_post_id',
    ];

    protected $hidden = [
        'id',
        'user_id',
        'community_post_id',
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    protected function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected function communityPost() {
        return $this->belongsTo(CommunityPost::class, 'community_post_id');
    }
}
