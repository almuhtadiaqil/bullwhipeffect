<div id="tambah_user" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dashboard.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group form-line input-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Full Name" required autofocus>
                    </div>
                    <div class="form-group form-line input-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="10" required autofocus>
                    </div>
                    <div class="form-group form-line input-group">
                        <label for="no_hp">Nomor Hp</label>
                        <input type="number" class="form-control" name="no_hp" placeholder="10" required autofocus>
                    </div>
                    <div class="form-group form-line input-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="10" required autofocus>
                    </div>
                    <div class="form-group form-line input-group">
                        <label for="password">password</label>
                        <input type="password" class="form-control" name="password" placeholder="10" required autofocus>
                    </div>
                    <div class="form-group form-line input-group">
                        <label for="role">Role</label>
                        <select name="role" id="" class="form-control">
                            <option value="Distributor">Distributor</option>
                            <option value="Retailer">Retailer</option>
                        </select>
                    </div>
                    <div class="form-group form-line input-group">
                        <div>
                            <label for="foto">Image</label>
                            <input name="foto" class="form-control" type="file">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
