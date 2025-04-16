<?php

namespace Modules\Cms\KeyWords\Controllers;

use Auth;
use Datatables;
use View;
use App\Http\Requests\KeyWords\UpdateRequest;
use App\Http\Requests\KeyWords\CreateRequest;
use App\Repositories\KeyWordsRepository;
use Illuminate\Http\Request;

class KeyWordsController extends Controller
{
    protected $keyWordsRepository;

    public function __construct(
        KeyWordsRepository $keyWordsRepository
    ) {
        $this->keyWordsRepository = $keyWordsRepository;
    }

    public function index()
    {
        return view('key-words::index');
    }

    public function create()
    {
        return view('key-words::create');
    }

    public function store(CreateRequest $request)
    {
        $result = $this->keyWordsRepository->create($request);
        if ($result) {
            return redirect()->route('key-words.edit', [$result->id]);
        }
        return redirect()->back()->withErrors(__('key-words::messages.failed'));
    }

    public function edit($id)
    {
        $data = $this->keyWordsRepository->find($id);

        return view('key-words::edit', compact('data'));
    }

    public function update(UpdateRequest $request, $id)
    {

        $result = $this->keyWordsRepository->update($request, $id);
        if ($result) {
            return redirect()->route('key-words.index');
        }
        return redirect()->back()->withErrors(__('key-words::messages.failed_edit'));
    }

    public function destroy($id)
    {
        return $this->keyWordsRepository->destroy($id);
    }

    public function ajax(Request $request)
    {
        return $this->keyWordsRepository->getAjax($request);
    }

    public function changeSort(Request $request)
    {
        return $this->keyWordsRepository->changeSort($request);
    }

    public function displayTop(Request $request)
    {
        return $this->keyWordsRepository->displayTop($request);
    }
}
