<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<!-- Tombol Tambah User -->
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">Daftar Pengguna</h4>
    <a href="<?= base_url('users/create') ?>" class="btn btn-primary">+ Tambah User</a>
</div>

<!-- Tabel Pengguna -->
<div class="table-responsive shadow-sm rounded">
    <table class="table table-striped table-hover align-middle mb-0">
        <thead class="table-primary">
            <tr>
                <th scope="col" style="width: 5%;">#</th>
                <th scope="col">Username</th>
                <th scope="col">Role</th>
                <th scope="col" style="width: 20%;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users)): ?>
                <?php foreach ($users as $index => $user): ?>
                    <tr>
                        <th scope="row"><?= $index + 1 ?></th>
                        <td><?= esc($user['username']) ?></td>
                        <td><?= ucfirst(esc($user['role'])) ?></td>
                        <td>
                            <a href="<?= base_url('users/edit/' . esc($user['username'])) ?>" class="btn btn-sm btn-warning me-1">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <a href="<?= base_url('users/delete/' . esc($user['username'])) ?>" 
                               class="btn btn-sm btn-danger"
                               onclick="return confirm('Yakin ingin menghapus user ini?')">
                                <i class="bi bi-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center text-muted">Belum ada data pengguna.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
