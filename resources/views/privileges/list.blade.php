@include('includes/header')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Privileges</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ url('/') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Privileges</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div>
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="row g-4">
                                    <div class="col-sm">
                                    
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card border">
                                    <div class="card-header border-0 rounded">
                                      <div class="row g-2">
                                        <div class="row border-bottom p-1 pb-2 pt-2 align-items-center">
                                          <div class="col-lg-8 fw-bold"> Module</div>
                                          <div class="col-lg-2  fw-bold">Read</div>
                                          <div class="col-lg-2  fw-bold">Write</div>
                                        </div>
                                        <form>
                                        <div class="row border-bottom p-1 pb-2 pt-2 align-items-center justify-content-center">
                                          @php $main_arr = getsidebar(); @endphp
                                          @php if(!empty($main_arr)) { foreach($main_arr as $values) { @endphp
                                          <div class="row border-bottom p-1 pb-2 pt-2 align-items-center ">
                                          <div class="col-lg-8 d-flex-align-items-center fw-bold text-success">{{$values['menu']}}</div>
                                          @if(empty($values['innermenu']))
                                          <div class="col-lg-2 d-flex-align-items-center">
                                              <div class="">
                                                <div class="form-check form-switch mb-2">
                                                  <input type="checkbox" class="form-check-input" name="read{{ $values['id']}}" id="read_{{ $values['id']}}" onclick="permission({{ $values['id']}})" value="1">
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-lg-2 d-flex-align-items-center">
                                              <div class="">
                                                <div class="form-check form-switch mb-2">
                                                  <input type="checkbox" class="form-check-input" name="write{{ $values['id']}}" id="write_{{ $values['id']}}" onclick="permission({{ $values['id']}})" value="1">
                                                </div>
                                              </div>
                                            </div>
                                            @else
                                          <div class="col-lg-2 d-flex-align-items-center"></div>
                                          <div class="col-lg-2 d-flex-align-items-center"></div>
                                          @endif
                                          </div>
                                          @if(!empty($values['innermenu']))
                                          @foreach($values['innermenu'] as $innerval)
                                          <div class="border bg-light">
                                            <div class="row pt-2 border-bottom">
                                              <div class="col-lg-8 d-flex-align-items-center text-primary"> ↪ {{ $innerval['inner_menu']}}</div>
                                              <div class="col-lg-2 d-flex-align-items-center">
                                                <div class="">
                                                  <div class="form-check form-switch mb-2">
                                                    <input type="checkbox" class="form-check-input" name="read{{ $innerval['id']}}" id="read_{{ $innerval['id']}}" onclick="permission({{ $innerval['id']}})" value="1">
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="col-lg-2 d-flex-align-items-center">
                                                <div class="">
                                                  <div class="form-check form-switch mb-2">
                                                    <input type="checkbox" class="form-check-input" name="write{{ $innerval['id']}}" id="write_{{ $innerval['id']}}" onclick="permission({{ $innerval['id']}})" value="1">
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          @endforeach
                                          
                                          @endif
                                          @php } } @endphp
                                        </div>
                                        <div class="text-center mt-3">
                                          <button type="submit" class="btn btn-primary w-sm">Assign Privileges</button>
                                      </div>
                                        </form>
                                     </div>
                                    </div>
                                  </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                </div>
                <!-- end col -->
            </div>

            <!--end row-->
            <!-- Modal -->
           
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    @include('includes/footer');
