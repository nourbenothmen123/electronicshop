<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CheckoutController extends Controller
{
    public function showCheckoutForm()
    {
        $user = Auth::user();
        if (is_null($user)) {
            // Handle the case when the user is not logged in or $user is null
            // Redirect to login page or show an error
            return redirect()->route('login');
        }
        return view('checkout', compact('user'));
        
    }
}
