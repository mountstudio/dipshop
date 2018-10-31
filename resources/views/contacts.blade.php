@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-6">
                <div class="d-flex py-5 font-weight-normal">
                    <div class="col-4">
                        <img src="{{ asset('images/contacts/dipshop.png') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col">
                        <p>{{ __('main.maxim')  }}<span class="text-muted">, COO</span></p>
                        <p>{{ __('main.tel')  }}: +49 173 203 93 93</p>
                        <p>{{ __('main.address.contact')  }}</p>
                        <p>{{ __('main.site')  }}: <a href="http://www.1961.kg/" target="_blank">http://www.1961.kg/</a>, <a href="http://www.dipmarket.kg/" target="_blank">http://www.dipmarket.kg/</a></p>
                    </div>
                </div>
                <div class="d-flex py-5 font-weight-normal">
                    <div class="col-4">
                        <img src="{{ asset('images/contacts/diplomatic.jpg') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col">
                        <p>AEREA GmbH</p>
                        <p>{{ __('main.tel')  }}: +49 30 30 20 67 62</p>
                        <p>{{ __('main.address.s')  }}: Kurfürstendamm 110 10711 Berlin</p>
                        <p>{{ __('main.site')  }}: <a href="http://www.aerea-group.com/" target="_blank">http://www.aerea-group.com/</a></p>
                    </div>
                </div>
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
                                <textarea id="content" name="question" class="form-control">
                                </textarea>
                            </div>

                            <button class="btn btn-primary" type="submit">{{ __('main.submit')  }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection