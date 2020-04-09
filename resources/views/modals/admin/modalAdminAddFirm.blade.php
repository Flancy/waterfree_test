<div class="modal fade" id="modalAdminAddFirm" tabindex="-1" role="dialog" aria-labelledby="modalAdminAddFirmLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Добавление фирмы</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('admin.firms.store') }}" class="modal-body" enctype="multipart/form-data">
                <div class="form-row">
                    @csrf
                    <div class="form-group col-md-12">
                        <input type="text" name="name" placeholder="Введите название фирмы" class="form-control">
                    </div>
                    <div class="form-group col-md-12">
                        <div class="custom-file" id="logoFirm" lang="ru">
                            <input type="file" name="logo" class="custom-file-input" id="logoInputFirm" aria-describedby="fileHelp">
                            <label class="custom-file-label" for="logoInputFirm">
                               Выберите логотип...
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-success">Добавить фирму</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>