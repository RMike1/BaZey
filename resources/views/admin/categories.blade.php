@extends('admin.layouts.master')

@extends('admin.layouts.title')

@section('title','Admin Panel')

@section('content')


  <!-- Body: Body -->       
  <div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Categories</h3>
                    <div class="col-auto d-flex w-sm-100">
                        <button type="button" class="btn btn-dark btn-set-task w-sm-100" data-bs-toggle="modal" data-bs-target="#createproject"><i class="icofont-plus-circle me-2 fs-6"></i>{{__('Add Category')}}</button>
                    
                    </div>
                </div>
            </div>
        </div> <!-- Row end  -->
        <div class="row clearfix g-3">
          <div class="col-sm-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category Head</th> 
                                    <th>Description</th> 
                                    <th>Members</th>   
                                    <th>Actions</th>  
                                </tr>
                            </thead>
                            <tbody>
                            
                                @php($count=0)
                         @foreach ($data as $value)
                             
                                @php($count++)
                                    
                                 <tr>
                                    <td>
                                        <span class="fw-bold">{{$count}}</span>
                                    </td>
                                    <td>
                                        <img class="avatar rounded-circle" src="uploads/{{$value->image}}" alt="">
                                        <span class="fw-bold ms-1">{{$value->name}}</span>
                                    </td>
                                    <td>
                                       {{$value->description}}
                                    </td>
                                    
                                    @if ($value->members)
                                        
                                    <td>
                                        {{$value->members}}
                                    </td>
                                    @else
                                    <td>
                                       0
                                    </td>
                                    @endif
                                    
                                    <td>
                                         <div class="btn-group" role="group" aria-label="Basic outlined example">
                                             <a  class="btn btn-outline-secondary" href="{{url('edit/category',$value->id)}}"><i class="icofont-edit text-success"></i></a>
                                            
                                             <a type="button" href="{{url('delete/categories',$value->id)}}" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#deleteproject"><i class="icofont-ui-delete text-danger"></i></a>

                                         </div>
                                     </td>
                                 </tr>
                                 @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
          </div>
        </div><!-- Row End -->
    </div>
</div>

