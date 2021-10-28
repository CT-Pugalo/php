@extends('template')

@section('titre')
Login
@endsection
@section('content')
<div class="w-full max-w-xs">
    <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded shadow-md" method="POST" action="{{ route('auth.signIn') }}">
    @csrf
      <div class="mb-4">
        <label class="block mb-2 text-sm font-bold text-gray-700" for="username">
          Username
        </label>
        <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Username">
      </div>
      <div class="mb-4">
        <label class="block mb-2 text-sm font-bold text-gray-700" for="username">
          Email
        </label>
        <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="username" type="text" name="email" placeholder="Username">
      </div>
      <div class="mb-6">
        <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
          Password
        </label>
        <input class="w-full px-3 py-2 mb-3 leading-tight text-gray-700 border border-red-500 rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="password" type="password" name="password" placeholder="******************">
        <p class="text-xs italic text-red-500">Please choose a password.</p>
      </div>
      <div class="flex items-center justify-between">
        <button class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline" type="submit">
          Sign In
        </button>
      </div>
    </form>
  </div>
@endsection
