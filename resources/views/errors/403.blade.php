@extends('errors.app')

{{-- @section('title', '403 Forbidden') --}}

@section('content')
<section class="h-screen w-screen overflow-x-hidden flex justify-center align-middle items-center">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
        <div class="mx-auto max-w-screen-sm text-center">
            <h1 class="mb-4 text-7xl tracking-tight font-extrabold lg:text-9xl text-primary-600">
                403</h1>
            <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl ">Forbidden
                Access.</p>
            <p class="mb-4 text-lg font-light text-gray-500 ">Sorry, You do not have permission to
                access this page. </p>
            <a href="/"
                class="bg-blue-600 inline-flex text-white bg-primary-600 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center my-4">Back
                to Homepage</a>
        </div>
    </div>
</section>
@endsection