<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\MemberModel;
use App\Models\BookModel;
use App\Models\PeminjamanModel;

class PeminjamanController extends BaseController
{
    public function index()
    {
        //
        $data['title'] = 'Daftar Peminjaman Buku';

        return view('peminjaman/index', $data);
    }
    
    public function ajaxTable()
    {
        $peminjamanModel = new PeminjamanModel();
        $data['peminjaman'] = $peminjamanModel->select('peminjaman.*, members.name_member, books.title_book')
            ->join('members', 'peminjaman.id_member = members.id_member')
            ->join('books', 'peminjaman.id_book = books.id_book')
            ->findAll();

        return view('peminjaman/_table', $data);
    }

    public function ajaxCreate() 
    {
        $data['list_members'] = (new MemberModel())->findAll();
        $data['list_books'] = (new BookModel())->findAll();

        return view('peminjaman/_create', $data);
    }

    public function ajaxEdit($id)
    {
        $peminjamanModel = new PeminjamanModel();
        $data['list_members'] = (new MemberModel())->findAll();
        $data['list_books'] = (new BookModel())->findAll();
        $data['detail_peminjaman'] = $peminjamanModel->select('peminjaman.*, members.name_member, books.title_book')
            ->join('members', 'peminjaman.id_member = members.id_member')
            ->join('books', 'peminjaman.id_book = books.id_book')
            ->where('peminjaman.id_peminjaman', $id)
            ->first();
        $data['id'] = $id;
        return view('peminjaman/_edit', $data);
    }

    public function store()
    {
        if($this->request->isAJAX()) {
            $member_id = $this->request->getPost('member_id');
            $book_id = $this->request->getPost('book_id');
            $loan_date = $this->request->getPost('loan_date');
            $return_date = $this->request->getPost('return_date');

            $peminjamanModel = new PeminjamanModel();
            $isSaved = $peminjamanModel->save([
                'id_member' => $member_id,
                'id_book' => $book_id,
                'tgl_pinjam' => $loan_date,
                'tgl_harus_kembali' => $return_date,
            ]);

            if($isSaved) {
                return $this->response->setJSON(['status' => 'success', 'code' => 200, 'message' => 'Peminjaman berhasil disimpan!']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'code' => 500, 'message' => 'Gagal menyimpan peminjaman. Silakan coba lagi.']);
            }
        }

        return redirect()->to('/list/peminjaman');
    }

    public function update()
    {
        if($this->request->isAJAX()) {
            $id = $this->request->getPost('id');
            $member_id = $this->request->getPost('member_id');
            $book_id = $this->request->getPost('book_id');
            $loan_date = $this->request->getPost('loan_date');
            $return_date = $this->request->getPost('return_date');

            $peminjamanModel = new PeminjamanModel();
            $detailPeminjaman = [
                'id_member' => $member_id,
                'id_book' => $book_id,
                'tgl_pinjam' => $loan_date,
                'tgl_harus_kembali' => $return_date,
            ];
            $isUpdated = $peminjamanModel->update($id, $detailPeminjaman);

            if($isUpdated) {
                return $this->response->setJSON(['status' => 'success', 'code' => 200, 'message' => 'Peminjaman berhasil diperbarui!']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'code' => 500, 'message' => 'Gagal memperbarui peminjaman. Silakan coba lagi.']);
            }
        }

        return redirect()->to('/list/peminjaman');
    }

    public function delete($id)
    {
        if($this->request->isAJAX()) 
        {
            $peminjamanModel = new PeminjamanModel();
            $isDeleted = $peminjamanModel->delete($id);
            
            if($isDeleted) {
                return $this->response->setJSON(['status' => 'success', 'code' => 200, 'message' => 'Peminjaman berhasil dihapus!']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'code' => 500, 'message' => 'Gagal menghapus peminjaman. Silakan coba lagi.']);
            }
        }
        return redirect()->to('/list/peminjaman');
    }
}
