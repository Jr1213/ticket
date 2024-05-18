@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div id="accordion" class="custom-accordion mb-4">

                <div class="card mb-0">
                    <div class="card-header" id="headingOne">
                        <h5 class="m-0">
                            <a class="custom-accordion-title d-block pt-2 pb-2" data-bs-toggle="collapse" href="#collapseOne"
                                aria-expanded="tru/+e" aria-controls="collapseOne">
                                Update Information <span class="float-end"><i
                                        class="mdi mdi-chevron-down accordion-arrow"></i></span>
                            </a>
                        </h5>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <div class="card-body">
                                <form action="{{ route('account.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <x-form.input name='name' title='your name' :value="$user->name" />
                                    <x-form.input name='email' title='your email' :value="$user->email" />
                                    <x-form.input name='image' title='your image' type="file" />
                                    @if ($user->image)
                                        <div class="col-md-12 mb-2">
                                            <img src="{{ $user->imageUrl }}" alt="your image" class="img-fluid">
                                        </div>
                                    @endif
                                    <button class="btn btn-success">save</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div> <!-- end card-->

                <div class="card mb-0">
                    <div class="card-header" id="headingTwo">
                        <h5 class="m-0">
                            <a class="custom-accordion-title collapsed d-block pt-2 pb-2" data-bs-toggle="collapse"
                                href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Update password <span class="float-end"><i
                                        class="mdi mdi-chevron-down accordion-arrow"></i></span>
                            </a>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            <form action="{{ route('password.update') }}" method="post">
                                @csrf
                                @method('patch')
                                <x-form.input type="password" name='password' title='new password' placeholder="enter your new passowrd" />
                                <x-form.input type="password" name='password_confirmation' title='password confirmation' placeholder="enter your new passowrd again" />
                                <x-form.input type="password" name='current_password' title='current password' placeholder="enter your current passowrd" />
                                <button class="btn btn-primary">update</button>

                            </form>
                        </div>
                    </div>
                </div> <!-- end card-->



            </div> <!-- end custom accordions-->
        </div> <!-- end col -->



    </div>
@endsection
