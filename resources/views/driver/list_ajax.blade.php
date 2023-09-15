<script src="{{ asset('assets/js/pages/datatables.init.js')}}"></script>
<table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
    <thead>
        <tr>
            <th data-ordering="false">Sr.No.</th>
            <th data-ordering="false">Name</th>
            <th data-ordering="false">Conatact</th>
            <th data-ordering="false">Area</th>
            <th data-ordering="false">Vehicle Details</th>
            <th data-ordering="false">RC Details</th>
            <th data-ordering="false">DL Details</th>
            <th data-ordering="false">Aadhar No.</th>
            <th data-ordering="false">PAN</th>
            <th data-ordering="false">Sut. Time</th>
            <th data-ordering="false">Status</th>
            <th data-ordering="false">Created At</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @if (!empty($driver_data))
            @foreach ($driver_data as $key => $value)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $value->admin_table->name ?? '' }}</td>
                    <td>{{ $value->admin_table->contact ?? ''  }}</td>
                    <td>{{ $value->area_type }}</td>
                    <td>{{ $value->vehicle_type }}</td>
                    <td>{{ $value->rc_no }}</td>
                    <td>{{ $value->dl_no }}</td>
                    <td>{{ $value->aadhar }}</td>
                    <td>{{ $value->pan }}</td>
                    <td>{{ $value->suitable_time }}</td>
                    @if ($value->flag == 1)
                        <td>
                            <!-- Custom Switches -->
                            <div class="form-check form-switch form-switch-custom form-switch-primary">
                                <input class="form-check-input" type="checkbox" onclick="action_data('{{$value->id}}','vendor_category','Inactive','vendor_category/list');" role="switch" id="SwitchCheck9" checked >
                            </div>
                        </td>
                    @elseif($value->flag == 0)
                        <td><div class="form-check form-switch form-switch-custom form-switch-primary">
                            <input class="form-check-input" type="checkbox" onclick="action_data('{{$value->id}}','vendor_category','Active','vendor_category/list');" role="switch" id="SwitchCheck9">
                        </div>
                        </td>
                    @endif
                    <td>{{ $value->created_at }}</td>
                    <td>
                        <div class="dropdown d-inline-block">
                            <button class="btn btn-soft-primary btn-sm dropdown" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ri-more-fill align-middle"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a href="#" data-bs-toggle="modal" data-bs-target="#edit" onclick="edit('{{$value->id}}','vendor_category/edit');" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                <li><a href="#" data-bs-toggle="modal" data-bs-target="#edit" onclick="edit('{{$value->id}}','vendor_category/edit');" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                <li>
                                    <a href="#" class="dropdown-item remove-item-btn" onclick="action_data('{{$value->id}}','vendor_category','delete','vendor_category/list');">
                                        <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>