<!-- Modal Members-->
<div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title  fw-bold" id="addUserLabel">Employee Invitation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="inviteby_email">
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email address" id="exampleInputEmail1" aria-describedby="exampleInputEmail1">
                    <button class="btn btn-dark" type="button" id="button-addon2">Sent</button>
                </div>
            </div>
            <div class="members_list">
                <h6 class="fw-bold ">Employee </h6>
                <ul class="list-unstyled list-group list-group-custom list-group-flush mb-0">
                    <li class="list-group-item py-3 text-center text-md-start">
                        <div class="d-flex align-items-center flex-column flex-sm-column flex-md-column flex-lg-row">
                            <div class="no-thumbnail mb-2 mb-md-0">
                                <img class="avatar lg rounded-circle" src="admin/dist/assets/images/xs/avatar2.jpg" alt="">
                            </div>
                            <div class="flex-fill ms-3 text-truncate">
                                <h6 class="mb-0  fw-bold">Rachel Carr(you)</h6>
                                <span class="text-muted">rachel.carr@gmail.com</span>
                            </div>
                            <div class="members-action">
                                <span class="members-role ">Admin</span>
                                <div class="btn-group">
                                    <button type="button" class="btn bg-transparent dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="icofont-ui-settings  fs-6"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                      <li><a class="dropdown-item" href="#"><i class="icofont-ui-password fs-6 me-2"></i>ResetPassword</a></li>
                                      <li><a class="dropdown-item" href="#"><i class="icofont-chart-line fs-6 me-2"></i>ActivityReport</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item py-3 text-center text-md-start">
                        <div class="d-flex align-items-center flex-column flex-sm-column flex-md-column flex-lg-row">
                            <div class="no-thumbnail mb-2 mb-md-0">
                                <img class="avatar lg rounded-circle" src="admin/dist/assets/images/xs/avatar3.jpg" alt="">
                            </div>
                            <div class="flex-fill ms-3 text-truncate">
                                <h6 class="mb-0  fw-bold">Lucas Baker<a href="#" class="link-secondary ms-2">(Resend invitation)</a></h6>
                                <span class="text-muted">lucas.baker@gmail.com</span>
                            </div>
                            <div class="members-action">
                                <div class="btn-group">
                                    <button type="button" class="btn bg-transparent dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        Members
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                      <li>
                                          <a class="dropdown-item" href="#">
                                            <i class="icofont-check-circled"></i>
                                              
                                            <span>All operations permission</span>
                                           </a>
                                           
                                        </li>
                                        <li>
                                             <a class="dropdown-item" href="#">
                                                <i class="fs-6 p-2 me-1"></i>
                                                   <span>Only Invite & manage team</span>
                                               </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn bg-transparent dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="icofont-ui-settings  fs-6"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                      <li><a class="dropdown-item" href="#"><i class="icofont-delete-alt fs-6 me-2"></i>Delete Member</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item py-3 text-center text-md-start">
                        <div class="d-flex align-items-center flex-column flex-sm-column flex-md-column flex-lg-row">
                            <div class="no-thumbnail mb-2 mb-md-0">
                                <img class="avatar lg rounded-circle" src="admin/dist/assets/images/xs/avatar8.jpg" alt="">
                            </div>
                            <div class="flex-fill ms-3 text-truncate">
                                <h6 class="mb-0  fw-bold">Una Coleman</h6>
                                <span class="text-muted">una.coleman@gmail.com</span>
                            </div>
                            <div class="members-action">
                                <div class="btn-group">
                                    <button type="button" class="btn bg-transparent dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        Members
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                      <li>
                                          <a class="dropdown-item" href="#">
                                            <i class="icofont-check-circled"></i>
                                              
                                            <span>All operations permission</span>
                                           </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <i class="fs-6 p-2 me-1"></i>
                                                   <span>Only Invite & manage team</span>
                                               </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="btn-group">
                                    <div class="btn-group">
                                        <button type="button" class="btn bg-transparent dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="icofont-ui-settings  fs-6"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                          <li><a class="dropdown-item" href="#"><i class="icofont-ui-password fs-6 me-2"></i>ResetPassword</a></li>
                                          <li><a class="dropdown-item" href="#"><i class="icofont-chart-line fs-6 me-2"></i>ActivityReport</a></li>
                                          <li><a class="dropdown-item" href="#"><i class="icofont-delete-alt fs-6 me-2"></i>Suspend member</a></li>
                                          <li><a class="dropdown-item" href="#"><i class="icofont-not-allowed fs-6 me-2"></i>Delete Member</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    </div>
</div>

<!-- Add Department-->

<form action="{{route('create/category')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="createproject" tabindex="-1"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title  fw-bold" id="createprojectlLabel"> Create Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput77" class="form-label">Category Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleFormControlInput77" placeholder="Category name..." required>

                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                </div>
              
                <div class="mb-3">
                    <img src="" style="width: 10%; height:10%" onerror="this.src='{{asset('images/image.png')}}'" id="PreviewImage" alt="">
                    <label for="formFileMultipleone" class="form-label">Category Images </label>
                    <input class="form-control" name="image" type="file" id="InputImage"  multiple>
                </div>
                      
                <div class="mb-3">
                    <label for="exampleFormControlTextarea78" class="form-label">Description (optional)</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="exampleFormControlTextarea78" rows="3" placeholder="Add any extra details about this category..."></textarea>
                   
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Done</button>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </div>
        </div>
    </div>
</form>

<!-- Delete Department-->
@foreach ($data as $value)
    
<div class="modal fade" id="deleteproject" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title  fw-bold" id="deleteprojectLabel"> Delete item Permanently?</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body justify-content-center flex-column d-flex">
            <i class="icofont-ui-delete text-danger display-2 text-center mt-2"></i>
            <p class="mt-4 fs-5 text-center">You can only delete this item Permanently</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <a type="submit" href="{{url('delete/category',$value->id)}}"  class="btn btn-danger color-fff">{{__('Delete')}}</a>
        </div>
    </div>
    </div>
</div>
@endforeach

<script type="text/javascript">

InputImage.onchange= evt=>
{
    const[file]=InputImage.files
    if(file)
    {
        PreviewImage.src=URL.createObjectURL(file)
    }
}

</script>

@endsection