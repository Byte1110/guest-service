<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use libphonenumber\PhoneNumberUtil;
use libphonenumber\NumberParseException;

class Guest extends Model
{
    use HasFactory;

    protected $table = 'guests';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'country',
    ];

    // Уникальные поля
    public static $rules = [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|unique:guests,email',
        'phone' => 'required|string|unique:guests,phone',
        'country' => 'nullable|string|max:255',
    ];

    // Метод для определения страны по номеру телефона
    public static function determineCountry($phoneNumber)
    {
        $phoneUtil = PhoneNumberUtil::getInstance();

        // Парсинг номера телефона
        $numberProto = $phoneUtil->parse($phoneNumber, null);
        // Получение кода страны
        $countryCode = $phoneUtil->getRegionCodeForNumber($numberProto);

        return $countryCode;
    }
}
