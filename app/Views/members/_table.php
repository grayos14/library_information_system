<thead>
    <tr>
        <th width="50">No.</th>
        <th>Nama Member</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
    <?php $no=0; ?>
    <?php foreach($members as $member): ?>
        <?php $no++; ?>
        <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $member['name_member'] ?></td>
            <td><?php echo $member['email_member'] ?></td>
            <td><?php echo $member['contact_member'] ?></td>
            <td><?php echo $member['status_member'] ?></td>
            <td>
                <a href="<?= base_url('ajax/edit/member/' . $member['id_member']) ?>" class="btn btn-info btn-sm editBtn">Edit</a>
                <form action="<?= base_url('delete/member/' . $member['id_member']) ?>" method="post" style="display: inline;">
                    <button type="submit" class="btn btn-danger btn-sm deleteBtn">Hapus</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>