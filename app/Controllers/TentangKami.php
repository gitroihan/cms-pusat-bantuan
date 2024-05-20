<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HeadertentangkamiModel;
use App\Models\TentangkamiModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class TentangKami extends BaseController
{
    public function tentang_kami()
    {
        $session = session();
        $userId = $session->get('user_id');

        $model = new UserModel();
        $data['data'] = $model->getUserById($userId);

        helper(['form']);
        $about = new TentangkamiModel();
        $headabout = new HeadertentangkamiModel();
        $data['tentang'] = $about->findAll();
        $data['head'] = $headabout->findAll();
        return view('CMS/tentang_kami', $data);
    }
    public function ubahheadtentangkami()
    {
        $head = new HeadertentangkamiModel();

        $image = $this->request->getFile('gambar');
        $newName = $image->getClientName();
        $path = 'defalut.jpg';
        if ($image->isValid() && !$image->hasMoved()) {
            $newName = $image->getClientName();
            $image->move(ROOTPATH . 'public/uploads', $newName);

            $path =  $newName;
        }
        $id = $this->request->getPost('id');
        $head->save([
            'id' => $id,
            'judul_banner' => $this->request->getPost('judul_banner'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'gambar' => $path
        ]);
        return redirect()->back();
        // return $this->response->setJSON(['status' => true]);
    }

    public function tambahtentangkami()
    {
        $aboutus = new TentangkamiModel();

        $aboutus->save([
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ]);
        return redirect()->back();
    }

    public function ubahtentangkami()
    {
        $aboutus = new TentangkamiModel();
        $id = $this->request->getPost('id');
        $data=[
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ];
        $aboutus->update($id, $data);
        return redirect()->back();
    }

    public function hapustentangkami()
    {
        $id = $this->request->getPost('id');
        $aboutus = new TentangkamiModel();
        $delete = $aboutus->where('id', $id)->delete();
        return redirect()->back();

    }
}
