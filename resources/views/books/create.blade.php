@extends('admin.master.template')

@section('sidepanel')
    @include('admin.layouts.sidepanel')
@endsection

@section('header')
    @include('admin.layouts.header')
@endsection

@section('title','Add Books')
 
 @section('content')

 @if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

 @if($message = Session::get('success1'))
    <div class="alert alert-danger">
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

 <link rel="stylesheet" href="{!! ('/css/memberlistcss.css') !!}">
 {!! Form::open(['id' => 'dataForm', 'url' => '/books', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    
    <div class="col-lg-6">
                    <div class="card">
                      <div class="card-header"><strong>First</strong><small> Portion</small></div>
                      <div class="card-body card-block">

                     <div class="form-group {{ $errors->has('firstname') ? 'has-error' : '' }}">
                      {!!Form::label('Book Name', 'Book Name', array('class' => 'form-control-label'))!!}
                    <div class="iconic-input">
                    <div class="input-group margin-bottom-sm">
                    <span class="input-group-addon">
                    <i class="fa fa-book"></i></span>
                      {!!Form::text('bookname',null, ['placeholder' => 'Book name', 'class' => 'form-control', 'required' => ''])!!}
                     
                    </div>
                    <span class="text-danger">{{ $errors->first('bookname') }}</span>
                </div>
             </div>
             <a title="QR Code Generator" href="{{ url('qrcodegenerator') }}"><span class="fa fa-qrcode pull-right"></span> </a>

                   <div class="form-group">
                      {!!Form::label('Book ISBN No', 'Book ISBN No', array('class' => 'form-control-label' ))!!}
                    <div class="iconic-input">
                    <div class="input-group margin-bottom-sm">
                    <span class="input-group-addon">
                    <i class="fa fa-undo"></i></span>
                    {!!Form::text('ISBN',null, ['placeholder' => 'ISBN', 'class' => 'form-control', 'required' => ''])!!}
                    </div>
                    <span class="text-danger">{{ $errors->first('ISBN') }}</span>
                </div>
             </div>



                    <div class="form-group">
                      {!!Form::label('Available book number', 'Available book number', array('class' => 'form-control-label'))!!}
                    <div class="iconic-input">
                    <div class="input-group margin-bottom-sm">
                    <span class="input-group-addon">
                    <i class="fa fa-book"></i></span>
                    {!!Form::number('booknumber',null, ['placeholder' => 'Book number', 'class' => 'form-control', 'required' => ''])!!}
                    </div>
                    <span class="text-danger">{{ $errors->first('booknumber') }}</span>
                </div>
             </div>

             <div class="form-group">
                      {!!Form::label('Book Price', 'Book Price', array('class' => 'form-control-label'))!!}
                    <div class="iconic-input">
                    <div class="input-group margin-bottom-sm">
                    <span class="input-group-addon">
                    <i class="fa fa-money"></i></span>
                    {!!Form::number('bookprice',null, ['placeholder' => 'Book price', 'class' => 'form-control', 'required' => ''])!!}
                    </div>
                    <span class="text-danger">{{ $errors->first('bookprice') }}</span>
                </div>
             </div>

              <div class="form-group">
                      {!!Form::label('Year Publish', 'Year Publish', array('class' => 'form-control-label'))!!}
                    <div class="iconic-input">
                    <div class="input-group margin-bottom-sm">
                    <span class="input-group-addon">
                    <i class="fa fa-adjust"></i></span>
                    {!!Form::text('yearpublish',null, ['placeholder' => 'Year Publish', 'class' => 'form-control'])!!}
                    </div>
                </div>
             </div>

              <div class="form-group">
                      {!!Form::label('Publisher', 'Publisher', array('class' => 'form-control-label'))!!}
                    <div class="iconic-input">
                    <div class="input-group margin-bottom-sm">
                    <span class="input-group-addon">
                    <i class="fa fa-users"></i></span>
                    {!!Form::text('publisher',null, ['placeholder' => 'Publisher', 'class' => 'form-control'])!!}
                    </div>
                </div>
             </div>

                <div class="form-group">
                      {!!Form::label('Author Name', 'Author Name', array('class' => 'form-control-label'))!!}
                    <div class="iconic-input">
                    <div class="input-group margin-bottom-sm">
                    <span class="input-group-addon">
                    <i class="fa fa-user"></i></span>
                    {!!Form::text('writername',null, ['placeholder' => 'Author name', 'class' => 'form-control', 'required' => ''])!!}
                    </div>
                    <span class="text-danger">{{ $errors->first('writername') }}</span>
                </div>
             </div>
    
             <div class="form-group">
							<label style="width:100%;">Category </label>
              @foreach($categories as $category)
								<label class="checkbox-inline pull-left" style="width:30%; margin-left:0px;background:#d9edf7;margin:0.5%;border-radius:20px;">
                                
								<input class="categoryname" type="checkbox" name="categoryname[]" value="{{$category->categoryname}}" {{ old('categoryname', $category->categoryname) == 'value' ? 'checked="checked"' : '' }}> {{$category->categoryname}}</label>
                @endforeach
							</div>

                     <br><br> <span class="text-danger">{{ $errors->first('categoryname') }}</span>
                   
                    </div>             
            </div>
    </div>
            <div class="col-lg-6">
                    <div class="card">
                      <div class="card-header"><strong>Second</strong><small> Portion</small></div>
                      <div class="card-body card-block">

                    <div class="form-group">
                       {!!Form::label('section', 'Section', array('class' => 'form-control-label'))!!}
                       <div class="iconic-input">
                            <div class="input-group margin-bottom-sm">
                            <select name="section" class="form-control">
                                    <option value="" disabled {{ old('section') ? '' : 'selected' }}>Choose a section</option>
                                    @foreach($sections as $section)
                                     <option value="{{ $section->sectionname }}" @if(old('section')&&old('section')== $section->sectionname) selected='selected' @endif >{{ $section->sectionname }}</option>
                                    @endforeach
                                </select>
                            </div>
                      </div>
                </div>

                         
                         <div class="form-group">
                           <label class="form-control-label">Status</label>
                          {!!Form::textarea('status',null, ['placeholder' => 'Status', 'class' => 'form-control status', 'required' => ''])!!}
                          </div>
                          <span class="text-danger">{{ $errors->first('status') }}</span>
                                
                          <div class="form-group">
                          <label class="form-control-label">Book Type</label>
               
                        <select class="form-control booktype" id="booktype" name="booktype" required="">
                            <option value="" selected=""> Choose book type </option>
                            <option value="physical"> Physical</option>
                            <option value="digital"> Digital</option>
                        </select>
                            </div>
            
      

                    <div class="form-group digitalphotos" style='display:none;'>
							<div class="col-lg-7 ">
								<div class="row">
									<label>Choose photo (<small>optional</small>)
									<label for="file-upload" class="custom-file-upload" style="">
										<i class="fa fa-cloud-upload"></i> Upload Photo
									</label>
									<input id="file-upload" name="digitalphoto" class="digitalphoto" type="file" accept="image/x-png,image/gif,image/jpeg">
									<button type="button" id="remove_photo" class="btn btn-danger" style="width: 94%; display: none;"><span class="ladda-label">Remove?</span></button>
									
								</label>
                                </div>
							</div>
							
							<div class="col-lg-5">
								<div class="row">
									<img class="pre_img" src="https://yourprogramming.com/library/images/no_img.jpg" style="width: 100%; max-width: 100%;">
									<p class="image_view"></p><img src="">
                                    </div>
                                    </div>
						    	</div>
               
                     <span class="text-danger">{{ $errors->first('booktype') }}</span>
                     <div class="form-group">
                        <label class="form-control-label">Book Condition</label>
                          <select class="form-control bookcondition" id="bookcondition" name="bookcondition" required="">
                            <option value="" selected=""> Choose book condition </option>
                            <option value="good"> Good</option>
                            <option value="bad"> Bad</option>
                            <option value="normal"> Normal</option>
                        </select>
                            </div>
            
      
                          <span class="text-danger">{{ $errors->first('bookcondition') }}</span>

                           <div class="form-group">
                           <label class="form-control-label">Details</label>
                          {!!Form::textarea('details',null, ['placeholder' => 'Details', 'class' => 'form-control details', 'required' => ''])!!}
                          </div>
                          <span class="text-danger">{{ $errors->first('details') }}</span>
  

                     <div class="card-footer">
                     {!!Form::submit('Create Books', ['class' => 'btn btn-primary']) !!}

                      </div>
                </div>
        </div>
</div>
{!! Form::close() !!}    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">
     $("#data").submit(function (event) {
                 var x = confirm("Are you sure you want to delete?");
                    if (x) {
                        return true;
                    }
                    else {

                        event.preventDefault();
                        return false;
                    }

                });
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    $('#booktype').on('change', function() {
      if ( this.value == 'digital' )
      //.....................^.......
      {
        $(".digitalphotos").show();
      }
      else
      {
        $(".digitalphotos").hide();
      }

    });
    

  });
</script>

    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">
     $("#dataForm").submit(function (event) {
                 var x = confirm("Are you sure you want to add?");
                    if (x) {
                        return true;
                    }
                    else {

                        event.preventDefault();
                        return false;
                    }

                });
</script>

<style>
input[type="file"] {
    display: none;
}
.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 14px 12px;
    cursor: pointer;
    width:94%;
    font-size: 18px;
    text-align: center;
}
</style>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
$(function () {
	//logo image preview 
	function filePreview(input){
		if(input.files && input.files[0]){
			var reader = new FileReader();
			reader.onload = function(e){
				$('.pre_img').hide();
				$('.image_view').after('<img src="'+e.target.result+'" />');
				$('.digitalphotos img').css('max-width','100%');
				$("#remove_photo").show(200);
				$(".custom-file-upload").slideUp(0);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	$('.digitalphoto').change(function(){
		filePreview(this);	
		$('.upload_photo').show();
	});

	//remove logo img 
	$("#remove_photo").click(function(){
		$('.digitalphotos img').hide();
		$('.pre_img').show();
		$('.digitalphoto').val('');
		$("#remove_photo").slideUp(300);
		$('.upload_photo').slideUp();
		$('.custom-file-upload').slideDown(0);
	});
	
	$(".upload_photo").click(function(){
		var new_img = $('.new_img').attr('src');
		$('.pre_img_main').attr('src',new_img);
		var mainPhto = $('.digitalphoto').val();
		alert(mainPhto);
	});
	//check is one of the check-box chosen or not
	$('.checkbox-inline').click(function(){
		$('.sub').prop('required',false);
	});


})
</script>

@endsection()