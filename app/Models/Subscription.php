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

    // Take user input of paymentDate (DD) and return date string formatted YYYYMMDD 
    public function paymentDaysToDate()
    {   
        // Get current year and month as "YYYYMM"     
        $currentYearMonth = date("Ym");
        // Get current day: e.g. "20" or "2"  
        $currentDay = date('d');
        // Get payment date for object instance
        $paymentDate = $this->payment_date;

        // if current month is December AND currentDay is later than payment date
        if ((date("m") === "12") && ((int)$currentDay > $paymentDate)) {
            // Convert year to int, add 1, convert back to string
            $nextYear = strval(((int)date("Y")) + 1);
            // If month paymentDate is a single character, add 0 padding
            if (strlen($paymentDate) === 1) {
                $paymentDate = str_pad($paymentDate, 2, "0", STR_PAD_LEFT);
            }
            // Concatenate new year value, January value, and paymentDate
            return $nextYear . "01" . $paymentDate;
        }
        // if currentDay is later than payment date (but it's not December), increase month by 1
        else if ((int)$currentDay > $paymentDate) {
            $year = date("Y");
            // $nextMonth = strval(((int)date("m")) + 1);
            $nextMonth = ((int)date("m")) + 1;

            // If month and/or paymentDate are a single character, add 0 padding
            if (strlen($nextMonth) === 1) {
                $nextMonth = str_pad($nextMonth, 2, "0", STR_PAD_LEFT);
            }
            if (strlen($paymentDate) === 1) {
                $paymentDate = str_pad($paymentDate, 2, "0", STR_PAD_LEFT);
            }                                  
            return $year . $nextMonth . $paymentDate;
        }
        // when currentDay is earlier than payment date
        else {
            return $currentYearMonth . $paymentDate; 
        }          
    }
}
