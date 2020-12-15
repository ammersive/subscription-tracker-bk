<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    // Take user input of paymentDate (DD) and return YYYYMMDD 
    public function paymentDaysToDate()
    {        
        $currentYearMonth = date("Ym");
        $currentDay = date('d'); // e.g. 20
        $paymentDate = $this->payment_date;

        // if current month is December AND currentDay is later than payment date
        if ((date("m") === "12") && ((int)$currentDay > $paymentDate)) {
            $nextYear = strval(((int)date("Y")) + 1);
            return (int)($nextYear . "01" . $paymentDate);
        }
        // if currentDay is later than payment date (but it's not December), increase month by 1
        else if ((int)$currentDay > $paymentDate) {
            $year = date("Y");
            // $nextMonth = strval(((int)date("m")) + 1);
            $nextMonth = ((int)date("m")) + 1;
            if (strlen($nextMonth) === 1) {
                $nextMonth = str_pad($nextMonth, 2, "0", STR_PAD_LEFT);
            }
            if (strlen($paymentDate) === 1) {
                $paymentDate = str_pad($paymentDate, 2, "0", STR_PAD_LEFT);
            }                                  
            return (int)($year . $nextMonth . $paymentDate);
        }
        else {
            return $currentYearMonth . $paymentDate; 
        }          
    }
}
