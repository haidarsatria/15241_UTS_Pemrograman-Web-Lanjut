<?php

namespace App\Controllers;
use App\Models\ProductModel; 
class DashboardController extends BaseController
{
    public function __construct()
    {
        helper('form');
        helper('number');
        $this->product = new ProductModel();
    }
    public function index(): string
    {
        return view('v_login');
    }
    public function produk()
    {
        // Mengambil data produk dari model
        $products = $this->product->findAll();

        // Mengirim data produk ke view
        return view('v_home', ['products' => $products]);
    }
    public function userDashboard()
    {
        // Memastikan hanya pengguna yang bisa mengakses halaman ini
        if (session()->get('role') !== 'guest') {
            return redirect()->to('/login');
        }
        // Pengiriman data pengguna (username) ke view
        $userData = [
            'username' => session()->get('username'), // Nama pengguna
            'role' => session()->get('role')          // Role pengguna
        ];
        return view('v_dashboard_user', $userData);
    }

    public function adminDashboard()
    {
        // Memastikan hanya admin yang bisa mengakses halaman ini
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }

        // Ambil data user dari database
       $db = \Config\Database::connect();

        // Hitung jumlah admin
        $adminCount = $db->table('user')->where('role', 'admin')->countAllResults();

        // Hitung jumlah guest
        $guestCount = $db->table('user')->where('role', 'guest')->countAllResults();

        // Hitung total user
        $totalCount = $db->table('user')->countAllResults();


        // Pengiriman data admin (username) dan count ke view
        $adminData = [
            'username' => session()->get('username'),
            'role' => session()->get('role'),
            'adminCount' => $adminCount,
            'guestCount' => $guestCount,
            'totalCount' => $totalCount,
        ];

        return view('v_dashboard_admin', $adminData);
    }



    public function users()
    {
        // Hanya admin yang bisa mengakses halaman pengguna
        if (session()->get('role') !== 'admin') {
            return redirect()->to('dashboard');
        }

        // Mengambil data pengguna dari database
        $db = \Config\Database::connect();
        $users = $db->table('user')->get()->getResultArray();

        // Mengirim data ke view
        return view('v_users', ['users' => $users]);
    }

    public function create()
    {
        return view('v_create_user');  // View untuk form tambah user
    }

    public function store()
    {
        // Ambil data dari form
        $username = $this->request->getPost('username');
        $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        $role = $this->request->getPost('role');

        // Simpan ke database
        $db = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->insert([
            'username' => $username,
            'password' => $password,
            'role' => $role
        ]);

        return redirect()->to('/users');
    }

    // Edit form user
    // Edit form user
    public function edit($username)
    {
        $db = \Config\Database::connect();
        $user = $db->table('user')->where('username', $username)->get()->getRowArray();

        if (!$user) {
            return redirect()->to('/users'); // User tidak ditemukan
        }

        return view('v_edit_user', ['user' => $user]);
    }

    // Update data user
    public function update($username)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('user');

        $data = [
            'username' => $this->request->getPost('username'),
            'role' => $this->request->getPost('role')
        ];

        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $builder->where('username', $username)->update($data);

        return redirect()->to('/users');
    }

    // Hapus user
    public function delete($username)
    {
        $db = \Config\Database::connect();
        $db->table('user')->where('username', $username)->delete();

        return redirect()->to('/users');
    }
}
