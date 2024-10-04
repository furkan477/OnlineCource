<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Cource;
use App\Models\Enrollment;
use App\Notifications\StuNewCourceNotification;
use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollmentsController extends Controller
{
    public function EnrollmentCreate(Request $request, Cource $cource)
    {
        if (Auth::check()) {
            Stripe::setApiKey(env('STRIPE_SECRET'));

            $enrol = Enrollment::create([
                "user_id" => Auth::id(),
                "cource_id" => $cource->id,
            ]);

            $charge = Charge::create([
                'amount' => $cource->price * 100,
                'currency' => 'try',
                'source' => $request->stripeToken,
                'description' => 'Ödeme Başarılı',
            ]);

            Card::where('cource_id', $enrol->cource_id)->delete();

            $enrol->user->notify(new StuNewCourceNotification($cource->id));

            return redirect()->route("home");
        }
        return redirect('login');

    }
}
