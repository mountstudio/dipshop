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
                        <p>Maxim Nudelmann, <span class="text-muted">COO</span></p>
                        <p>Tel: +49 173 203 93 93</p>
                        <p>Address: Chingiz Aitmatov Ave 299/1 Bishkek, KG</p>
                        <p>Site: <a href="http://www.1961.kg/" target="_blank">http://www.1961.kg/</a>, <a href="http://www.dipmarket.kg/" target="_blank">http://www.dipmarket.kg/</a></p>
                    </div>
                </div>
                <div class="d-flex py-5 font-weight-normal">
                    <div class="col-4">
                        <img src="{{ asset('images/contacts/diplomatic.jpg') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col">
                        <p>AEREA GmbH</p>
                        <p>Tel: +49 30 30 20 67 62</p>
                        <p>Address: Kurfürstendamm 110 10711 Berlin</p>
                        <p>Site: <a href="http://www.aerea-group.com/" target="_blank">http://www.aerea-group.com/</a></p>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="d-flex h-100 align-items-center">
                    <div class="col-12">
                        <form action="">
                            <div class="form-group">
                                <label for="name" class="font-weight-normal">Your name <span class="text-danger">*</span></label>
                                <input id="name" type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="phone" class="font-weight-normal">Your phone <span class="text-danger">*</span></label>
                                <input id="phone" type="text" name="phone" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="E-mail" class="font-weight-normal">Your e-mail <span class="text-danger">*</span></label>
                                <input id="E-mail" type="text" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="content" class="font-weight-normal">Your question <span class="text-danger">*</span></label>
                                <textarea id="content" name="name" class="form-control">
                                </textarea>
                            </div>

                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection