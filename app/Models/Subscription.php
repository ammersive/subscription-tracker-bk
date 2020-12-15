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

    // Take payment_date (stored as an int) and return date string, formatted as YYYYMMDD 
    public function paymentDayToDate()
    {   
        // Current values from date object           
        $currentYear = date("Y"); 
        $currentMonth = date("m");
        $currentDay = date("d");

        // Values to return  
        $year = "";
        $month = "";
        $day = $this->payment_date; // int

        // If it's December AND currentDay is later than the payment date
        if (($currentMonth === "12") && ((int)$currentDay > $day)) {            
            $month = "01"; // Month of next payment is January            
            $year = (int)$currentYear + 1; // Increase year by 1
        }
        // Else if currentDay is later than payment date (but it's not December)
        else if ((int)$currentDay > $day) {                     
            $month = ((int)$currentMonth) + 1; // Increase month by 1   
            $year = $currentYear;
        }        
        // Else, currentDay is before payment date, and it's not December
        else {
            $month = $currentMonth;
            $year = $currentYear;
        }
        
        // Cast $day to string
        $day = strval($day);

        // Add 0 padding to single character $day and $month
        if (strlen($day) === 1) {
            $day = "0" . $day;  
        }
        if (strlen($month) === 1) {
            $month = "0" .$month;
        }               

        return $year . $month . $day;         
    }
}
