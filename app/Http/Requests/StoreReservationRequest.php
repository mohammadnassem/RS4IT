<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StoreReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'check_in' => ['required', 'date', 'after:yesterday'],
            'check_out' => ['required', 'date', $this->afterFiveDays(
                request('check_in', null),
                request('check_out', null)
            )],
            'room_type' => ['required'],
            'need_extra_night' => ['required'],
            'extra.check_in' => ['required_if:need_extra_night,1', 'date', 'after:yesterday'],
            'extra.check_out' => ['required_if:need_extra_night,1', 'date', $this->afterFiveDays(
                request('extra.check_in', null),
                request('extra.check_out', null)
            )],
            'extra.room_type' => ['required_if:need_extra_night,1'],
        ];
    }

    private function afterFiveDays(?string $checkInDate, ?string $checkOutDate): bool
    {
        if (!$checkInDate or !$checkOutDate)
            return false;

        $checkIn = Carbon::createFromFormat('Y-m-d', $checkInDate);
        $checkOut = Carbon::createFromFormat('Y-m-d', $checkOutDate);

        return $checkIn->diffInDays($checkOut) < 6;
    }
}
