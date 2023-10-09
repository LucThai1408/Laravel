<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|unique:products',
            'category_id'=>'required',
            'price'=>'required|numeric',
            'sale_price'=>'required|numeric',
            'photo'=>'required|image'
        ];
    }

    public function messages(){
        return[
            'name.required'=>'Tên sản phẩm không được để trống',
            'name.unique'=>'Tên sản phẩm đã tồn tại',
            'category_id.required'=>'Danh mục không được để trống',
            'price.required'=>'Giá sản phẩm không được để trống',
            'price.numeric'=>'Giá sản phẩm phải là số',
            'sale_price.required'=>'Giá khuyến mại không được để trống',
            'sale_price.numeric'=>'Giá khuyến mãi phải là số',
            'photo.required'=>'Ảnh không được để trống',
            'photo.image'=>'Vui lòng chọn đúng file ảnh'
        ];
    }
}
