<script src="{{ asset('assets/js/pages/datatables.init.js')}}"></script>
<table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
    <thead>
        <tr>
            <th data-ordering="false">Sr.No.</th>
            <th data-ordering="false">Product</th>
            <th data-ordering="false">Variant/Size</th>
            <th data-ordering="false">Preservatives Used</th>
            <th data-ordering="false">Storage Requirements</th>
            <th data-ordering="false">Status</th>
            <th data-ordering="false">Action</th>
            
        </tr>
    </thead>
    <tbody class="gridjs-tbody">
        <tr class="gridjs-tr">
          <td data-column-id="#" class="gridjs-td">
           1
          </td>
          <td data-column-id="product" class="gridjs-td">
            <span
              ><div class="d-flex align-items-center">
                <div class="flex-shrink-0 me-3">
                  <div class="avatar-sm bg-light rounded p-1">
                    <img
                      src="https://micodetest.com/tummy-mummy-demo/img/list/jam.jpg"
                      alt=""
                      class="img-fluid d-block"
                    />
                  </div>
                </div>
                <div class="flex-grow-1">
                  <h5 class="fs-14 mb-1">
                    <a href="#" class="text-body"
                      >Eatopia Strawberry JAM</a><span><span class="badge bg-light text-body fs-12 fw-medium"><div class="badge rounded-pill bg-success">
                        <i class="mdi mdi-star"></i> 4.2
                    </div></span>
                  </h5>
                  <p class="text-muted mb-0">
                    Diet Type : <span class="fw-medium">Veg <i class="mdi mdi-checkbox-blank-circle" style="color: green"></i></span>
                  </p>
                  <p class="text-muted mb-0">
                    Category : <span class="fw-medium"><span class="badge bg-primary-subtle text-primary">Food</span>
                  </p>
                  <p class="text-muted mb-0">
                    Added Date : <span>12 Oct, 2021<small class="text-muted ms-1">10:05 AM</small></span>
                </p>
                  
                  
                </div>
              </div></span
            >
          </td>
          <td data-column-id="product" class="gridjs-td">
            <span
              ><div class="d-flex align-items-center">
                <div class="flex-grow-1">
                    
                        <p class="text-muted mb-0">
                            Variant : <span class="fw-medium"><span class="badge bg-primary-subtle text-primary" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" aria-label="Size : 10-19-10"  data-bs-original-title="Size : 10-19-10">250gm</span> <span class="fw-medium"><span class="badge bg-primary-subtle text-primary" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" aria-label="Out of Stock"  data-bs-original-title="Out of Stock">500gm</span> <span class="fw-medium"><span class="badge bg-primary-subtle text-primary" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" aria-label="Out of Stock"  data-bs-original-title="Out of Stock">1Kg</span> 
                            
                        </p>
                   
                  
                  {{-- <p class="text-muted mb-0">
                    Size : <span class="fw-medium">Veg <i class="mdi mdi-checkbox-blank-circle" style="color: green"></i></span>
                  </p>
                  <p class="text-muted mb-0">
                    Weight : <span class="fw-medium">₹ 100/-</span>
                  </p>
                  <p class="text-muted mb-0">
                    Vendor Price : <span class="fw-medium">₹ 100/-</span>
                  </p>
                  <p class="text-muted mb-0">
                    T&M Price : <span class="fw-medium">₹ 150/-</span>
                  </p> --}}
                  
                </div>
              </div></span
            >
          </td>
          
          <td data-column-id="stock" class="gridjs-td">Yes</td>
          <td data-column-id="price" class="gridjs-td"><span>Refrigeration</span></td>
          <td>
            <!-- Custom Switches -->
            <div class="form-check form-switch form-switch-custom form-switch-primary">
                <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck9" checked >
            </div>
        </td>
          <td data-column-id="action" class="gridjs-td">
            <span
              ><div class="dropdown">
                <button
                  class="btn btn-soft-secondary btn-sm dropdown"
                  type="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  <i class="ri-more-fill"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" style="">
                  <li>
                    <a
                      class="dropdown-item"
                      href="apps-ecommerce-product-details.html"
                      ><i class="ri-eye-fill align-bottom me-2 text-muted"></i>
                      View</a
                    >
                  </li>
                  <li>
                    <a
                      class="dropdown-item edit-list"
                      data-edit-id="1"
                      href="apps-ecommerce-add-product.html"
                      ><i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                      Edit</a
                    >
                  </li>
                  <li class="dropdown-divider"></li>
                  <li>
                    <a
                      class="dropdown-item remove-list"
                      href="#"
                      data-id="1"
                      data-bs-toggle="modal"
                      data-bs-target="#removeItemModal"
                      ><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                      Delete</a
                    >
                  </li>
                </ul>
              </div></span
            >
          </td>
        </tr>

        
    </tbody>
      
</table>

