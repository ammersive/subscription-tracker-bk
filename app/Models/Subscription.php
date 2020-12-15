<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Subscription extends Model
{
    use HasFactory;
    protected $fillable = ["subscription_name", "cost", "start", "payment_date", "notice_period"];

    public function categories() {
        return $this->belongsToMany(Category::class);
    }

    public function setCategories(array $strings) : Subscription {
        $categories = Category::fromStrings($strings);
        $this->categories()->sync($categories->pluck("id"));
        return $this;
    }
}
