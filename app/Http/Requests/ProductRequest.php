<?php

namespace App\Http\Requests;

use App\Models\Product;
use App\Models\ProductPlatform;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
     * @return array
     */
    public function rules(): array
    {
        $is_post_request = $this->request->get('_method') == "POST" ? true : false ;

        // this id is used for edit the methods so the uniqueness is not checked against itself
        $id = $is_post_request ? 'blah'  : $this->route('product')->id;
        Log::info($id) ;
        $validation_array =  [
            'name' => ['string', 'required'],
            'image' => ['nullable', 'image'],
            'short_description' => ['string', 'required'],
            'description' => ['string', 'required'],
            'pricing_model' => ['string', Rule::in( Product::PRICING_MODEL )],
            'url' => ['string', 'required', 'url', 'unique:products,url' . ','. $id],
            'categories_id' => 'sometimes|array',
            'categories_id.*' => 'exists:categories,id',
        ];

        if ( ! $is_post_request )
        {
            $product = Product::find($id);

            foreach( ProductPlatform::PLATFORM as $platform )
            {
                // we are looping all platforms
                $field_name = strtolower($platform) . '_url' ;
                // checking if the platform already exists for this product
                $product_platform =  $product->platform($platform) ;
                // append nothing if the platform doesnt exist or the platforms id to avoid uniqueness
                $append_id_string = $product_platform ?  ',' . $product_platform->id : '' ;

                $validation_array += [ 'platform.'. $field_name => ['nullable', 'url', 'unique:product_platforms,url'.  $append_id_string] ] ;
            }

        } else {
            $validation_array += [ 'platform.*' => ['nullable', 'url', 'unique:product_platforms,url'] ] ;
        }
        Log::info(json_encode($validation_array));
        return $validation_array ;
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors()->toArray();
        $formattedErrors = [];

        foreach ($errors as $key => $error) {
            $formattedKey = str_replace('.', '[', $key) . ']';
            $formattedErrors[$formattedKey] = $error;
        }

        throw new HttpResponseException(
            redirect()->back()->withErrors($formattedErrors)->withInput()
        );
    }

}
