<?php

namespace App\Entity;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class EmailSender
{

	function __construct()
	{
		//
	}

	public function sendEmail(User $emailReceiver, string $messageContent = "Test"): bool
	{
	    if($emailReceiver instanceof User && $emailReceiver->isValidEmail() && $emailReceiver->getAge() < 13){
	        return true;
        }
        return false;
	}

}