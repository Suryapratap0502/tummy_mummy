<script src="{{ asset('assets/js/pages/datatables.init.js')}}"></script>
<table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
    <thead>
        <tr>
            <th data-ordering="false">Sr.No.</th>
            <th data-ordering="false">Warehouse Type</th>
            <th data-ordering="false">Warehouse Unit</th>
            <th data-ordering="false">Status</th>
            <th data-ordering="false">Created At</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @if (!empty($warehouse_type))
            @foreach ($warehouse_type as $key => $value)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $value->warehouse_type }}</td>
                    <td>{{ $value->unit }}</td>
                    
                    @if ($value->flag == 1)
                        <td>
                            <!-- Custom Switches -->
                            <div class="form-check form-switch form-switch-custom form-switch-primary">
                                <input class="form-check-input" type="checkbox" onclick="action_data('{{$value->id}}','warehouse_type','Inactive','warehouse_type/list');" role="switch" id="SwitchCheck9" checked >
                            </div>
                        </td>
                    @elseif($value->flag == 0)
                        <td><div class="form-check form-switch form-switch-custom form-switch-primary">
                            <input class="form-check-input" type="checkbox" onclick="action_data('{{$value->id}}','warehouse_type','Active','warehouse_type/list');" role="switch" id="SwitchCheck9">
                        </div>
                        </td>
                    @endif
                    <td>{{ $value->created_at }}</td>
                    @if($value->flag == 1)
                    <td>
                        <div class="dropdown d-inline-block">
                            <button class="btn btn-soft-primary btn-sm dropdown" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ri-more-fill align-middle"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a href="#" data-bs-toggle="modal" data-bs-target="#edit" onclick="edit('{{$value->id}}','warehouse_type/edit');" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                <li>
                                    <a href="#" class="dropdown-item remove-item-btn" onclick="action_data('{{$value->id}}','warehouse_type','delete','warehouse_type/list');">
                                        <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                    @else
                    <td>
                        <div class="dropdown d-inline-block">
                            <button class="btn btn-soft-danger btn-sm dropdown" type="button" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="First Activate this Role" data-bs-original-title="First Activate this Role">
                                <i class="ri-alert-line align-middle"></i>
                            </button>
                        </div>
                    </td>
                    @endif
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
