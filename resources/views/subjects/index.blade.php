@extends('admin.master.template')

@section('sidepanel')
    @include('admin.layouts.sidepanel')
@endsection

@section('header')
    @include('admin.layouts.header')
@endsection

@section('title','Category list')
 
 @section('content')
 
 @if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

 @if(count($errors) > 0 )
    <div class="alert alert-danger">
        <strong>Whoooppss !!</strong> There were some problem with your input. <br>
        <ul>
          @foreach($errors->all() as $error)
              <li> {{ $error }} </li>
          @endforeach
        </ul>
    </div>
 @endif

 

    <a class="btn btn-primary col-lg-2 offset-9" href="{{ url('addsubject') }}" style="margin-bottom: 10px;">Create New</a>

   <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Complete Subject List</strong>
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                  <thead>
                        <tr>
                            <th style="padding-left: 15px;">#</th>
                            <th>Subject Name</th>
                            <th width="110px;">Action</th>
                        </tr>
                        </thead>
                    <tbody>
                    @foreach($subjects as $subject)
                      <tr>

                        <td>{{ $subject->id }}</td>
                        <td> {{ $subject->subjectname }}
                        </td>
                        <td><center>
                        <div class="form-group" style="display:inline-flex">
                        <a class="btn btn-success btn-sm mr-1" href="subjects/{!! $subject->id !!}/edit"><i class="fa fa-edit"></i></a>
                        {!! Form::open(['id' => 'deleteForm', 'method' => 'DELETE', 'url' => '/subjects/' . $subject->id]) !!}
                        {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] )  }}
                        {!! Form::close() !!}
                        </div>
                        </center></td>
                      </tr>
                    </tbody>
                     @endforeach
                  </table>
                        </div>
                    </div>
                </div>
 @endsection