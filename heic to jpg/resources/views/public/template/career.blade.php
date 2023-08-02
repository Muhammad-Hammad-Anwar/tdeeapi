<div class="blog-header">
	<div class="p-5">
		<div class="row justify-content-center align-items-center p-4">
			<div class="col-lg-12 text-center">
				<h1>{{ $page->title}}</h1>
                <p class="text-center p-3">{{ $page->description }}</p>
				<div id="accordion" class="mt-5">
				@foreach(careers() as $key => $career)
					<div class="post mt-5">
                      	<div class="row">
                        	<div class="col-lg-5 d-flex flex-column align-items-start">
                            	<h4>{{ $career->title }}</h4>
                            	<div class="d-flex location">
                            		<i class="fa-solid fa-location-dot me-2 mt-1"></i><span>{{ $career->type }}</span>
                            	</div>
                        	</div>
                        	<div class="col-lg-5 job-description">
                            	<p>{{ $career->description }}</p>
                        	</div>
                        	<div class="col-lg-2 d-flex align-items-center justify-content-lg-end">
                            	<button type="submit" class="btn detail" data-toggle="collapse" data-target="#collapse{{ $key }}" aria-expanded="true" aria-controls="collapseOne">Details
                                	<i class="fa-solid fa-arrow-right"></i>
                            	</button>
                        	</div>
                      	</div>
                      	<div id="collapse{{ $key }}" class="collapse job-description {{ Session('application_id') == $career->id ? 'show' : '' }}" aria-labelledby="headingOne" data-parent="#accordion">
                        	<div class="card-body">
                            	<p>{!! $career->detail !!}</p>
                            	<div class="job-form col-lg-4 p-4 mb-3">
                                	<h3>Apply Now</h3>
                                    @if($message = Session::get('jobApplicationMessage'))
                                        <div class="alert alert-dismissible alert-success">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @endif
                                    @if ($errors->any())
                                        <div class="alert alert-danger" role="alert">
                                            <ul class="mb-0">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form method="POST" action="{{ route('application.store') }}" class="d-flex flex-column align-items-center" role="form" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="career_id" value="{{ $career->id }}">
                                    	<div class="form-group col-lg-12 mt-2">
                                        	<input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="Enter your name" required="required">
                                      	</div>
                                    	<div class="form-group col-lg-12 mt-2">
                                      		<input type="email" name="email" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email" required="required">
                                    	</div>
                                    	<div class="form-group col-lg-12 mt-3">
                                        	<label for="pdf-files_{{$key}}">
                                            	<i class="fa-sharp fa-solid fa-paperclip"></i>Attach your CV
                                            	<input id="pdf-files_{{$key}}" type="file" aria-hidden="true" name="attachment" class="pdf-files form-control d-none" accept=".pdf" required="required"  data-key="{{ $key }}">
                                        	</label>
											<div class="mt-3" id="pdf-preview-container{{ $key }}"></div>
                                    	</div>
                                    	<button type="submit" class="btn mt-5 border-0">Send CV</button>
                                	</form>
                            	</div>
                        	</div>
                      	</div>
                    </div>
                @endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@section('scripts')
<script>
	$('.pdf-files').on('change', function(e) {
        var key = $(this).attr("data-key");
        $('#pdf-preview-container' + key).empty();
		$.each(this.files, function(i, file) {
			var fileReader = new FileReader();
			fileReader.onload = function() {
				$('#pdf-preview-container' + key).append('<div class="pdf-container"><embed src="' + this.result + '" type="application/pdf" width="100%" height="100%" /></div>');
			};
			fileReader.readAsDataURL(file);
		});
	});
</script>
@endsection