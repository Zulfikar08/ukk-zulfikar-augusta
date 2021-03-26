<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Http\Request;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'  => ['required', 'string',   'max:255'],
            'email' => ['required', 'email',    'max:255',Rule::unique('users', 'email')->ignore(Auth::user()->id)],
            'nik'   => ['required', 'numeric',  'digits:16'],
            'phone' => ['required', 'numeric',  'digits_between:12,13'],
        ];

        // $validate->validate($request->all(),[
        //     'name'  => ['required', 'string',   'max:255'],
        //     'email' => ['required', 'email',    'max:255',Rule::unique('users', 'email')->ignore(Auth::user()->id)],
        //     'nik'   => ['required', 'numeric',  'digits:16'],
        //     'phone' => ['required', 'numeric',  'digits_between:12,13'],
        // ], [
        //     'name.required' => 'Nama Harus Diisi',
        //     'email.required' => 'Nama Harus Diisi',
        //     'name.required' => 'Nama Harus Diisi',
        //     'name.required' => 'Nama Harus Diisi',
        // ]); 

        // return $validate;
    }
}
