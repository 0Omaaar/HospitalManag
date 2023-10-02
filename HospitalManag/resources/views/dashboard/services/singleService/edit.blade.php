    <!-- Modal -->
    <div class="modal fade" id="edit{{ $service->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Service</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('service.update', 'update') }}" method="post">
                    {{ method_field('patch') }}
                    {{ csrf_field() }}
                    @csrf
                    <div class="modal-body">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="{{ $service->name }}"
                            class="form-control"><br>

                        <input type="hidden" name="id" value="{{ $service->id }}" class="form-control"><br>

                        <label for="price">Price</label>
                        <input type="number" name="price" id="price" value="{{ $service->price }}"
                            class="form-control"><br>

                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="5">{{ $service->description }}</textarea>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="{{ $service->status }}" selected disabled>
                                    {{ $service->status == 1 ? 'Enabled' : 'Not_enabled' }}</option>
                                <option value="1">Enabled</option>
                                <option value="0">Not Enabled</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">Close</button>
                        <button type="submit"
                            class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
