<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaticPageRequest extends FormRequest
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
        if ($this->isMethod('post')) {
            $rules = [
                'title_ru' => 'required',
            ];
            switch ($this->route()->parameter('name')) {
                case 'index':
                    $rules = array_merge(
                        $rules,
                        [
                            'description_ru' => 'required',
                            'longtitle_ru'   => 'required',
                        ]
                    );
                    break;
                case 'faq':
                    $rules = array_merge(
                        $rules,
                        [
                            'longtitle_ru' => 'required',
                        ]
                    );
                    break;
                case 'aids':
                    $rules = array_merge(
                        $rules,
                        [
                            'modal_text_ru'   => 'required',
                            'modal_btn_ru'    => 'required',
                            'modal_bottom_ru' => 'required',
                        ]
                    );
                    break;
                case 'slide-bubles':
                    $rules = array_merge(
                        $rules,
                        [
                            'modal_text_ru' => 'required',
                            'modal_btn_ru'  => 'required',
                            'wrong_ru'      => 'required',
                        ]
                    );
                    break;
                case 'slide-rocket':
                    $rules = array_merge(
                        $rules,
                        [
                            'modal_text_ru'  => 'required',
                            'modal_btn_ru'   => 'required',
                            'text_bottom_ru' => 'required',
                            'wrong_ru'       => 'required',
                        ]
                    );
                    break;
                case 'with-who':
                    $rules = array_merge(
                        $rules,
                        [
                            'modal_text_ru' => 'required',
                            'modal_btn_ru'  => 'required',
                            'pop_title_ru'  => 'required',
                            'chk_1_ru'      => 'required',
                            'chk_2_ru'      => 'required',
                            'chk_3_ru'      => 'required',
                            'chk_4_ru'      => 'required',
                            'chk_5_ru'      => 'required',
                            'chk_6_ru'      => 'required',
                        ]
                    );
                    break;
                case 'bandit':
                    $rules = array_merge(
                        $rules,
                        [
                            'modal_text_ru'  => 'required',
                            'modal_btn_ru'   => 'required',
                            'tumb_on_off_ru' => 'required',
                            'rocket_btn_ru'  => 'required',
                            'rotator1_ru'    => 'required',
                            'rotator2_ru'    => 'required',
                            'rotator3_ru'    => 'required',
                            'rotator4_ru'    => 'required',
                        ]
                    );
                    break;
                case 'condoms-white':
                    $rules = array_merge(
                        $rules,
                        [

                        ]
                    );
                    break;
                case 'consultants':
                    $rules = array_merge(
                        $rules,
                        [
                            'description_ru'  => 'required',
                            'Consultant_ru'   => 'required',
                            'consHeader_1_ru' => 'required',
                            'consHeader_2_ru' => 'required',
                            'consHeader_3_ru' => 'required',
                            'consHeader_4_ru' => 'required',
                            'consHeader_5_ru' => 'required',
                            'consHeader_6_ru' => 'required',
                            'consHeader_7_ru' => 'required',
                            'list_ru'         => 'required',
                        ]
                    );
                    break;
            }

            return $rules;
        }

        return [];
    }
}
