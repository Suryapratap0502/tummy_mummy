
<div class="team-list grid-view-filter row" id="team-member-list">
    @if (!empty($staff_data))
    @foreach ($staff_data as $key => $value)
    @php $words = explode(" ", $value->name);
    $firtsName = reset($words); 
    $lastName = end($words);
    $first_alpha = substr($firtsName,0,1);
    $last_alpha = substr($lastName ,0,1); @endphp
    <div class="col">
        <div class="card team-box">
            <div class="team-cover"> <img src="assets/images/small/img-9.jpg" alt="" class="img-fluid"> </div>
            <div class="card-body p-4">
                <div class="row align-items-center team-row">
                    <div class="col team-settings">
                        <div class="row">
                            <div class="col">
                                <div class="flex-shrink-0 me-2">
                                    <a href="{{ url('priviliges',['id' => base64_encode($value->id)]) }}"><button type="button" class="btn btn-light btn-icon rounded-circle btn-sm favourite-btn " data-bs-toggle="modal" data-toggle="tooltip" data-placement="left" title="Set Priviliges"><i class="ri-key-fill fs-14"></i></button></a>
                                </div>
                            </div>
                            <div class="col text-end dropdown"> <a
                                    href="javascript:void(0);" data-bs-toggle="dropdown"
                                    aria-expanded="false" class=""> <i
                                        class="ri-more-fill fs-17"></i> </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    @if($value->flag == 1)
                                    <li><a class="dropdown-item edit-list" href="#edit" data-bs-toggle="modal" onclick="edit('{{$value->id}}','staff/edit');"><i class="ri-pencil-line me-2 align-bottom text-muted"></i>Edit</a>
                                    </li>
                                    <li><a href="#" onclick="action_data('{{$value->id}}','admin','delete','staff/list');" class="dropdown-item remove-list"><i class="ri-delete-bin-5-line me-2 align-bottom text-muted" ></i>Delete</a></li>
                                    @if ($value->flag == 1)
                                    <li><a href="#" onclick="action_data('{{$value->id}}','admin','Inactive','staff/list');" class="dropdown-item remove-list"><i class="ri-shield-check-line me-2 align-bottom text-muted" ></i>Deactivate</a></li>
                                    @elseif($value->flag == 0)
                                    <li><a href="#" onclick="action_data('{{$value->id}}','admin','Active','staff/list');" class="dropdown-item remove-list"><i class="ri-checkbox-circle-line me-2 align-bottom text-muted" ></i>Activate</a></li>
                                    @endif
                                    <li><a class="dropdown-item edit-list" href="#change_password" onclick="change_pass({{$value->id}},'staff/change_pass');" data-bs-toggle="modal"><i class="ri-lock-password-line me-2 align-bottom text-muted"></i>Change Password</a>
                                    </li>
                                    @else
                                    <li><a href="#" onclick="action_data('{{$value->id}}','admin','Active','staff/list');" class="dropdown-item remove-list"><i class="ri-checkbox-circle-line me-2 align-bottom text-muted" ></i>Activate</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col">
                        <div class="team-profile-img">
                            <div
                                class="avatar-lg img-thumbnail rounded-circle flex-shrink-0">
                                <div class="avatar-title border bg-light text-primary rounded-circle text-uppercase">{{$first_alpha ?? 'NA'}}{{$last_alpha ?? 'NA'}}</div>
                            </div>
                            <div class="team-content"> 
                                <a class="member-name" data-bs-toggle="offcanvas" href="#member-overview" aria-controls="member-overview" onclick="open_staff_details({{$value->id}})">
                                <h5 class="fs-16 mb-1">{{$value->name}}</h5>
                                </a>
                                <p class="text-muted member-designation mb-0">({{$value->email}})</p>
                                <p class="text-muted member-designation mb-0">{{$value->designation}}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col">
                        <div class="row text-muted text-center">
                            <div class="col-6 border-end border-end-dashed">
                                <h5 class="mb-1 projects-num">Role</h5>
                                <p class="text-muted mb-0">{{$value->role_data->name}}</p>
                            </div>
                            <div class="col-6">
                                <h5 class="mb-1 tasks-num">Status</h5>
                                @if($value->flag == 1)
                                <span class="badge bg-success-subtle text-success">Active</span>
                                @elseif($value->flag == 0)
                                <span class="badge bg-danger-subtle text-danger">Inactive</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-2 col">
                        <div class="text-end"> <a href="pages-profile.html"
                                class="btn btn-light view-btn">View Profile</a> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endif
</div>


