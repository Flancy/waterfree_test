<div class="modal fade" id="modalAdminDeleteUser" tabindex="-1" role="dialog" aria-labelledby="modalAdminDeleteUserLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Вы уверены, что хотите удалить пользователя <br> <b class="nameUser"></b>?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="#" class="modal-footer justify-content-center">
                @method('DELETE')
                @csrf
                <button type="button" class="btn btn-danger" data-dismiss="modal">Нет</button>
                <button type="submit" class="btn btn-success">Да</button>
            </form>
        </div>
    </div>
</div>