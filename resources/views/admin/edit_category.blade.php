<base href="/public">

@extends('admin.layouts.master')

@extends('admin.layouts.title')

@section('title','Admin Panel || Edit Category')

@section('content')

<form action="{{url('edit_category',$value->id)}}" method="POST" enctype="multipart/form-data">
@csrf
<div class="card mb-3">
    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
        <h6 class="mb-0 fw-bold ">Edit Category</h6> 
    </div>
    <div class="card-body">
        <form>
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label for="firstname" class="form-label">Category Name</label>
                    <input type="text" name="name" value="{{$value->name}}" class="form-control " id="firstname" required>
                </div><br>
                <div class="col-md-12 pt-3">
                    <label for="formFileMultiple" class="form-label"> File Upload</label><br>
                    <img style="width: 10%; height:10%" id="PreviewImage"  src="uploads/{{$value->image}}" alt="">
                    <input class="form-control" name="image"  value="uploads /{{$value->image}}" type="file" id="InputImage">
                </div>
                
                <div class="col-md-12 pt-3">
                    <label for="addnote" class="form-label">Description</label>
                    <textarea  class="form-control" name="description" value="{{$value->description}}" placeholder="{{$value->description}}" id="addnote" rows="3"></textarea> 
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary mt-4">Submit</button>
        </form>
    </div>
</div>
</form>

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