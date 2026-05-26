<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\MemberModel;
use App\Models\BookModel;
use App\Models\PeminjamanModel;
use App\Models\PengembalianModel;

class PengembalianController extends BaseController
{
    public function index()
    {
        //
        $data['title'] = 'Daftar Pengembalian Buku';

        return view('pengembalian/index', $data);
    }
    
    public function ajaxTable()
    {
        $pengembalianModel = new PengembalianModel();
        $data['pengembalian'] = $pengembalianModel->select('pengembalian.*, peminjaman.tgl_pinjam, peminjaman.tgl_harus_kembali, members.name_member, books.title_book')
            ->join('peminjaman', 'pengembalian.id_peminjaman = peminjaman.id_peminjaman')
            ->join('members', 'peminjaman.id_member = members.id_member')
            ->join('books', 'peminjaman.id_book = books.id_book')
            ->findAll();

        return view('pengembalian/_table', $data);
    }
    
    public function ajaxCreate() 
    {
        $data['list_peminjaman'] = (new PeminjamanModel())->select('peminjaman.*, members.name_member, books.title_book')
            ->join('members', 'peminjaman.id_member = members.id_member')
            ->join('books', 'peminjaman.id_book = books.id_book')
            ->findAll();

        return view('pengembalian/_create', $data);
    }

    public function ajaxEdit($id)
    {
        $pengembalianModel = new PengembalianModel();
        $data['list_peminjaman'] = (new PeminjamanModel())->select('peminjaman.*, members.name_member, books.title_book')
            ->join('members', 'peminjaman.id_member = members.id_member')
            ->join('books', 'peminjaman.id_book = books.id_book')
            ->findAll();
        $data['detail_pengembalian'] = $pengembalianModel->select('pengembalian.*, peminjaman.tgl_pinjam, peminjaman.tgl_harus_kembali, members.name_member, books.title_book')
            ->join('peminjaman', 'pengembalian.id_peminjaman = peminjaman.id_peminjaman')
            ->join('members', 'peminjaman.id_member = members.id_member')
            ->join('books', 'peminjaman.id_book = books.id_book')
            ->where('pengembalian.id_pengembalian', $id)
            ->first();
        $data['id'] = $id;
        return view('pengembalian/_edit', $data);
    }

    public function store()
    {
        if($this->request->isAJAX()) {
            $id_peminjaman = $this->request->getPost('id_peminjaman');
            $tgl_kembali = $this->request->getPost('tgl_kembali');
            $denda = $this->request->getPost('denda');

            $pengembalianModel = new PengembalianModel();
            $isSaved = $pengembalianModel->save([
                'id_peminjaman' => $id_peminjaman,
                'tgl_kembali' => $tgl_kembali,
                'denda' => $denda,
            ]);

            if($isSaved) {
                return $this->response->setJSON(['status' => 'success', 'code' => 200, 'message' => 'Pengembalian berhasil disimpan!']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'code' => 500, 'message' => 'Gagal menyimpan pengembalian. Silakan coba lagi.']);
            }
        }

        return redirect()->to('/list/pengembalian');
    }

    public function update()
    {
        if($this->request->isAJAX()) {
            $id = $this->request->getPost('id');
            $id_peminjaman = $this->request->getPost('id_peminjaman');
            $tgl_kembali = $this->request->getPost('tgl_kembali');
            $denda = $this->request->getPost('denda');

            $pengembalianModel = new PengembalianModel();
            $detailPengembalian = [
                'id_peminjaman' => $id_peminjaman,
                'tgl_kembali' => $tgl_kembali,
                'denda' => $denda,
            ];
            $isUpdated = $pengembalianModel->update($id, $detailPengembalian);

            if($isUpdated) {
                return $this->response->setJSON(['status' => 'success', 'code' => 200, 'message' => 'Pengembalian berhasil diperbarui!']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'code' => 500, 'message' => 'Gagal memperbarui pengembalian. Silakan coba lagi.']);
            }
        }

        return redirect()->to('/list/pengembalian');
    }
    
    public function delete($id)
    {
        if($this->request->isAJAX()) 
        {
            $pengembalianModel = new PengembalianModel();
            $isDeleted = $pengembalianModel->delete($id);
            
            if($isDeleted) {
                return $this->response->setJSON(['status' => 'success', 'code' => 200, 'message' => 'Pengembalian berhasil dihapus!']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'code' => 500, 'message' => 'Gagal menghapus pengembalian. Silakan coba lagi.']);
            }
        }
        return redirect()->to('/list/pengembalian');
    }
}
