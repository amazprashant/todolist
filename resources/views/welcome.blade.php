<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">

    <link href="{{WEBSITE_URL}}assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{WEBSITE_URL}}css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="antialiased">
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                <div class="row">    
                                    <div class="col-lg-2 my-1">
                                        <img src="{{ asset('images/handysolver.png') }}" alt="Image" width="100" height="100">
                                    </div>
                                
                                    <div class="col-lg-8 text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Todo List Application</h1>
                                        <p>Where to-do item are added/deleted and belong to categories</p>
                                    </div>
                                    </div>
                                    <div class=" container ">
                                        {{ Form::open(['role' => 'form','url' =>  route("add"),'class' => 'mws-form', 'files' => true,"autocomplete"=>"off"]) }}
                                        <div class="card card-custom gutter-b">

                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-xl-4">
                                                        <!--begin::Input-->
                                                         
                                                        <div class="form-group">
                                                            {!! HTML::decode(
                                                            Form::label('category',trans("Category").'<span
                                                                class="text-danger"> * </span>')) !!}
                                                            {{ Form::select("category",['' => 'SELECT'
                                                                        ]+ $category_drop, '', ['class' => 'form-control
                                                                        form-control-solid form-control-lg
                                                                        '.($errors->has('category') ?
                                                                        'is-invalid':'')]) }}
                                                            <div class="invalid-feedback">
                                                                <?php echo $errors->first('category') ; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            {!! HTML::decode( Form::label('todo_name', trans("To do").'<span class="text-danger"> * </span>')) !!}
                                                            {{ Form::text('todo_name','', ['class' => 'form-control form-control-solid form-control-lg '.($errors->has('category') ? 'is-invalid':'')]) }}
                                                            <div class="invalid-feedback">
                                                                <?php echo $errors->first('todo_name'); ?></div>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                 
                                                    <div class="col-xl-4">
                                                    <button button type="submit"
                                                            class="btn btn-success font-weight-bold text-uppercase mt-4">
                                                            Submit
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        {{ Form::close() }}
                                        <div class="dataTables_wrapper ">
								<div class="table-responsive">
									<table
										class="table dataTable table-head-custom table-head-bg table-borderless table-vertical-center"
										id="taskTable">
										<thead>
											<tr class="text-uppercase">
												
																								
												<th class="">
													Todo Item Name
												</th>
												
												<th class="">
													Category
												</th>

												<th class="">
													Timestamp
												</th>
										
												<th class="text-right ">
                                                    {{ trans("action") }}
                                                </th>
											</tr>
										</thead>
										<tbody>
                                        @if(!$todo_all->isEmpty())
											@foreach($todo_all as $result)
                                                <tr>
                                                    <td>
                                                    {{ $result->name }}
                                                    </td>
                                                
                                                    <td>
                                                    {{ $result->category_name }}
                                                    </td>
                                                    <td>
                                                    {{ $result->created_at }}
                                                    </td>
                                                    <td class="float-right">
                                                    <a href='{{route("delete","$result->id")}}'class="btn btn-danger">Delete</a>
                                                    </td>
                                                </tr> 
                                            @endforeach
                                        @endif                
                                        </tbody>
									</table>
								</div>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
<script src="{{WEBSITE_URL}}assets/jquery/jquery.min.js"></script>
<script src="{{WEBSITE_URL}}assets/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="{{WEBSITE_URL}}assets/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="{{WEBSITE_URL}}js/sb-admin-2.min.js"></script>

</html>