<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class Film extends Model
{
    public $timestamps = false;
    use HasFactory;
    
    protected $fillable = [
        'name', 'status', 'poster_link'
    ];

    public static $rules = [
        'name' => 'required',
        'status' => 'integer',
        'poster_link' => 'nullable|string',
        'genres' => "required|array|min:1",
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    public static $statusNames = [
        0 => 'Не опубликован',
        1 => 'Опубликован',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function genres() {
        return $this->belongsToMany(Genre::class);
    }
    public function getStatusName() {
        return self::$statusNames[$this->status];
    }
    public function saveGenres(array $genres) {
        foreach ($genres as $genre) {
            $selected[] = ['genre_id' => $genre];
        }
        $this->genres()->detach();
        $this->genres()->attach($selected);
    }
    public function savePoster(UploadedFile $posterFile = null) {
        if ($posterFile === null) {
            if ($this->poster_link !== null) {
                return;
            }
            $posterName = 'default_poster.jpg';
        } else {
            $posterName = uniqid().'.'.$posterFile->extension();
            $posterFile->move(public_path('images'), $posterName);
        }        
        $this->poster_link = '/images/' . $posterName;
        $this->save();
    }
}
