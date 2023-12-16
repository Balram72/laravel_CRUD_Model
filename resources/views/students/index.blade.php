@extends('layouts.app')
    @section('main')

        <div class="container py-5" >
                <div class="row">
                     <div class="col-md-12">
                        @if($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif
                        <div class="card">
                               <div class="card-header">
                                 <h1>Student Data</h1>
                                    {{-- Add Student Model Start --}}
                                        <button type="button" class="btn btn-outline-info float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Add Student
                                        </button>
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Student Data</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{ url('add-student') }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="exampleInput" class="form-label">Student Name</label>
                                                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="exampleInput">
                                                            @if($errors->has('name'))
                                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                                            @endif
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleEmail" class="form-label">Student Email</label>
                                                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="exampleEmail">
                                                            @if($errors->has('email'))
                                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                                            @endif
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleCourse" class="form-label">Student Course</label>
                                                            <input type="text" class="form-control" name="course" value="{{ old('course') }}" id="exampleCourse">
                                                            @if($errors->has('course'))
                                                            <span class="text-danger">{{ $errors->first('course') }}</span>
                                                            @endif
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="examplePhone" class="form-label">Student Phone</label>
                                                            <input type="number" class="form-control" name="phone" value="{{ old('phone') }}" id="examplePhone">
                                                            @if($errors->has('phone'))
                                                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                                                            @endif
                                                        </div> 
                                                        <div class="mb-3">
                                                            <label for="formFile" class="form-label">Student Image</label>
                                                            <input class="form-control" name="image" type="file" id="formFile">
                                                            @if($errors->has('image'))
                                                            <span class="text-danger">{{ $errors->first('image') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                            </div>
                                        </div>
                                    {{-- Add Student  Model End --}}

                                    {{-- Edit Student  Model Start --}}
                                        <div class="modal fade" id="eaditModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit & Update Student Data</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{ url('update-student') }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <input type="hidden" class="form-control" name="stud_id" id="stud_id">
                                                            
                                                            <label for="name" class="form-label">Student Name</label>
                                                            <input type="text" class="form-control" name="name"  id="name">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="email" class="form-label">Student Email</label>
                                                            <input type="email" class="form-control" name="email"  id="email">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="course" class="form-label">Student Course</label>
                                                            <input type="text" class="form-control" name="course" id="course">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="phone" class="form-label">Student Phone</label>
                                                            <input type="number" class="form-control" name="phone" id="phone"> 
                                                        </div> 
                                                        <div class="mb-3">
                                                            <td> <label for="phone" class="form-label">Student Old Image: </label>
                                                                <img src=""  id="img" alt="No Image" id="img" class="rounded" width="50">
                                                            </td>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="image" class="form-label">Student Image</label>
                                                            <input class="form-control" name="image" type="file" id="image">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                            </div>
                                        </div>
                                    {{-- Edit Student  Model End --}}
                                   
                                    {{-- Delete Student Model Start --}}
                                        <div id="deleteModal" class="modal fade">
                                            <div class="modal-dialog modal-confirm">
                                                <div class="modal-content">
                                                    <div class="modal-header flex-column">
                                                        <div class="icon-box">
                                                            <i class="material-icons">&#xE5CD;</i>
                                                        </div>						
                                                        <h4 class="modal-title w-100">Are you sure?</h4>	
                                                        <button type="button" class="close" data-dismiss="modal" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                                    </div>
                                                    <form action="{{ url('delete-student') }}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('DELETE');
                                                        <div class="modal-body">
                                                            <input type="hidden" id="deleteing_id" name="delete_stud_id">
                                                            <p>Do you really want to delete these records? This process cannot be undone.</p>
                                                        </div>
                                                        <div class="modal-footer justify-content-center">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>  
                                    {{-- Delete Student Model End --}}

                                    {{-- Show Student Start --}}
                                        <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Show Student Data</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{ url('show-student') }}" method="post" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <img src="" id="simg" alt="No Image" class="rounded float-end pt-10" width="110">
                                                        <input type="hidden" id="show_id" name="show_stud_id">
                                                         <h5>Name:<b id="sname"></b></h5>
                                                        <h5>Email:<b id="semail"></b></h5>
                                                        <h5>Course:<b id="scourse"></b></h5>
                                                        <h5>Mobile Number:<b id="sphone"></b>&phone;</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                            </div>
                                        </div>
                                    {{-- Show Student End --}}
                                 
                               </div>
                             <div class="card-body">
                                {{-- Table Start --}}
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>Sno.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Course</th>
                                            <th>Mobile Number</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($student as $student)  
                                            <td>{{ $loop->index+1 }}</td>
                                            <td><a href="{{ $student->id }}" class="text-dark link-underline-light">{{ $student->name }}</a></td>
                                            <td>{{ $student->email }}</td>
                                            <td>{{ $student->course}}</td>
                                            <td>{{ $student->phone }}</td>
                                            <td><img src="StduentPhoto/{{ $student->image }}" alt="No Image" class="rounded-circle" width="30" hight="30"></td>
                                            <td>
                                                <button type="button" value="{{ $student->id }}" class="btn btn-outline-info showbtn btn-sm mt-2" title="Show" style="border:none;">
                                                    <span class="material-icons"> visibility </span>
                                                </button>
                                                <button type="button" value="{{ $student->id }}" class="btn btn-outline-info editbtn btn-sm mt-2" title="Update" style="border:none;">
                                                    <span class="material-icons"> edit_square </span>
                                                </button>
                                                <button type="button" value="{{ $student->id }}" class="btn btn-outline-danger deletebtn btn-sm mt-2" title="Delete" style="border:none;">
                                                    <span class="material-icons"> delete </span>
                                                </button> 
                                            </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                {{-- Table End --}}
                             </div>
                        </div>
                     </div>
                </div>
        </div>
    @endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            // Delete Function Start
                $(document).on('click','.deletebtn', function () {
                    var stud_id = $(this).val();
                    $('#deleteModal').modal('show');
                    $('#deleteing_id').val(stud_id);   
                });
            //  Delete Function Start
            // Show Function Start
                $(document).on('click','.showbtn', function () {
                    var stud_id = $(this).val();
                    $('#showModal').modal('show');
                    $.ajax({
                        type: "get",
                        url: "/edit-student/"+stud_id,
                        success: function (response) {
                            $('#show_id').val(response.student.id);
                            $('#sname').text(response.student.name);
                            $('#semail').text(response.student.email);
                            $('#scourse').text(response.student.course);
                            $('#sphone').text(response.student.phone);
                            $('#simg').attr('src','StduentPhoto/' + response.student.image);
                        }
                    });
                });
            // Show Function Start
            // Update Function Start
                $(document).on('click','.editbtn',function(){
                        var stud_id = $(this).val();
                        $('#eaditModel').modal('show');
                        $.ajax({
                            type: "get",
                            url: "/edit-student/"+stud_id,
                            success: function (response) {
                                $('#name').val(response.student.name);
                                $('#email').val(response.student.email);
                                $('#course').val(response.student.course);
                                $('#phone').val(response.student.phone);
                                $('#img').attr('src','StduentPhoto/' + response.student.image);
                                $('#stud_id').val(response.student.id);
                            }
                        });
                }); 
            // Update Function End
        });
    </script>    
@endsection