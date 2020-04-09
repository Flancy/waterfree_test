<div class="modal fade" id="modalAdminAddCity" tabindex="-1" role="dialog" aria-labelledby="modalAdminAddCityLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Добавление города</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('admin.cities.store') }}" class="modal-body">
                <div class="form-row">
                    @csrf
                    <div class="form-group col-md-12">
                        <input type="text" name="name" placeholder="Введите название города" class="form-control">
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-success">Добавить город</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>