<?php

namespace App\Http\Requests\Job;

use Illuminate\Foundation\Http\FormRequest;

class SalonCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'name' => ['required', 'string', 'max:25', 'unique:salons'],
            'motto' => ['sometimes', 'max:25'],
            'phone' => ['required', 'string', 'min:9', 'max:9'],
            'address' => ['required', 'string', 'max:55'],
            'location' => 'sometimes',
            'latitude' => ['sometimes'],
            'longitude' => ['sometimes'],
            'photo' => ['image', 'sometimes', 'mimes:jpg,bmp,png,jpeg'],
            'work_sh' => 'required',
            'work_fh' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'ველი: "დასახელებ"-ის შევსება სავალდებულოა.',
            'name.max' => 'დასახელება არ უნდა აღემატებოდეს 25 სიმბოლოს.',
            'name.unique' => 'ესეთი სალონის დასახელება უკვე არსებობს.',

            'motto.required' => 'ველი: "დევიზი"-ის შევსება სავალდებულოა.',
            'motto.max' => 'დევიზი არ უნდა აღემატებოდეს 25 სიმბოლოს.',

            'latitude.min' => 'არასწორე კოორდინატის ფორმაა.',
            'latitude.max' => 'არასწორე კოორდინატის ფორმაა.',

            'longitude.min' => 'არასწორე კოორდინატის ფორმაა.',
            'longitude.max' => 'არასწორე კოორდინატის ფორმაა.',

            'phone.required' => 'ველი: "ტელეფონი"-ის შევსება სავალდებულოა.',
            'phone.min' => 'ტელეფონის ნომერი უნდა იყოს 9 ციფრი, ფორმატით: 5xx xxx xxx',
            'phone.max' => 'ტელეფონის ნომერი უნდა იყოს 9 ციფრი, ფორმატით: 5xx xxx xxx.',
            'phone.numeric' => 'ტელეფონის ნომერი უნდა შედგებოდეს მხოლოდ ციფრებისგან.',

            'address.required' => 'ველი: "მისამართი"-ის შევსება სავალდებულოა.',
            'address.max' => 'მისამართი არ უნდა აღემატებოდეს 55 სიმბოლოს.',

            'photo.mimes' => 'ფოტო უნდა იყოს ერთ-ერთი ფორმატი: Jpg; Jpeg; Png; Bmp.',
            'photo.size' => 'ფოტო არ უნდა აღემატებოდეს 512 კილობაიტს.',

        ];
    }
}
