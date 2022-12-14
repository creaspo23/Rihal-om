@extends('layouts.auth')

@section('content')
    <div class="min-h-screen flex items-center">
        <div class="bg-white w-full max-w-lg rounded-lg shadow overflow-hidden mx-auto">
            <div class="py-4 px-6">
                <div class="text-center font-bold text-gray-700 text-3xl">Rihal</div>
                <div class="mt-1 text-center font-bold text-gray-600 text-xl">Welcome Back</div>
                <div class="mt-1 text-center text-gray-600"></div>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mt-4 w-full">
                        <input type="email" name="email" placeholder="Email address" value="admin@admin.com"
                               class="w-full mt-2 py-3 px-4 bg-gray-100 text-gray-700 border border-gray-300 rounded  block appearance-none placeholder-gray-500 focus:outline-none focus:bg-white"/>
                        @error('email')
                        <p class="text-red-500 text-xs mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="mt-4 w-full">
                        <input type="password" name="password" placeholder="Password" value="password"
                               class="w-full mt-2 py-3 px-4 bg-gray-100 text-gray-700 border border-gray-300 rounded  block appearance-none placeholder-gray-500 focus:outline-none focus:bg-white"/>
                        @error('password')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="flex justify-between items-center mt-6">
                        <button type="submit"
                                class="py-2 px-4 bg-gray-700 text-white rounded hover:bg-gray-600 focus:outline-none">
                            Login
                        </button>
                    </div>
                </form>
            </div>
          
        </div>
    </div>
@endsection
