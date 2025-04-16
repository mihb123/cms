@extends('backend::layout')

@section('title', 'Role edit')
@section('description', 'Role edit')
@section('content:class', 'no-padding')

@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__body">
            <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-2x nav-tabs-line-success" role="tablist">
                <li class="nav-item active"><a class="nav-link active" role="tab" data-toggle="tab"  href="#tab-general-info" data-target="#tab-info"><i class="flaticon-information"></i>Thông tin</a></li>
                <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-access" data-target="#tab-access"><i class="flaticon-safe-shield-protection"></i> Quyền truy cập</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="tab-info">
                <div class="tab-content">
                    <form action="{{ route('roles.update', $result->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row form-group">
                            <label for="id" class="col-md-2">Role :</label>
                            <div class="col-md-6 fvalue">{{ $result->roles }}</div>
                        </div>
                        <div class=" row form-group">
                            <label for="name" class="col-md-2">{{ __('backend::messages.name') }} :</label>
                            <div class="col-md-6 fvalue">
                                <input class="form-control" placeholder="Enter role name" data-rule-maxlength="250" required="1" name="name" type="text" value="{{ $result->name }}" aria-required="true">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="description" class="col-md-2">{{ __('backend::messages.description') }} :</label>
                            <div class="col-md-6 fvalue">
                                <textarea class="form-control" style="height:150px" name="description" placeholder="Enter role description">{{ $result->description }}</textarea>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label for="level" class="col-md-2">{{ __('backend::messages.level') }} :</label>
                            <div class="col-md-6 fvalue">
                                <input class="form-control" placeholder="Enter role level" data-rule-maxlength="3" required="1" name="level" type="number" value="{{ $result->level }}" aria-required="true">
                            </div>
                        </div>

                        <div class="row form-group">
                            <label for="status" class="col-md-2">{{ __('backend::messages.status') }} :</label>
                            <div class="col-md-6 fvalue">
                                {!! Form::select('status', ['0' => 'Disable', '1' => 'Enable'], $result->status, ['class' => 'form-control', 'rel' => 'select2']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="updated" class="col-md-2"></label>
                            <div class="col-md-6 fvalue">
                                <button type="submit" class="btn btn-primary" style="margin-right: 10px;">{{ __('backend::messages.save') }}</button>
                                <a href="{{ route('roles.index') }}" class="btn btn-warning">{{ __('backend::messages.cancel') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade in bg-white" id="tab-access">
                <div class="tab-content">
                    <div class="panel infolist">
                        <div class="panel-default panel-heading">
                            <h4>Permissions</h4>
                        </div>
                        <div class="panel-body">
                            <!-- Show save errors message -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="box-body no-padding">
                                <form action="{{ route('roles.update', $result->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <table class="table table-roles table-condensed table-bordered table-hover">
                                        <tbody>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>
                                                    <input type="checkbox" class="perm-event" data-target=".table-roles .perms-module">&nbsp;
                                                    Module
                                                </th>
                                                @foreach($roles['columns'] as $column)
                                                    <th class="text-center">
                                                        <input type="checkbox" class="perm-event perm-column" data-target=".table-roles .module-perm-{{ $column }} input">&nbsp;
                                                        {{ ucfirst($column) }}
                                                    </th>
                                                @endforeach
                                            </tr>
                                            @php $i = 1; @endphp
                                            @foreach($roles['modules'] as $module => $perms)
                                            <tr>
                                                <td class="text-center">{{ $i++ }}.</td>
                                                <td>
                                                    <input type="checkbox" class="perm-event perms-module perms-{{ $module }}" data-target=".table-roles .module-{{ $module }} input">&nbsp;
                                                    {{ ucfirst($module) }}
                                                </td>
                                                @foreach($roles['columns'] as $column)
                                                <td class="module-{{ $module }} module-perm-{{ $column }} text-center">
                                                    @isset($roles['modules'][$module][$column])
                                                        {!! Form::checkbox("perms[$module][$column]", 1, isset($result->modules[$module][$column])) !!}
                                                    @else
                                                        <span class="text-gray" style="font-size:18px;"><i class="icon ion-minus-circled"></i></span>
                                                    @end
                                                </td>
                                                @endforeach
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="form-group">
                                        <div class="col-md-6 fvalue" style="margin-left: -15px;">
                                            <button type="submit" class="btn btn-primary" style="margin-right: 10px;">Save</button>
                                            <a href="{{ route('roles.index') }}" class="btn btn-warning">Back</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
    $(function () {
        $('.perm-event').change(function() {
            var target = $(this).data('target');
            var status = $(this).prop('checked');
            $(target).prop('checked', status).trigger('change');
            if (target.indexOf('perms-module') > 0) {
                $('.table-roles .perm-column').prop('checked', status)
            }
        });
    });
    </script>
@endpush
