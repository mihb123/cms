<?php

namespace App\Repositories;

use Datatables;
use App\Helpers\CommonHelper;
use App\Models\FamilyMember;
use Illuminate\Support\Str;

class FamilyMemberRepository
{
    protected $model;

    public function __construct(FamilyMember $model)
    {
        $this->model = $model;
    }

    public function getAll($option = [])
    {
        $data = $this->model::query();

        if (isset($option['id'])) {
            $data = $data->where('id', $option['id']);
        }

        return $data = $data->get();
    }

    public function getDetail($option = [])
    {
        $data = $this->model::query();

        if (isset($option['id'])) {
            $data = $data->where('id', $option['id']);
        }
        if (isset($option['name'])) {
            $data = $data->where('name', $option['name']);
        }
        return $data = $data->first();
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function update($data, $id)
    {
        return  $this->model->updateOrCreate(['id' => $id], $data);
    }

    public function destroy($id)
    {
        $result = $this->model->findOrFail($id);

        return $result->delete();
    }


    public function getAjax($query)
    {

        $queryAdmin = FamilyMember::query();
        return Datatables::eloquent($queryAdmin)
            ->filter(function ($query) {

                if ($search = request()->input('search.value')) {
                    $field = 'name';
                    $operator = 'like';

                    if (Str::contains($search, ':')) {
                        list($field, $search) = explode(':', $search);
                    }
                    if (!empty($field)) {
                        if ($field == 'id') {
                            $field = 'id';
                            $operator = '=';
                        } else {
                            $search = '%' . $search . '%';
                        }
                        $field = trim($field);
                        $search = trim($search);
                        $query->where($field, $operator, $search);
                    }
                }
            })
            ->editColumn('name', function (FamilyMember $node) {
                return  $node->name;
            })

            ->editColumn('gender', function (FamilyMember $node) {
                return  getGender()[$node->gender];
            })

            ->editColumn('created_at', function (FamilyMember $node) {
                return $node->created_at;
            })

            ->addColumn('action', function (FamilyMember $node) {
                return self::getMarkupAction($node, 'family-member');
            })

            ->rawColumns(['name', 'gender', 'created_at', 'action'])
            ->only(['id', 'name', 'gender', 'created_at', 'action'])
            ->toJson();
    }

    public function getMarkupAction($data, $module)
    {
        $htmlFrom = '<div class="d-flex justify-content-center">
                        <a href="' . route($module . '.edit',  $data->id) . '" class="btn btn-warning btn-sm mr-2">
                          <i class="fas fa-pencil-alt text-light"></i>
                        </a>
                        <form action="' . route($module . '.destroy', $data->id) . '" id="form-delete-' . $data->id . '">';
        $htmlFrom .=          csrf_field();
        $htmlFrom .=          '<a href="javascript:;" data-id="' . $data->id . '" class="btn btn-google btn-sm delete-action">
                                <i class="fas fa-trash"></i>
                              </a>
                        </form>
                    </div>';

        return $htmlFrom;
    }
}
