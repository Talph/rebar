<?php

namespace App\Traits;

trait EmailSpamFilterTrait
{
    public function filterSpamMails($messageBody){
        $pattern = '/(http|ftp|mailto|Act now|Apply now|Buy direct|Click here|Exclusive deal|Offer expires|Email marketing|Order now|Visit our website)/';
        if(preg_match($pattern, $messageBody, $matches, PREG_OFFSET_CAPTURE)){
            return false;
        }
        return true;
    }
}
