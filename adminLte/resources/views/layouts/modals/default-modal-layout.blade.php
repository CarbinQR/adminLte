<div class="modal fade" id="modal-default-{{ $id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ $title }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route( $routeName, $routeParamsArray) }}" method="POST" id="attach-{{ $id }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Пользователи</label>
                                <select class="select2" multiple="multiple" name="customersIdArray[]" data-placeholder="Select a State" style="width: 100%;">
                                    @foreach($customersList as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->surname }} {{ $customer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                <button type="submit" form="attach-{{ $id }}" class="btn btn-primary">Сохранить</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
