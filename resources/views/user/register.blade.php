@include('partials.header')
    <header class="max-w-lg mx-auto">
        <a href="">
            <h1 class="text-4x font-bold text-white text-center mb-5 text-3xl uppercase">Student Register</h1>
        </a>
    </header>
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
        <p class="font-bold text-2xl">Welcome to Student System</p>
        <p class="text-red text-xs italic mb-5">Sign in to your account <a href="/login" class="text-gray-500 font-bold">here</a></p>
        <form action="/store" method="post">
            @csrf
            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="name">
                    Name
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker focus:outline-gray-600" id="name" name="name" type="text" placeholder="John Doe" value={{old('name')}}>
                @error('name')
                    <p class="text-red-500 text-xs mt-2">
                        {{$message}}
                    </p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker focus:outline-gray-600" id="email" name="email" type="email" placeholder="user456@email.com" value={{old('email')}}>
                @error('email')
                    <p class="text-red-500 text-xs mt-2">
                        {{$message}}
                    </p>
                @enderror
            </div>
            <div class="mb-6">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="password" name="password" type="password" placeholder="******************">
                @error('password')
                    <p class="text-red-500 text-xs mt-2">
                        {{$message}}
                    </p>
                @enderror
            </div>
            <div class="mb-6">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="confirmpassword">
                    Confirm Password
                </label>
                <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="confirmpassword" name="password_confirmation" type="password" placeholder="******************">
                @error('password_confirmation')
                    <p class="text-red-500 text-xs mt-2">
                        {{$message}}
                    </p>
                @enderror
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-gray-600 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded w-full" type="submit">
                    Register
                </button>
            </div>
        </form>
    </div>
@include('partials.footer')