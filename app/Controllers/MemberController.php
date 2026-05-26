<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\MemberModel;

class MemberController extends BaseController
{
    public function index()
    {
        $data['title'] = 'Daftar Member';

        return view('members/index', $data);
    }
    
    public function ajaxTable()
    {
        $memberModel = new MemberModel();
        $data['members'] = $memberModel->findAll();

        return view('members/_table', $data);
    }

    public function ajaxCreate() 
    {
        return view('members/_create');
    }

    public function store()
    {
        if($this->request->isAJAX()) {
            $name = $this->request->getPost('name_member');
            $email = $this->request->getPost('email_member');
            $contact = $this->request->getPost('contact_member');
            $status = $this->request->getPost('status_member');

            $memberModel = new MemberModel();
            $isSaved = $memberModel->save([
                'name_member' => $name,
                'email_member' => $email,
                'contact_member' => $contact,
                'status_member' => $status,
            ]);

            if($isSaved) {
                return $this->response->setJSON(['status' => 'success', 'code' => 200, 'message' => 'Member berhasil disimpan!']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'code' => 500, 'message' => 'Gagal menyimpan member. Silakan coba lagi.']);
            }
        }

        return redirect()->to('/list/members');
    }
    
    public function ajaxEdit($id)
    {
        $memberModel = new MemberModel();
        $data['detail_member'] = $memberModel->find($id);
        $data['id'] = $id;
        return view('members/_edit', $data);
    }

    public function update()
    {
        if($this->request->isAJAX()) {
            $id = $this->request->getPost('id');
            $name = $this->request->getPost('name_member');
            $email = $this->request->getPost('email_member');
            $contact = $this->request->getPost('contact_member');
            $status = $this->request->getPost('status_member');
            
            $memberModel = new MemberModel();
            $detailMember = [
                'name_member' => $name,
                'email_member' => $email,
                'contact_member' => $contact,
                'status_member' => $status,
            ];
            $isUpdated = $memberModel->update($id, $detailMember);

            if($isUpdated) {
                return $this->response->setJSON(['status' => 'success', 'code' => 200, 'message' => 'Member berhasil diperbarui!']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'code' => 500, 'message' => 'Gagal memperbarui member. Silakan coba lagi.']);
            }
        }

        return redirect()->to('/list/members');
    }
    
    public function delete($id)
    {
        if($this->request->isAJAX()) 
        {
            $memberModel = new MemberModel();
            $isDeleted = $memberModel->delete($id);
            
            if($isDeleted) {
                return $this->response->setJSON(['status' => 'success', 'code' => 200, 'message' => 'Member berhasil dihapus!']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'code' => 500, 'message' => 'Gagal menghapus member. Silakan coba lagi.']);
            }
        }
        return redirect()->to('/list/members');
    }
}
