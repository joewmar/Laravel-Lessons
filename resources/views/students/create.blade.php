@include('partials.header', [$title])
    <header class="max-w-lg mx-auto">
        <a href="">
            <h1 class="text-4x font-bold text-white text-center mb-5 text-3xl uppercase">Add New Student</h1>
        </a>
    </header>
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
        <form action="/add/student" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="first_name">
                    First Name
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker focus:outline-gray-600" id="first_name" name="first_name" type="text" placeholder="John" autofocus value={{old('first_name')}}>
                @error('first_name')
                    <p class="text-red-500 text-xs mt-2">
                        {{$message}}
                    </p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="last_name">
                    Last Name
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker focus:outline-gray-600" id="last_name" name="last_name" type="text" placeholder="Doe" value={{old('last_name')}} >
                @error('last_name')
                    <p class="text-red-500 text-xs mt-2">
                        {{$message}}
                    </p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="gender">
                    Gender
                </label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="gender"  name="gender">
                    <option value="" {{old('gender') == "" ? 'selected' : ''}}></option>
                    <option value="Male" {{old('gender') == "Male" ? 'selected' : ''}}>Male</option>
                    <option value="Female" {{old('gender') == "Female" ? 'selected' : ''}}>Female</option>
                </select>
                @error('gender')
                    <p class="text-red-500 text-xs mt-2">
                        {{$message}}
                    </p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="age">
                    Age
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker focus:outline-gray-600" id="age" name="age" type="number" value={{old('age')}}>
                @error('age')
                    <p class="text-red-500 text-xs mt-2">
                        {{$message}}
                    </p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker focus:outline-gray-600" id="email" name="email" type="email" placeholder="johndoe20@email.com" value={{old('email')}} >
                @error('email')
                    <p class="text-red-500 text-xs mt-2">
                        {{$message}}
                    </p>
                @enderror
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-gray-600 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded w-full" type="submit">
                    Add New
                </button>
            </div>
        </form>
    </div>
@include('partials.footer')
