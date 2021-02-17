<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Vendor extends Authenticatable implements MustVerifyEmail
{
    use HasFactory;
    use Notifiable;
    protected $table = 'vendors';

    public $primarykey = 'id';
    public $foreignkey = 'role_id';

    protected $fillable = [
        'name',
        'address',
        'phone_number',
        'mobile_number',
        'fax',
        'gst_certificate',
        'company_certificate',
        'pan',
        'adhaar',
        'email',
        'contact_person',
        'contact_person_mobile',
        'contact_person_email',
        'email_verification_code',
        'otp'
    ];
}
