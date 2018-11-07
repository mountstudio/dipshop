<div class="modal fade" id="activate-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Активация пользователя</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">
                    @csrf
                    <div class="form-group">
                        <label for="percent">Процент</label>
                        <input type="text" class="form-control" name="percent" id="percent" value="0" required>
                    </div>
                    <button type="submit">Активировать</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
            </div>
        </div>
    </div>
</div>