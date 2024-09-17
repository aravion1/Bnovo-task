<?php

namespace App\Services;

use App\Models\Guest;
use libphonenumber\PhoneNumberFormat;
use libphonenumber\PhoneNumberUtil;
use libphonenumber\PhoneNumberToCarrierMapper;
use libphonenumber\geocoding\PhoneNumberOfflineGeocoder;

class GuestService
{
    public function create(array $data): Guest
    {
        $phoneUtil = PhoneNumberUtil::getInstance();
        $phoneNumberOfflineGeocoder = PhoneNumberOfflineGeocoder::getInstance();
        $number = $phoneUtil->parse($data['phone'], null);

        if (!isset($data['country'])) {
            $data['country'] = $phoneNumberOfflineGeocoder->getDescriptionForNumber($number, 'ru');
        }

        $data['phone'] = str_replace(' ', '', $phoneUtil->format($number, PhoneNumberFormat::NATIONAL));
        return Guest::create($data);
    }

    public function update(int $id, array $data): int
    {
        return Guest::where('id', $id)->update($data);
    }
}
