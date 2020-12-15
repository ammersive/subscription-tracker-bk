<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subscription;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ["category_name"];

    public $timestamps = false;

    public function subscriptions() {
        return $this->belongsToMany(Subscription::class);
    }

    public static function fromStrings(array $strings)  
    {
        return collect($strings)->map(fn($str) => trim($str))
                        ->unique()
                        ->map(fn($str) => Category::firstOrCreate(["category_name" => $str]));
    }
}
