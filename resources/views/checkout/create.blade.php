
@extends('layout.app')

@section('content')
    
    <section class="checkout">
        <div class="container">
            <div class="row text-center pb-70">
                <div class="col-lg-12 col-12 header-wrap">
                    <p class="story">
                        YOUR FUTURE CAREER
                    </p>
                    <h2 class="primary-header">
                        Start Invest Today
                    </h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-9 col-12">
                    <div class="row">
                        <div class="col-lg-5 col-12">
                            <div class="item-bootcamp">
                                <img src="/assets/images/item_bootcamp.png" alt="" class="cover">
                                <h1 class="package text-uppercase">
                                   {{ $camp->title }}
                                </h1>
                                <p class="description">
                                    Bootcamp ini akan mengajak Anda untuk belajar penuh mulai dari pengenalan dasar sampai membangun sebuah projek asli
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-1 col-12"></div>
                        <div class="col-lg-6 col-12">
                            <form action="{{ route('checkout.store', $camp->id) }}" method="post" class="basic-form">
                                @csrf
                                <div class="mb-4">
                                    <label  class="form-label">Full Name</label>
                                    <input  name="full_name" type="text" value="{{ Auth::user()->name }}" class="form-control {{ $errors->has('full_name') ? 'is-invalid' : '' }}" required>
                                    @if ($errors->has('full_name'))
                                        <p class="text-danger text-small"> {{ $errors->first('full_name') }} </p>
                                    @endif
                                </div>
                                <div class="mb-4">
                                    <label  class="form-label">Email Address</label>
                                    <input name="email"  type="email" value="{{ Auth::user()->email }}" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" required>
                                    @if ($errors->has('email'))
                                    <p class="text-danger text-small"> {{ $errors->first('email') }} </p>
                                  @endif
                                </div>
                                <div class="mb-4">
                                    <label  class="form-label">Occupation</label>
                                    <input name="occpation" value="{{ old('occpation')?: Auth::user()->occuption }}" type="text" class="form-control {{ $errors->has('occpation') ? 'is-invalid' : '' }}" required>
                                    @if ($errors->has('occpation'))
                                    <p class="text-danger text-small"> {{ $errors->first('occpation') }} </p>
                                    @endif
                                </div>
                                <div class="mb-4">
                                    <label  class="form-label">Phone</label>
                                    <input name="phone" value="{{ old('phone')?: Auth::user()->phone }}" type="text" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" required>
                                    @if ($errors->has('phone'))
                                    <p class="text-danger text-small"> {{ $errors->first('phone') }} </p>
                                    @endif
                                </div>
                                <div class="mb-4">
                                    <label  class="form-label">Address</label>
                                    <input name="address" value="{{ old('occupation')?: Auth::user()->address }}" type="text" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" required>
                                    @if ($errors->has('address'))
                                    <p class="text-danger text-small"> {{ $errors->first('address') }} </p>
                                    @endif
                                </div>
                                
                                
                                <button type="submit" class="w-100 btn btn-primary">Pay Now</button>
                                <img src="/assets/images/ic_secure.svg" alt=""> Your payment is secure and encrypted.
                                <p class="text-center subheader mt-4">
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js " integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj " crossorigin="anonymous "></script>

@endsection