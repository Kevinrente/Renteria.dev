<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     * This allows us to use Profile::update($data) from the admin panel.
     * * @var array
     */
    protected $fillable = [
        'nombre',
        'especializacion',
        'resumen',
        'experiencia_laboral', // Stored as simple text/markdown
        'foto_url',
        'linkedin_url',
        'github_url',
        'x_url',
        'email_contacto',
    ];

    /**
     * The attributes that should be cast to native types.
     * We don't need any special casting, but it's good practice to define this if needed later.
     * * @var array
     */
    protected $casts = [
        // 'experiencia_laboral' => 'array', // Optional: If you decide to store experience as JSON
    ];

    // Accessor (Optional: useful for converting stored text to HTML/breaks in the view)
    // public function getFormattedExperienceAttribute()
    // {
    //     return nl2br(e($this->experiencia_laboral));
    // }
}
