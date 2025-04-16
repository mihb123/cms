<?php
namespace App\Services;

use Illuminate\Support\Str;
use App\Repositories\AdminRepository;
use Modules\Cms\Media\Models\Media;

class AdminService
{
    protected $adminRepository;

    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function find($id)
    {
        return $this->adminRepository->find($id);
    }

    public function detail($id)
    {
        return $this->adminRepository->detail($id);
    }

    public function create($request)
    {
        $attributes = [
            'roles' => $request['roles'] ?? [],
            'password' => bcrypt($request['password']),
            'remember' => Str::random(60),
            'status' => intval($request['status']),
            'location' => $request['location'],
            'name' => $request['name'],
            'email' => $request['email'],
            'mobile' => $request['mobile'],
        ];

        if ($request->input('avatar')) {
            $avatar = Media::firstOrNew(['id' => $request['avatar']], []);
            $attributes['avatar'] = $avatar->getEmbedded()->toarray();
        } else {
            unset($attributes['avatar']);
        }

        return $this->adminRepository->create($attributes);
    }

    public function update($request, $admin)
    {
        $attributes = [
            'roles' => $request['roles'] ?? [],
            'password' => $admin['password'],
            'remember' => Str::random(60),
            'status' => intval($request['status']),
            'location' => $request['location'],
            'name' => $request['name'],
            'email' => $request['email'],
            'mobile' => $request['mobile'],
        ];
        if ($request['avatar']) {
            $avatar = Media::firstOrNew(['id' => $request['avatar']], []);
            $attributes['avatar'] = $avatar->getEmbedded()->toarray();
        } else {
            unset($attributes['avatar']);
        }

        return $this->adminRepository->update($admin, $attributes, $request);
    }

    public function updatePassword($request, $id)
    {
        $admin = $this->find($id);
        $attributes = [
            'password' => bcrypt($request['password']),
            //更新時に例外発生する不具合（該当テーブルに無い項目）への対応 (@ edited by a.u  2024.12.20)
            //'remember' => Str::random(60),
        ];

        return $this->adminRepository->update($admin, $attributes, $request);
    }

    public function getAjax($request)
    {
        return $this->adminRepository->getAjax($request);
    }

}
