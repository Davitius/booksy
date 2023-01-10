<?php

namespace App\Http\Requests\Job\Salon;

use Illuminate\Foundation\Http\FormRequest;

class SalonFlipPhotoRequest extends FormRequest
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
            'flipphoto1' => 'image|sometimes|mimes:jpg,bmp,png,jpeg',
            'flipphoto2' => 'image|sometimes|mimes:jpg,bmp,png,jpeg',
            'flipphoto3' => 'image|sometimes|mimes:jpg,bmp,png,jpeg',
            'flipphoto4' => 'image|sometimes|mimes:jpg,bmp,png,jpeg',
            'flipphoto5' => 'image|sometimes|mimes:jpg,bmp,png,jpeg'
        ];
    }

    public function messages()
    {
        return [
            'flipphoto1.mimes' => 'ფოტო უნდა იყოს ერთ-ერთი ფორმატი: Jpg; Jpeg; Png; Bmp.',
            'flipphoto1.size' => 'ფოტო არ უნდა აღემატებოდეს 512 კილობაიტს.',

            'flipphoto2.mimes' => 'ფოტო უნდა იყოს ერთ-ერთი ფორმატი: Jpg; Jpeg; Png; Bmp.',
            'flipphoto2.size' => 'ფოტო არ უნდა აღემატებოდეს 512 კილობაიტს.',

            'flipphoto3.mimes' => 'ფოტო უნდა იყოს ერთ-ერთი ფორმატი: Jpg; Jpeg; Png; Bmp.',
            'flipphoto3.size' => 'ფოტო არ უნდა აღემატებოდეს 512 კილობაიტს.',

            'flipphoto4.mimes' => 'ფოტო უნდა იყოს ერთ-ერთი ფორმატი: Jpg; Jpeg; Png; Bmp.',
            'flipphoto4.size' => 'ფოტო არ უნდა აღემატებოდეს 512 კილობაიტს.',

            'flipphoto5.mimes' => 'ფოტო უნდა იყოს ერთ-ერთი ფორმატი: Jpg; Jpeg; Png; Bmp.',
            'flipphoto5.size' => 'ფოტო არ უნდა აღემატებოდეს 512 კილობაიტს.',
        ];
    }
}
