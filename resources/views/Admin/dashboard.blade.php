@extends('layout.app')

@section('content')
<section class="dashboard my-5">
    <div class="container">
        <div class="row text-left">
            <div class=" col-lg-12 col-12 header-wrap mt-4">
                <p class="story">
                    DASHBOARD
                </p>
                <h2 class="primary-header ">
                    My Camp
                </h2>
            </div>
        </div>
        <div class="row my-5">
            @include('components.alert')
            <table class="table">
                <thead>    
                    <tr>      
                        <th>User</th>     
                        <th>Camp</th>     
                        <th>Price</th>     
                        <th>Register Data</th>     
                        <th>Paid Status</th>     
                    </tr>     
                </thead>
                <tbody>
                        @forelse ($checkouts as $item)
                            <tr>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->camp->title }}</td>
                                <td>{{ $item->camp->price }}</td>
                                <td>{{ $item->created_at->format('d M Y') }}</td>
                               <td>
                                   {{ $item->payment_status }}
                               </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6"> Belum ada data</td>
                            </tr>
                        @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection