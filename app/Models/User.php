<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Carbon\Carbon;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'email_verified_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function activeSubscription()
    {
        return $this->hasOne(Subscription::class)
            ->where('status', 'active')
            ->where('expires_at', '>', now());
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function auditLogs()
    {
        return $this->hasMany(AuditLog::class);
    }

    public function hasFeature($featureKey)
    {
        $subscription = $this->activeSubscription;
        if (!$subscription) {
            // Default to free plan features
            $freePlan = Plan::where('name', 'Free')->first();
            return $freePlan ? $freePlan->features->contains('key', $featureKey) : false;
        }
        
        return $subscription->plan->features->contains('key', $featureKey);
    }

    public function canCreateProject()
    {
        $subscription = $this->activeSubscription;
        $plan = $subscription ? $subscription->plan : Plan::where('name', 'Free')->first();
        
        if (!$plan) return false;
        
        $projectCount = $this->projects()->count();
        return $plan->max_projects == -1 || $projectCount < $plan->max_projects;
    }
}