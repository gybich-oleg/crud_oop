<div class="container-fluid p-5 bg-primary text-white text-center">
    <h1>Users</h1>
    <p>Enter User</p>
</div>

<form method="post" action="?controller=users&action=store" class="container mt-5">
    <div class="mb-3 mt-3">
        <label for="first_name" class="form-label">First Name</label>
        <input type="text" id="first_name" name="first_name" placeholder="First Name" class="form-control">
    </div>
    <div class="mb-3 mt-3">
        <label for="last_name" class="form-label">Last Name</label>
        <input type="text" id="last_name" name="last_name" placeholder="Last Name" class="form-control">
    </div>
    <div class="mb-3 mt-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" name="email" placeholder="Email" class="form-control">
    </div>
    <div class="mt-3">
        <button type="submit" class="btn btn-primary">Add</button>
    </div>
</form>
<div class="text-center mt-3">
    <a href="?controller=users&action=list" class="btn btn-primary">Users List</a>
</div>