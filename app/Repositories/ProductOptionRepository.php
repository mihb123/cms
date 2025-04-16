<?php

namespace App\Repositories;

use App\Helpers\CommonHelper;
use App\Models\ProductOption;
use App\Models\Tag;
use Datatables;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductOptionRepository
{
    protected $model;

    const PUBLIC = 1;

    public function __construct(ProductOption $model)
    {
        $this->model = $model;
    }

    public function getAll($option = [])
    {
        $data = $this->model::query();
        if (isset($option['status'])) {
            $data = $data->where('status', intval($option['status']));
        }
        if (isset($option['id'])) {
            $data = $data->where('id', $option['id']);
        }

        return $data = $data->get();
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create($request)
    {
        $request = $request->except(['_token', '_method']);
        return $this->model->create($request);
    }

    public function update($request, $id)
    {
        $request = $request->except(['_token', '_method']);
        try {
            $result = $this->model->where('id', $id)->update($request);
            DB::commit();
            if ($result) {
                return redirect()->back()->with('success', __('product::messages.success'));
            }
            
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(__('product::messages.failed'));
        }
    }

    public function destroy($id)
    {
        $result = $this->model->findOrFail($id);
        return $result->delete();
    }

    public function getAjax($request)
    {
        $queryCate = $this->model::query();
        return Datatables::eloquent($queryCate)
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
            ->editColumn('company', function (ProductOption $node) {
                return $node->company->name;
            })
            ->editColumn('product', function (ProductOption $node) {
                return $node->product->title;
            })
            ->editColumn('category', function (ProductOption $node) {
                return $node->category->title;
            })
            ->editColumn('content', function (ProductOption $node) {
                return $node->content;
            })
            ->editColumn('created_at', function (ProductOption $node) {
                return $node->created_at;
            })
            ->addColumn('action', function (ProductOption $node) {
                return self::getMarkupAction($node, 'product-option');
            })
            ->rawColumns(['company', 'product', 'category', 'content', 'created_at', 'action'])
            ->only(['id', 'company', 'product', 'category', 'content', 'created_at', 'action'])
            ->toJson();
    }

    public function getMarkupAction($data, $module)
    {
        $htmlFrom = '<div class="d-flex justify-content-center">
                        <a href="' . route($module . '.edit', $data->id) . '" class="btn btn-warning btn-sm mr-2">
                          <i class="fas fa-pencil-alt text-light"></i>
                        </a>
                        <form action="' . route($module . '.destroy',
                $data->id) . '" id="form-delete-' . $data->id . '">';
        $htmlFrom .= csrf_field();
        $htmlFrom .= '<a href="javascript:;" data-id="' . $data->id . '" class="btn btn-google btn-sm delete-action">
                                <i class="fas fa-trash"></i>
                              </a>
                        </form>
                    </div>';

        return $htmlFrom;
    }

}
