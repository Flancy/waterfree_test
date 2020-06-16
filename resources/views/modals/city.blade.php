<div class="modal fade" tabindex="-1" role="dialog" id="modal-user-city" aria-labelledby="modal-user-city" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Или выберите из списка нужный город:</p>

                @foreach ($citiesHeader as $city)
                    <a class="btn btn-link" href="{{ route('set_citie', $city->name) }}">
                        {{ $city->name }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>