<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInquiryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'request_type' => 'required|string|in:book service,book consultant,ask for speaker,attend gathering,be in connection,other',
            'message' => 'required|string',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        $locale = app()->getLocale();

        if ($locale == 'ar') {
            return [
                'name.required' => 'يرجى إدخال اسمك.',
                'name.string' => 'يجب أن يكون الاسم نصاً.',
                'name.max' => 'الاسم طويل جداً (الحد الأقصى 255 حرف).',

                'email.required' => 'يرجى إدخال بريدك الإلكتروني.',
                'email.email' => 'يرجى إدخال عنوان بريد إلكتروني صحيح.',
                'email.max' => 'البريد الإلكتروني طويل جداً.',

                'phone.required' => 'يرجى إدخال رقم الهاتف.',
                'phone.string' => 'رقم الهاتف يجب أن يكون نصاً.',
                'phone.max' => 'رقم الهاتف طويل جداً (الحد الأقصى 20 رقم).',

                'request_type.required' => 'يرجى تحديد نوع الطلب.',
                'request_type.string' => 'نوع الطلب يجب أن يكون نصاً.',
                'request_type.in' => 'نوع الطلب الذي قمت باختياره غير صالح، يرجى اختيار نوع صحيح من القائمة.',

                'message.required' => 'يرجى كتابة رسالتك أو استفسارك.',
                'message.string' => 'يجب أن تكون الرسالة نصاً.',
            ];
        }

        return [
            'name.required' => 'Please enter your name.',
            'name.string' => 'The name must be a valid string.',
            'name.max' => 'The name may not be greater than 255 characters.',

            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.max' => 'The email may not be greater than 255 characters.',

            'phone.required' => 'Please enter your phone number.',
            'phone.string' => 'The phone number must be a valid string.',
            'phone.max' => 'The phone number may not be greater than 20 characters.',

            'request_type.required' => 'Please select a request type.',
            'request_type.string' => 'The request type must be a string.',
            'request_type.in' => 'Invalid transmission intent selected. Please choose a valid option.',

            'message.required' => 'Please enter your message.',
            'message.string' => 'The message must be a valid string.',
        ];
    }
}
