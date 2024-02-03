<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke()
    {
        request()->validate(['email' => 'email']);

   
    try{
        (new Newsletter())->suscribe(request('email'));
        
    }catch(\Exception $e){
        throw ValidationException::withMessages([
            'email' => 'Please put in a valid email'
        ]);
    }

    return redirect('/')->with('success', 'You have successfully subscribed to our newsletter');

    }
}
