<?php

namespace App\Http\Controllers;

use App\Enums\DocumentType;
use App\Helpers\FlagHelper;
use App\Http\Requests\StoreEmailRequest;
use App\Http\Requests\StorePassengerInfoRequest;
use App\Http\Requests\StorePhoneNumberRequest;
use App\Http\Requests\StoreReservationRequest;
use App\Models\Passenger;
use App\Traits\UploadFile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Illuminate\View\View;

class HomeController extends Controller
{
    use UploadFile;

    public function main(): View
    {
        return view('pages.main.index');
    }

    public function storeEmail(StoreEmailRequest $request): RedirectResponse
    {

        $passenger = Passenger::create($request->validated());

        session()->put('_email', $passenger->email);

        // email send with _email and generated token

        return redirect()->route('verify');
    }

    public function phoneNumber(): View
    {
        $flags = FlagHelper::getFlagsNames();

        return view('pages.main.phone-number', ['flags' => $flags]);
    }

    public function verify(): View
    {
        return view('pages.main.verify');
    }

    public function storePhoneNumber(StorePhoneNumberRequest $request): RedirectResponse
    {
        $email = $request->query('_email', 'default@gmail.com');
        $token = $request->query('_token', '439fh9u3bnverfnjmvd934');

        if (!$email or !$token)
            return redirect()->route('main');

        session()->put('_email', $email);
        session()->put('_token', $token);

        $passenger = Passenger::where('email', '=', session('_email'))->first();

        if (!$passenger)
            return redirect()->route('main');

        $passenger->update(array_merge($request->validated(), [
            'phone_number' => $request->get('country_code') . $request->get('phone_number')
        ]));

        return redirect()->route('passenger-info');
    }

    public function passengerInfo(): View
    {
        $flags = FlagHelper::getFlagsNames();

        return view('pages.main.passenger-info-v2', compact('flags'));
    }

    public function storePassengerInfo(StorePassengerInfoRequest $request): RedirectResponse
    {
        $authorized = session()->has('_email') and session()->has('_token');

        if (!$authorized)
            return redirect()->route('main');

        $passenger = Passenger::where('email', '=', session('_email'))->first();

        if (!$passenger)
            return redirect()->route('main');

        $passenger->passengerInfo()->create(Arr::except($request->validated(), [
            'have_companion',
            'companion',
            'personal_pic',
            'passport_pic'
        ]));

        $personalFileName = $this->uploadFile($request->file('personal_pic'), 'public/docs/personal');
        $passenger->passengerInfo->documents()->create([
            'doc_src' => $personalFileName,
            'doc_type' => DocumentType::PERSONAL_PICTURE
        ]);

        $passportFileName = $this->uploadFile($request->file('passport_pic'), 'public/docs/passport');
        $passenger->passengerInfo->documents()->create([
            'doc_src' => $passportFileName,
            'doc_type' => DocumentType::PASSPORT_PICTURE
        ]);

        if ($request->get('have_companion') == '1')
            $passenger->passengerInfo->companion()->create(array_values($request->get('companion')));

        $compPersonalFileName = $this->uploadFile($request->file('companion.personal_pic'), 'public/docs/personal');
        $passenger->passengerInfo->companion->documents()->create([
            'doc_src' => $compPersonalFileName,
            'doc_type' => DocumentType::PERSONAL_PICTURE
        ]);

        $compPassportFileName = $this->uploadFile($request->file('companion.passport_pic'), 'public/docs/passport');
        $passenger->passengerInfo->companion->documents()->create([
            'doc_src' => $compPassportFileName,
            'doc_type' => DocumentType::PASSPORT_PICTURE
        ]);

        return redirect()->route('hh');
    }

    public function reservation(): View
    {
        $flags = FlagHelper::getFlagsNames();

        return view('pages.main.passenger-info-v2', compact('flags'));
    }

    public function storeReservation(StoreReservationRequest $request): RedirectResponse
    {
        $authorized = session()->has('_email') and session()->has('_token');

        if (!$authorized)
            return redirect()->route('main');

        $passenger = Passenger::where('email', '=', session('_email'))->first();

        if (!$passenger)
            return redirect()->route('main');

        $passenger->reservations()->create(array_merge($request->validated(), [
            'phone_number' => $request->get('country_code') . $request->get('phone_number')
        ]));

        return redirect()->route('');
    }

}
