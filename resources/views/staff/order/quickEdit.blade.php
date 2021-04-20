
    <div class="modal-dialog modal-lg">
        <form action="">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white">Edit Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body col-md-8 offset-1">
                    <div class="form-group row">
                        <label for="order_status" class="col-sm-3 col-form-label">Order Status</label>
                        <div class="col-sm-9">
                            <select name="order_status" class="form-control" id="order_status">
                                @foreach(Status() as $key=>$value)
                                    <option value="{{ $value }}">{{ ucwords($value) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="order_status" class="col-sm-3 col-form-label">Payment Status</label>
                        <div class="col-sm-9">
                            <select name="order_status" class="form-control" id="order_status">
                                <option value="{{ $value }}">{{ ucwords($value) }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
