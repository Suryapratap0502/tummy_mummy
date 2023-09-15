<script src="{{ asset('assets/js/pages/datatables.init.js')}}"></script>
<table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
    <thead>
        <tr>
            <th data-ordering="false">Sr.No.</th>
            <th data-ordering="false">Vendor Type</th>
            <th data-ordering="false">Area</th>
            <th data-ordering="false">Category</th>
            <th data-ordering="false">Name</th>
            <th data-ordering="false">Mobile</th>
            <th data-ordering="false">Aadhar No.</th>
            <th data-ordering="false">PAN</th>
            <th data-ordering="false">FSSAI Status</th>
            <th data-ordering="false">Warehouse</th>
            <th data-ordering="false">Status</th>
            <th data-ordering="false">Created At</th>
            
        </tr>
    </thead>
    <tbody>
        @if (!empty($vendor_data))
            @foreach ($vendor_data as $key => $value)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $value->vendor_type }}</td>
                    <td>{{ $value->area_type }}</td>
                    <td>Food</td>
                    <td><a href="{{ url('vendors/view_details') }}">{{ $value->name }}</a></td>
                    <td>{{ $value->mobile_communication }}</td>
                    <td>{{ $value->aadhar }}</td>
                    <td>{{ $value->pan }}</td>
                    <td>{{ $value->fssai_registration_status }}</td>
                    <td>{{ $value->warehouse_member }}</td>
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
                    
                </tr>
            @endforeach
        @endif
    </tbody>
</table>

