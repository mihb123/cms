@extends('backend::layout')

@section('title', __('家族のニュース'))
@section('content')
<form class="kt-form row" id="node-form" action="{{ route('family-member-news.update', $data['id']) }}" method="POST">
    @csrf
    @method('PUT')
    <input type='hidden' name='id' value="{{ $data['id'] }}">
    <div class="col-md-9">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        {{ __('編集') }}
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="required">タイトル</label>
                            <input type="text" name="title" class="form-control" value="{{ $data->title }}" placeholder="{{ __('こちらにタイトルを入力') }}" />
                        </div>
                        <div class="col-md-6">
                            <label>カテゴリー</label>
                            <select class="form-control status" data-placeholder="選択してください" name="family_member_category_id">
                                <option value="" selected>{{ __('グループを選択してください') }}</option>
                                @foreach($listCategory as $key => $category)
                                    <option {{ $data->family_member_category_id == $category['id'] ? 'selected' : '' }} value="{{ $category['id'] }}">{{ $category['title'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="required">看取った方</label>
                            <select class="form-control status" data-placeholder="グループを選択してください" name="family_member_id">
                                <option value="" selected>{{ __('選択してください') }}</option>
                                @foreach($listfamilyMember as $key => $familyMember)
                                <option {{ ($data->family_member_id == $familyMember['id']) ? 'selected' : '' }} value="{{ $familyMember['id'] }}">{{ $familyMember['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="required">子タグ</label>
                            <select class="form-control status" data-placeholder="選択してください" name="tag_id">
                                <option value="" selected>{{ __('グループを選択してください') }}</option>
                                @foreach($listTag as $key => $tag)
                                <option {{ ($data->tag_id == $tag['id']) ? 'selected' : '' }} value="{{ $tag['id'] }}">{{ $tag['title'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="required">家族関係</label>
                            <input type="text" name="patient_relationship" class="form-control" value="{{ $data->patient_relationship }}" placeholder="{{ __('こちらに入力してください') }}" />
                        </div>
                        <div class="col-md-6">
                            <label class="required">家族関係(英語)</label>
                            <input type="text" name="patient_relationship_en" class="form-control" value="{{ $data->patient_relationship_en }}" placeholder="{{ __('英語でこちらに入力してください') }}" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="required">{{ __('享年') }}</label>
                            <input type="text" name="patient_birthday" class="form-control" value="{{ $data->patient_birthday ?? 0 }}"/>
                        </div>
                        <div class="col-md-6">
                            <label class="required">{{ __('最期を迎えた場所') }}</label>
                            <input type="text" name="treatment_place" class="form-control" value="{{ $data->treatment_place }}" placeholder="{{ __('こちらに入力してください') }}" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6 ">
                            <label class="required">{{ __('闘病期間') }}</label>
                            <div class="row">
                                <div class="col-md-4 input-group">
                                    <input type="text" name="disease_year_start" class="form-control" value="{{ $data->disease_year_start ?? "" }}" />
                                    <div class="input-group-append"><span class="input-group-text" id="basic-addon1">年</span></div>
                                </div>
                                <div class="col-md-4 input-group">
                                    <input type="text" name="disease_month_start" style="width: 80%;display: inline" class="form-control" value="{{ $data->disease_month_start ?? "" }}" />
                                    <div class="input-group-append"><span class="input-group-text" id="basic-addon1">ヶ月</span></div>
                                </div>
                                <div class="col-md-4 input-group">
                                    <input type="text" name="disease_day_start" style="width: 80%;display: inline" class="form-control" value="{{ $data->disease_day_start ?? "" }}" />
                                    <div class="input-group-append"><span class="input-group-text" id="basic-addon1">日</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="required">種類</label>
                            <select class="form-control status" data-placeholder="選択してください" name="type">
                                <option selected>{{ __('選択してください') }}</option>
                                @foreach(getTypeFamily() as $key => $type)
                                    <option {{ $data->type == $key ? 'selected' : '' }} value="{{ $key }}">{{ $type }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                            <label class="required">{{ __('ステータス') }}</label>
                            <select class="form-control status" data-placeholder="{{ __('ステータス') }}" name="status">
                                <option selected value="">{{ __('選択してください') }}</option>
                                @foreach(getListStatus() as $value => $name)
                                    <option {{  $data->status == $value ? 'selected' : '' }} value="{{ $value }}">{{ $name }}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div>
                    </div>

                @if($data['content'])
                    @foreach($data['content'] as $key => $content)
                        <div class="block mt-2 ui-menu menu{{ $key }}">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">ブロック</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool btn-remove-block">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body" style="display: block;border: 1px solid #dedede">
                                    <div class="block-content">
                                        <div class="form-group">
                                            <label>タイトル</label>
                                            <input class="form-control title-japan" type="text" name="content[{{$key}}][title-japan]" value="{{ $content['title-japan'] ?? '' }}">
                                        </div>
                                        <div class="form-group">
                                            <label>タイトル英語</label>
                                            <input class="form-control title-english" type="text" name="content[{{$key}}][title-english]" value="{{ $content['title-english'] ?? '' }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="d-block">{{ __('family-member::messages.banner') }}</label>
                                            @include('family-member::common.media', [
                                                'image' => $content['banner_image'] ?? '',
                                                'name' => "content[$key][banner_image]",
                                                'id' => "banner-image-$key",
                                                'class' => 'banner_image',
                                            ])
                                        </div>
                                        <div class="form-group">
                                            <label class="">{{ __('tag::messages.summary') }}</label>
                                            <textarea class="summernote" style="height:30px" name="content[{{$key}}][content]" cols="30" rows="3">{{ $content['content'] ?? '' }}</textarea>
                                        </div>
                                        <div class="text-right mt-2">
                                            <a href="#" class="add-level" data-menu="{{ $key }}" data-level="1">説明を追加</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                <div class="form-group">
                    <div class="text-right mt-2">
                        <a href="#" class="add-new-link" data-menu="1" data-level="1">説明を追加</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        {{ __('画像') }}
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="form-group">
                    <label>{{ __('family-member::messages.banner') }}</label>
                    @upload(['type' => 'image', 'vendor' => 'family-member-news', 'name' => 'avatar', 'value' => isset($data['avatar']->id) ? $data['avatar']->id : '' , 'thumb' => isset($data['avatar']->path) ? thumb($data['avatar']->path) : '' ])
                </div>
            </div>
        </div>
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        {{ __('アクション') }}
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="form-group">
                    <div class="col-md-12 fvalue">
                        <a class="btn btn-dark" href="{{ route('family-member-news.index') }}">
                            <i class="fa fa-arrow-left"></i>
                            {{ __('notice::messages.cancel') }}
                        </a>
                        <a href="{{ route('mitori-taiken.detail', $data['id']) }}" class="btn btn-success" target="_blank">
                            <i class="fa fa-eye text-light"></i>
                            {{ __('プレビュー') }}
                        </a>
                        <button id="node-save" type="submit" class="btn btn-primary" style="margin-right:5px;">
                            <i class="fa fa-save"></i>
                            {{ __('notice::messages.save') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@include('family-member::common.news_block')
@endsection
