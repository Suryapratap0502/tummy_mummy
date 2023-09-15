@php $words = explode(" ", $staff_data->name);
    $firtsName = reset($words); 
    $lastName = end($words);
    $first_alpha = substr($firtsName,0,1);
    $last_alpha = substr($lastName ,0,1); @endphp
<div class="offcanvas-body profile-offcanvas p-0">
    <div class="team-cover">
        <img src="https://themesbrand.com/velzon/html/material/assets/images/small/img-9.jpg"
            alt="" class="img-fluid">
    </div>
    <div class="p-3">
        <div class="team-settings">
            <div class="row">
                <div class="col">
                    <p></p>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <div class="p-3 text-center">
        <div class="avatar-lg img-thumbnail rounded-circle mx-auto profile-img">
            <div class="avatar-title border bg-light text-primary rounded-circle text-uppercase">{{$first_alpha ?? 'NA'}}{{$last_alpha ?? 'NA'}}</div>
        </div>
        
        <div class="mt-3">
            <h5 class="fs-15 profile-name">{{$staff_data->name}}</h5>
            <p class="text-muted profile-designation">{{$staff_data->role_data->name}} ({{$staff_data->designation}})</p>
        </div>
    </div>
    <!--end row-->
    <div class="p-3">
        <h5 class="fs-15 mb-3">Personal Details</h5>
        <div class="mb-3">
            <p class="text-muted text-uppercase fw-semibold fs-12 mb-2">Number</p>
            <h6>{{$staff_data->contact}}</h6>
        </div>
        <div class="mb-3">
            <p class="text-muted text-uppercase fw-semibold fs-12 mb-2">Email</p>
            <h6>{{$staff_data->email}}</h6>
        </div>
        <div>
            <p class="text-muted text-uppercase fw-semibold fs-12 mb-2">Address</p>
            <h6 class="mb-0">{{$staff_data->address ?? 'NA'}}</h6>
        </div>
    </div>
    <div class="p-3 border-top">
        <h5 class="fs-15 mb-4">Privileges</h5>
        
        <div class="list-group col nested-list nested-sortable">
            <div class="list-group-item nested-1"> <i class="mdi mdi-folder-open fs-16 align-middle text-warning me-2"></i> Staff Management
                <div class="list-group nested-list nested-sortable">
                    <div class="list-group-item nested-2"> <i class="mdi mdi-folder-open fs-16 align-middle text-danger me-2"></i> Role
                    <div class="list-group nested-list nested-sortable">
                        <div class="list-group-item nested-3"><i class="mdi mdi-eye fs-16 align-middle text-success me-2"></i> Read</div>
                        <div class="list-group-item nested-3"><i class="mdi mdi-lead-pencil fs-16 align-middle text-success me-2"></i> Write</div>
                        <div class="list-group-item nested-3"><i class="mdi mdi-eye-off fs-16 align-middle text-danger me-2"></i> Read</div>
                        <div class="list-group-item nested-3"><i class="mdi mdi-eye-off fs-16 align-middle text-danger me-2"></i> Write</div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="list-group col nested-list nested-sortable">
            <div class="list-group-item nested-2"> <i class="mdi mdi-folder fs-16 align-middle text-warning me-2"></i> Warehouse
                    <div class="list-group nested-list nested-sortable">
                        <div class="list-group-item nested-3"><i class="mdi mdi-eye fs-16 align-middle text-success me-2"></i> Read</div>
                        <div class="list-group-item nested-3"><i class="mdi mdi-eye-off fs-16 align-middle text-danger me-2"></i> Write</div>
                    </div>
                </div>
        </div>
        
    </div>
</div>
<!--end offcanvas-body-->
