<?php

namespace App\Http\Requests\Api\V1\Membership;
use Illuminate\Foundation\Http\FormRequest;
use Timedoor\TmdMembership\traits\AuthenticateUsers;

class LoginRequest extends FormRequest
{
    use AuthenticateUsers;
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            $this->username() => 'required',
            'password'        => 'required'
        ];
    }
}
