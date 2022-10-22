<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (auth()->user()->role == 'admin') {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        switch (request()->method()) {
            case 'POST':
                return [
                    "name" => ["required"],
                    "email" => ["required", "email", "unique:users"],
                    "password" => ["required", "confirmed"],
                    "address" => ["required"],
                    "phonenumber" => ["required", 'digits:10', 'numeric', "regex:/(\+977)?[9][6-9]\d{8}/"],
                    "role" => ["required", /* Rule::in(User::CRUD_ROLES) */],
                    "post" => ["required"],
                    "dob" => ["required", "before:today"],
                    "bloodgroup" => ["required"],
                    "entry_time" => ["required"],
                    "exit_time" => ["required", "after:entry_time"],
                ];
            case 'PUT':
                return [
                    "name" => ["required"],
                    "email" => ["required", "email", "unique:users,email," . $this->route('user')->id],
                    "address" => ["required"],
                    "phonenumber" => ["required", 'digits:10', 'numeric', "regex:/(\+977)?[9][6-9]\d{8}/"],
                    "role" => ["required", /* Rule::in(User::CRUD_ROLES) */],
                    "post" => ["required"],
                    "dob" => ["required", "before:today"],
                    "bloodgroup" => ["required"],
                    "entry_time" => ["required"],
                    "exit_time" => ["required", "after:entry_time"],
                    "status" => ["nullable"],
                ];
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter your name.',
            'email.required' => 'Please enter your email address.',
            'address.required' => 'Please enter your address.',
            'phonenumber.required' => 'Please enter your phonenumber.',
            'phonenumber.regex' => 'Please enter valid phone number.',
            'role.required' => 'Please select a role.',
            'post.required' => 'Please enter your post.',
            'dob.required' => 'Please enter your date of birth',
            'bloodgroup.required' => 'Please select a bloodgroup.',
            'entry_time.required' => 'Please enter your entry time.',
            'exit_time.required' => 'Please enter your exit time.',
            'password.required' => 'Please enter your password.',

            'email.unique' => "Email has been already registered. Please use another email address.",

            'phonenumber.numeric' => "Phonenumber should be number.",
            'phonenumber.min' => "Phonenumber should be atleast 10  digits.",


            'dob.before' => "Please select date before today.",
            'exit_time.after' => "Exit time should be after entry time.",

        ];
    }
}
