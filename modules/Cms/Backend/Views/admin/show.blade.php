@extends('backend::layout')

@section('title', 'Admin view')
@section('description', 'Admin view')
@section('content:class', 'no-padding')

@section('content')
<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                @lang('backend::messages.detail')
            </h3>
        </div>
    </div>
    <div class="kt-portlet__body">
        <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-2x nav-tabs-line-success" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#info" role="tab">
                    <i class="flaticon-information"></i>
                    @lang('backend::messages.info')
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#roles" role="tab">
                    <i class="flaticon-user-add"></i>
                    @lang('backend::messages.perms')
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#password" role="tab">
                    <i class="flaticon-globe"></i>
                    @lang('backend::messages.password')
                </a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane active" id="info" role="tabpanel">
                <div class="row form-group">
                    <label for="code">{{ __('backend::messages.name') }} :</label>
                    <div class="col-md-10 fvalue">
                        {{ $node->name }}
                    </div>
                </div>
                @php
                    $avatar = $node['avatar'] ? json_decode($node['avatar'],true) : '';
                @endphp
                <div class="row form-group">
                    <label for="created" class="">{{ __('backend::messages.avatar') }} :</label>
                    <div class="col-md-10 fvalue">
                        <img src="{{ $avatar ?? thumb($avatar['path'])  }}">
                    </div>
                </div>

                <div class="row form-group">
                    <label for="about">{{ __('backend::messages.phone') }} :</label>
                    <div class="col-md-10 fvalue">
                        <a href="tel:{{ $node->mobile }}" target="_blank">{{ $node->mobile }}</a>
                    </div>
                </div>
                @php
                    $loca = $node['location'] ;
                    $city = $address = $thumb = '' ;
                    if ($loca) {
                        $city = $loca->city;
                        $address = $loca->address;
                    }
                @endphp
                <div class="row form-group">
                    <label for="city">{{ __('backend::messages.city') }} :</label>
                    <div class="col-md-10 fvalue">
                        {{ $city }}
                    </div>
                </div>

                <div class="row form-group">
                    <label for="address">{{ __('backend::messages.address') }} :</label>
                    <div class="col-md-10 fvalue">
                        {{ $address }}
                    </div>
                    <a target="_blank" class="pull-right btn btn-outline-brand btn-elevate btn-pill" href="https://www.google.com/maps?q={{ str_replace(' ', '+', $address) }}" data-toggle="tooltip" data-placement="left" title="" data-original-title="地図"><i class="flaticon2-pin-1"> 地図</i></a>
                </div>
                <div class="row form-group">
                    <label for="about">{{ __('backend::messages.about') }} :</label>
                    <a class="form-control" style="height:100px" name="about" placeholder="{{ __('backend::messages.about') }}" data-rule-maxlength="1024" cols="30" rows="3">{{ $node->about }}</a>
                </div>
                <div class="row form-group">
                    <label for="code">{{ __('backend::messages.permission') }}:</label>
                    <div class="col-md-10 fvalue">
                        @foreach($node->roles as $item)
                            <span>{{ $item }}</span>
                        @endforeach
                    </div>
                </div>

                <div class="row form-group">
                    <label for="status">{{ __('backend::messages.status') }} :</label>
                    <div class="col-md-10 fvalue">
                        @if($node->status == 1)
                            <span class="btn btn-outline-success">{{ $collection['status'][$node->status] }}</span>
                        @elseif($node->status == 0)
                            <span class="btn btn-outline-warning">{{ $collection['status'][$node->status] }}</span>
                        @else
                            <span class="btn btn-outline-dark">{{__($_module.'::messages.unknow')}}</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="roles" role="tabpanel">
                <table class="table table-condensed table-bordered table-hover">
                    <tbody>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Module</th>
                        @foreach($roles['columns'] as $column)
                            <th class="text-center">{{ ucfirst($column) }}</th>
                        @endforeach
                    </tr>
                    @php $i = 1; @endphp
                    @foreach($roles['modules'] as $module => $perms)
                        <tr>
                            <td class="text-center">{{ $i++ }}.</td>
                            <td>{{ ucfirst($module) }}</td>
                            @foreach($roles['columns'] as $column)
                                <td class="text-center">
                                    @isset($node->perms[$module . '.' . $column])
                                        <span class="text-green" style="font-size:18px;color:#1dc9b7"><i class="fa fa-check-circle"></i></span>
                                    @elseif(isset($perms[$column]))
                                        <span style="font-size:18px;color:#dc4e41"><i class="fa fa-times-circle"></i></span>
                                    @else
                                        <span class="text-gray" style="font-size:18px;color:dimgrey"><i class="fa fa-minus-circle"></i></span>
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="tab-pane" id="password" role="tabpanel">
                <form id="password-form" action="{{ route('admin.password', $node->id) }}#tab-password" method="POST">
                    @csrf
                    <div class="panel infolist">
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="id" class="col-xs-2 col-md-2 col-lg-2">{{ __('backend::messages.password') }}:</label>
                                <div class="col-xs-10 col-md-6 col-lg-4 fvalue">
                                    <input class="form-control" placeholder="{{ __('backend::messages.password') }}" name="password" type="password" value="" data-rule-minlength="6" data-rule-maxlength="250" required="1" aria-required="true" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-xs-2 col-md-2 col-lg-2">{{ __('backend::messages.password_confirm') }}:</label>
                                <div class="col-xs-10 col-md-6 col-lg-4 fvalue">
                                    <input class="form-control" placeholder="{{ __('backend::messages.password_confirm') }}" name="password_confirmation" type="password" value="" data-rule-minlength="6" data-rule-maxlength="250" required="1" aria-required="true" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary"><span class="fa fa-check-circle"></span>{{ __('backend::messages.update') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

