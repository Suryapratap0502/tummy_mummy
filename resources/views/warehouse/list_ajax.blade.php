<script src="{{ asset('assets/js/pages/datatables.init.js')}}"></script>
<table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
    <thead>
        <tr>
            <th data-ordering="false">Sr.No.</th>
            <th data-ordering="false">Warehouse Type</th>
            <th data-ordering="false">Name</th>
            <th data-ordering="false">Facilities</th>
            <th data-ordering="false">Address</th>
            <th data-ordering="false">Status</th>
            <th data-ordering="false">Created At</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @if (!empty($vc_data))
            @foreach ($vc_data as $key => $value)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td><div class="d-flex align-items-center fw-medium">
                        <a href="{{ asset('upload/vendor_category/'.$value->image) }}" target="_blank"><img src="{{asset('upload/vendor_category/'.$value->image)}}" alt="" class="avatar-xxs me-2"></a>
                        <a href="javascript:void(0);" class="currency_name">{{$value->name}}</a>
                    </div></td>
                    <td>{{$value->is_fssai_req}}</td>
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

