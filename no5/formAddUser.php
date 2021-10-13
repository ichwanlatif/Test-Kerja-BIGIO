<div class="container border mt-5" style="max-width:700px">
    <h1 class="text-center mt-2">ADD USER</h1>
    <form class="inner-login" action="addUser.php" method="post">
    <div class="form-group mt-2">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username">
    </div>
    <div class="form-group mt-2">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password">
    </div>
    <div class="form-group mt-2">
        <label for="nama">Nama User</label>
        <input type="text" name="nama" class="form-control">
    </div>
    <div class="form-group mt-2">
        <label for="nomor_induk">NIS/NIP User</label>
        <input type="text" name="nomor_induk" class="form-control">
    </div>
    <div class="form-group mt-2">
        <label for="role">Role</label>
        <select class="form-select" name="role" name="role">
            <option selected value="2">Guru</option>
            <option value="3">Siswa</option>
        </select>
    </div>
    <button value="submit" type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</div>