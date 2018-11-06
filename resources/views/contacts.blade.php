@extends('layouts.app')

@section('content')
    @include('_partials._categories', ['fixed' => false])
    @if(Session::has('question_status'))
        <div class="alert alert-success fixed-top alert-dismissible fade show w-25" role="alert" style="top: 10px; right: 10px; left: auto;">
            {{ Session::get('question_status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="container py-5">
        <div class="row">
            <div class="col-6">
                @include('contacts.dipshop')
                @include('contacts.aerea')
            </div>
            <div class="col-6">
                <div class="d-flex h-100 align-items-center">
                    <div class="col-12">
                        <form action="{{ route('bid') }}">
                            <div class="form-group">
                                <label for="name" class="font-weight-normal">{{ __('main.name')  }}<span class="text-danger">*</span></label>
                                <input id="name" type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="phone" class="font-weight-normal">{{ __('main.phone')  }} <span class="text-danger">*</span></label>
                                <input id="phone" type="text" name="phone" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="E-mail" class="font-weight-normal">{{ __('main.email')  }}<span class="text-danger">*</span></label>
                                <input id="E-mail" type="text" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="content" class="font-weight-normal">{{ __('main.about')  }}<span class="text-danger">*</span></label>
                                <textarea id="content" name="question" rows="10" class="form-control"></textarea>
                            </div>

                            <button class="btn btn-primary" type="submit">{{ __('main.submit')  }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection