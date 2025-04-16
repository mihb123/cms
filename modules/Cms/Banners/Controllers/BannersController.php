<?php

namespace Modules\Cms\Banners\Controllers;

use Auth;
use Datatables;
use View;
use App\Http\Requests\Banners\UpdateRequest;
use App\Http\Requests\Banners\CreateRequest;
use App\Repositories\BannersRepository;
use Illuminate\Http\Request;

class BannersController extends Controller
{
    protected $bannersRepository;

    public function __construct(
        BannersRepository $bannersRepository
    ) {
        $this->bannersRepository = $bannersRepository;
    }

    public function index()
    {
        return view('banners::index');
    }

    public function create()
    {
        return view('banners::create');
    }

    public function store(CreateRequest $request)
    {
        $result = $this->bannersRepository->create($request);
        if ($result) {
            return redirect()->route('banners.edit', [$result->id])->with('success', __('banners::messages.success'));
        }
        return redirect()->back()->withErrors(__('banners::messages.failed'));
    }

    public function edit($id)
    {
        $data = $this->bannersRepository->find($id);
        
        return view('banners::edit', compact('data'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $result = $this->bannersRepository->update($request, $id);
        if ($result) {
            return redirect()->back()->with('success', __('banners::messages.success_edit'));
        }
        return redirect()->back()->withErrors(__('banners::messages.failed_edit'));
    }

    public function destroy($id)
    {
        return $this->bannersRepository->destroy($id);
    }

    public function ajax(Request $request)
    {
        return $this->bannersRepository->getAjax($request);
    }

    public function changeSort(Request $request)
    {
        return $this->bannersRepository->changeSort($request);
    }

    public function displayTop(Request $request)
    {
        return $this->bannersRepository->displayTop($request);
    }
}
