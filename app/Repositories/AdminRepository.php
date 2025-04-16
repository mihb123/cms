<?php
namespace App\Repositories;

use App\Models\Admin;
use Datatables;
use App\Helpers\CommonHelper;
use Illuminate\Support\Str;

class AdminRepository
{
    protected $model;

    public function __construct (Admin $model)
    {
        $this->model = $model;
    }

    public function getDetail($option = [])
    {
        $data = $this->model::query();
        if (isset($option['status'])) {
            $data = $data->where('status', intval($option['status']));
        }
        if (isset($option['id'])) {
            $data = $data->where('id', $option['id']);
        }
        if (isset($option['email'])) {
            $data = $data->where('email', $option['email']);
        }
        return $data = $data->first();
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create($request)
    {
        return $this->model->create($request);
    }

    public function update($admin,$attributes)
    {
        return $this->model->updateOrCreate(['id' => $admin['id']], $attributes);
    }

    public function delete($id)
    {
        $result = $this->find($id);
        if (empty($result)) {
            return false;
        }
        return $result->delete();
    }

    public function getAjax($query) {
        $queryAdmin = Admin::query();
        return Datatables::eloquent($queryAdmin)
            ->filter(function ($query) {
                if (request()->input('type')) {
                    $query->where('roles', 'all', [request()->input('type')]);
                }
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
            ->editColumn('name', function(Admin $node) {
                return '<a class="" href="' . route('admin.show', $node->id) . '">' . $node->name . '</a>';
            })
            ->editColumn('roles', function(Admin $node) {
                $roles = $node->roles;
                sort($roles);
                $text = implode(',', $roles);
                $search = request()->input('type');
                if ($search) {
                    $text = str_replace($search, '<strong class="text-red">' . $search . '</strong>', $text);
                }
                return $text;
            })
            ->editColumn('status', function(Admin $node) {
                return CommonHelper::getMarkupStatus($node, 'backend');
            })
            ->addColumn('action', function(Admin $node) {
                return CommonHelper::getMarkupAction($node, 'admin');
            })
            ->rawColumns(['name', 'roles', 'status', 'action'])
            ->only(['id', 'name', 'email', 'roles', 'status', 'action'])
            ->toJson();
    }
}
