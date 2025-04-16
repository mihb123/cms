<?php

namespace App\Http\Requests\FamilyMemberNews;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $arrValidations = [
            'family_member_id' => 'required|numeric|exists:App\Models\FamilyMember,id',
            'tag_id' => 'required|numeric|exists:App\Models\FamilyMemberTag,id',
            'title' => 'required|max:255',
            'patient_birthday' => 'required|numeric',
            'treatment_place' => 'required|max:255',
            'disease_year_start' => 'required|numeric',
            'disease_month_start' => 'required|numeric',
            'disease_day_start' => 'required|numeric',
            'type' => 'required|numeric',
            'avatar' => 'required',
            'patient_relationship' => 'required|max:255',
            'patient_relationship_en' => 'required|max:255',
            'status' => 'required'
        ];

        return $arrValidations;
    }

    public function messages()
    {
        return [
            //'family_member_id.required' was modded by a.u (2025.02.25)
            //'family_member_id.required' => sprintf(__('family-member::messages.validate.not_empty'), __('family-member::messages.family_member')),
            'family_member_id.required' => sprintf(__('family-member::messages.validate.not_empty'), __('看取った方')),
            'family_member_id.numeric' => sprintf(__('family-member::messages.validate.numeric'), __('family-member::messages.family_member')),
            'family_member_id.unique' => sprintf(__('family-member::messages.validate.unique'), __('family-member::messages.family_member')),
            //'tag_id.required' was modded by a.u (2025.02.25)
            //'tag_id.required' => sprintf(__('family-member::messages.validate.not_empty'), __('family-member::messages.tag')),
            'tag_id.required' => sprintf(__('family-member::messages.validate.not_empty'), __('子タグ')),
            'tag_id.numeric' => sprintf(__('family-member::messages.validate.numeric'), __('family-member::messages.tag')),
            'tag_id.unique' => sprintf(__('family-member::messages.validate.unique'), __('family-member::messages.tag')),
            'title.required' => sprintf(__('family-member::messages.validate.not_empty'), __('family-member::messages.title')),
            'title.max' => sprintf(__('family-member::messages.validate.max'), __('family-member::messages.title'),255),
            'patient_birthday.required' => sprintf(__('family-member::messages.validate.not_empty'), __('享年')),
            'patient_birthday.numeric' => sprintf(__('family-member::messages.validate.numeric'), __('享年')),
            'treatment_place.required' => sprintf(__('family-member::messages.validate.not_empty'), __('最期を迎えた場所')),
            'treatment_place.max' => sprintf(__('family-member::messages.validate.max'), __('最期を迎えた場所'),255),
            //'disease_year_start.required' was modded by a.u (2025.02.25)
            //'disease_year_start.required' => sprintf(__('family-member::messages.validate.not_empty'), __('年病日')),
            'disease_year_start.required' => sprintf(__('family-member::messages.validate.not_empty'), __('闘病期間の年数')),
            //'disease_year_start.numeric' was modded by a.u (2025.02.25)
            //'disease_year_start.numeric' => sprintf(__('family-member::messages.validate.numeric'), __('年病日')),
            'disease_year_start.numeric' => sprintf(__('family-member::messages.validate.numeric'), __('闘病期間の年数')),
            //'disease_month_start.required' was modded by a.u (2025.02.25)
            //'disease_month_start.required' => sprintf(__('family-member::messages.validate.not_empty'), __('ヶ月病日')),
            'disease_month_start.required' => sprintf(__('family-member::messages.validate.not_empty'), __('闘病期間の月数')),
            //'disease_month_start.numeric' was modded by a.u (2025.02.25)
            //'disease_month_start.numeric' => sprintf(__('family-member::messages.validate.numeric'), __('ヶ月病日')),
            'disease_month_start.numeric' => sprintf(__('family-member::messages.validate.numeric'), __('闘病期間の月数')),
            //'disease_day_start.required' was modded by a.u (2025.02.25)
            //'disease_day_start.required' => sprintf(__('family-member::messages.validate.not_empty'), __('日病日')),
            'disease_day_start.required' => sprintf(__('family-member::messages.validate.not_empty'), __('闘病期間の日数')),
            //'disease_day_start.numeric' was modded by a.u (2025.02.25)
            //'disease_day_start.numeric' => sprintf(__('family-member::messages.validate.numeric'), __('日病日')),
            'disease_day_start.numeric' => sprintf(__('family-member::messages.validate.numeric'), __('闘病期間の日数')),
            'type.required' => sprintf( __('種類を空にすることはできません')),
            'type.numeric' => sprintf(__('種類を空にすることはできません')),
            'avatar.required' => sprintf(__('family-member::messages.validate.required'), __('family-member::messages.avatar')),
            //'patient_relationship.required' was modded by a.u (2025.02.25)
            //'patient_relationship.required' => sprintf(__('family-member::messages.validate.not_empty'), __('family-member::messages.patient_relationship')),
            'patient_relationship.required' => sprintf(__('family-member::messages.validate.not_empty'), __('家族関係')),
            'patient_relationship.max' => sprintf(__('family-member::messages.validate.max'), __('family-member::messages.patient_relationship'),255),
            //'patient_relationship.required' was modded by a.u (2025.02.25)
            //'patient_relationship_en.required' => sprintf(__('family-member::messages.validate.not_empty'), __('family-member::messages.patient_relationship_en')),
            'patient_relationship_en.required' => sprintf(__('family-member::messages.validate.not_empty'), __('家族関係(英語)')),
            'patient_relationship_en.max' => sprintf(__('family-member::messages.validate.max'), __('family-member::messages.patient_relationship_en'),255),
            'status.required' => sprintf(__('family-member::messages.validate.required'), __('family-member::messages.status')),
        ];
    }

}
