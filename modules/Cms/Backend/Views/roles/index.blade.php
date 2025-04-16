@extends('backend::layout')
@section('title', 'Roles')
@section('description', 'Roles management')
@section('content')
    <!-- Show datatable -->
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon-user-add"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    @lang('backend::messages.roles')
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        @can('role.create')
                            <span class="headerElems">
                                 <button class="btn btn-success btn-sm pull-right" data-toggle="modal"
                                         data-target="#AddModal">{{ __('backend::messages.add_role') }}</button>
                             </span>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            <table class="table table-striped- table-bordered table-hover table-checkable" id="example">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{ __('backend::messages.name') }}</th>
                    <th>{{ __('backend::messages.description') }}</th>
                    <th>{{ __('backend::messages.level') }}</th>
                    <th>{{ __('backend::messages.status') }}</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $results as $k => $item )
                    <tr>
                        <td class="text-center">{{ $k + 1 }}.</td>
                        <td>
                            <a href="{{ route('roles.show', $item->id) }}">{{ $item->name }}</a>
                        </td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->level }}</td>
                        <td>
                            @if($item->status == 1)
                                <span class="btn btn-outline-success">Enable</span>
                            @else
                                <span class="btn btn-outline-warning">Disable</span>
                            @endif
                        </td>

                        <td>
                            @can('role.update')
                                <a href="{{ route('roles.edit', $item->id) }}#tab-access" class="btn btn-warning btn-xs"
                                   style="display:inline;padding:5px 10px 5px 10px;margin-right:5px;"><i
                                        style="padding-right: 0px; color: #fff" class="fa fa-pencil-alt"></i></a>
                            @endcan

                            @can('role.delete')
                                <button style="display:inline;padding:5px 10px 5px 10px;margin-right:5px;"
                                        class="btn btn-google btn-xs" data-toggle="modal"
                                        data-target="#DeleteModal"><i style="padding-right: 0px; color: #fff"
                                                                      class="fa fa-trash-alt"></i></button>
                                <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <form method="POST" action="{{ route('roles.destroy', $item->id) }}"
                                          accept-charset="UTF-8" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="btn-xs modal-header"
                                                     style="background-color: #dc4e41">
                                                    <h1 class="modal-title" style="color: whitesmoke"
                                                        id="exampleModalLabel"><i
                                                            class="fa fa-exclamation-triangle"></i> CẢNH BÁO
                                                    </h1>
                                                    <button type="button" class="close"
                                                            data-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <p class="text-center" style="color: #dc4e41">Bạn có chắc
                                                        chắn muốn xoá không?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close
                                                    </button>
                                                    <button type="submit" name=""
                                                            class="btn btn-google btn-xs"> {{__('backend::messages.confirm_yes')}}  </button>

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <!-- End: Show datatable -->

    @can('role.create')
        <!-- Show create form modal -->
        <div class="modal fade" id="AddModal" role="dialog" aria-labelledby="configModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="btn-xs modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('backend::messages.add_role') }} </h5>
                        <button type="button" class="close" data-dismiss="modal"></button>
                    </div>
                    <form action="{{ route('roles.store') }}" method="POST" id="node-add-form" novalidate="novalidate"
                          accept-charset="UTF-8">
                        @csrf
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="roles">roles* :</label>
                                    <input class="form-control" placeholder="" data-rule-maxlength="250" required="1"
                                           name="roles" type="text" value="" aria-required="true">
                                </div>
                                <div class="form-group">
                                    <label for="name">{{ __('backend::messages.name') }}* :</label>
                                    <input class="form-control" placeholder="{{ __('backend::messages.name') }}"
                                           data-rule-maxlength="250" required="1" name="name" type="text" value=""
                                           aria-required="true">
                                </div>
                                <div class="form-group">
                                    <label for="description">{{ __('backend::messages.description') }}* :</label>
                                    <textarea class="form-control"
                                              placeholder="{{ __('backend::messages.description') }}"
                                              data-rule-maxlength="1000" cols="30" rows="3" name="description"
                                              required="1" aria-required="true"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="level">{{ __('backend::messages.level') }} :</label>
                                    <input class="form-control" placeholder="{{ __('backend::messages.level') }}"
                                           data-rule-maxlength="3" required="1" name="level" type="number" value=""
                                           aria-required="true">
                                </div>
                                <div class="form-group">
                                    <label for="description">{{ __('backend::messages.status') }} :</label>
                                    <select class="form-control" required="1" data-placeholder="Select status"
                                            rel="select2" name="status">
                                        <option value="0">{{ __('backend::messages.active') }}</option>
                                        <option value="1"
                                                selected="selected">{{ __('backend::messages.unactive') }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default"
                                    data-dismiss="modal">{{ __('backend::messages.cancel') }}</button>
                            <input class="btn btn-success" type="submit" value="{{ __('backend::messages.save') }}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End: Show create form modal -->
    @endcan

@endsection

@push('scripts')

    <script>
        /**
         * DataTable handle
         * @file config/index
         */
        $(function () {
            $("#example").DataTable({
                processing: false,
                serverSide: false, // Disable server request data

                language: {
                    lengthMenu: "_MENU_",
                    search: "_INPUT_",
                    searchPlaceholder: "Tìm kiếm"
                },
                columnDefs: [{orderable: false, targets: [-1]}],
            });

            $("#node-add-form").validate({});
        });
    </script>
@endpush
