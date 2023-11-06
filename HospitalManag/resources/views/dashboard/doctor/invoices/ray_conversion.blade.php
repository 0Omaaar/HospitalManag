<!-- Modal -->
<div class="modal fade" id="xray_conversion{{$invoice->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Convert To Rays</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('rays.store')}}" method="POST">
                @csrf
                <div class="modal-body">

                    <input type="hidden" name="invoice_id" value="{{$invoice->id}}">
                    <input type="hidden" name="patient_id" value="{{$invoice->patient_id}}">
                    <input type="hidden" name="doctor_id" value="{{$invoice->doctor_id}}">

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description</label>
                        <textarea class="form-control" name="description" rows="6"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Ray Employee</label><br>
                        <select class="form-control" name="ray_employee_id">
                            <option disabled selected>--Choose Ray Employee--</option>
                            @foreach($ray_employees as $ray_employee)
                                <option value="{{$ray_employee->id}}">{{$ray_employee->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Employee Description</label>
                        <textarea class="form-control" name="description_employee" rows="3"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
