<h2>Edit User</h2>
<form method="post" action="?controller=users&action=update">
    <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>">
    <div class="mb-3">
        <label>First Name</label>
        <input type="text" name="first_name" class="form-control" value="<?= htmlspecialchars($user['first_name']) ?>" required>
    </div>
    <div class="mb-3">
        <label>Last Name</label>
        <input type="text" name="last_name" class="form-control" value="<?= htmlspecialchars($user['last_name']) ?>" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($user['email']) ?>" required>
    </div>
    <button type="submit" class="btn btn-success">Add</button>
    <a href="?controller=users&action=list" class="btn btn-secondary">Cancel</a>
</form>