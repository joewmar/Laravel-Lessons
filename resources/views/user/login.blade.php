@include('partials.header')
    <header class="max-w-lg mx-auto">
        <a href="">
            <h1 class="text-4x font-bold text-white text-center mb-5 text-3xl uppercase">Student Login</h1>
        </a>
    </header>
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
        <p class="font-bold text-2xl">Welcome to Student System</p>
        <p class="text-red text-xs italic mb-5">Sign up new account <a href="/register" class="text-gray-500 font-bold">here</a></p>
        <form action="/login/process" method="POST">
            @csrf
            @error('email')
                <p class="text-red-500 text-xs mt-2">
                    {{$message}}
                </p>
            @enderror
            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker focus:outline-gray-600" id="email" name="email" type="email" placeholder="Username">
            </div>
            <div class="mb-6">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="password" name="password" type="password" placeholder="******************">
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-gray-600 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded w-full" type="submit">
                    Login
                </button>
            </div>
        </form>
    </div>
@include('partials.footer')