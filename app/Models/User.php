<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Collection;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    public function employees(){
        return $this->hasOne(Employee::class );
     }
    public function socials(){
        return $this->hasMany(Social::class, 'user_id');
     }
     public function leadingProjects()
     {
         return $this->hasMany(Project::class, 'leader_id');
     }

     public function memberProjects()
     {
         return Project::withMember($this->id);
     }

     public function allProjects()
     {
         // Get all leading projects
         $leadingProjects = $this->leadingProjects;

         // Get all member projects
         $memberProjects = $this->memberProjects()->get();

         // Merge and get unique projects by ID
         $allProjects = $leadingProjects->merge($memberProjects)->unique('id');
         $sortedProjects = $allProjects->sortByDesc('id');

         return $sortedProjects;

        //  return new Collection($allProjects);
     }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
