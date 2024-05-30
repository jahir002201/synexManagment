<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasRoles;
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
     public static function getpermissionGroups()
     {
         $permission_groups = DB::table('permissions')
             ->select('group_name as name')
             ->groupBy('group_name')
             ->get();
         return $permission_groups;
     }

     public static function getpermissionsByGroupName($group_name)
     {
         $permissions = DB::table('permissions')
             ->select('name', 'id')
             ->where('group_name', $group_name)
             ->get();
         return $permissions;
     }

     public static function roleHasPermissions($role, $permissions)
     {
         $hasPermission = true;
         foreach ($permissions as $permission) {
             if (!$role->hasPermissionTo($permission->name)) {
                 $hasPermission = false;
                 return $hasPermission;
             }
         }
         return $hasPermission;
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
