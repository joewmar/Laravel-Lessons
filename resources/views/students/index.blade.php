{{-- @php
    print_r($studentsInfo);

@endphp --}}
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Students</title>
</head>
<body>
    <ul>
        @foreach ($studentsInfo as $student)
            <li> {{ $student['first_name'] }} {{ $student['last_name'] }} {{ $student['age'] }}</li>
            <li>{{ $student->gender }} {{ $student->gender_count }}</li>
        @endforeach
    </ul>
</body>
</html> --}}

{{-- ------------------------------------------------------------------------------------ --}}

{{-- <ul>
    @foreach ($studentsInfo as $student)
        <li> {{ $student['first_name'] }} {{ $student['last_name'] }} {{ $student['age'] }}</li>
        {{-- <li>{{ $student->gender }} {{ $student->gender_count }}</li>
    @endforeach
</ul> --}}

{{-- Laravel: View Section --}}
{{-- @dd(auth()->user()->name); --}}
@include('partials.header')

    @php $array = array('title' => 'Student System'); @endphp {{--  Passing data for View Component --}}
    <x-nav :data="$array"/>
    {{-- <x-message/>Laravel Part 7 - Authentication Register Login and Logout --}}

    <header class="max-w-lg mx-auto">
        <a href="">
            <h1 class="text-4x font-bold text-white text-center mb-5 text-3xl uppercase">Student List</h1>
        </a>
    </header>
    <section class="mt-10">
        <div class="overflow-x-auto relative">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text gray-700 uppercase bg-gray-50">
                  <tr>
                    <th scope="col" class="py-3 px-6">First Name</th>
                    <th scope="col" class="py-3 px-6">Last Name</th>
                    <th scope="col" class="py-3 px-6">Email</th>
                    <th scope="col" class="py-3 px-6">Age</th>
                    <th scope="col" class="py-3 px-6"></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($studentsInfo as $student)
                    <tr class="bg-gray-800 border-b text-white">
                        <td class="py-4 px-6">{{ $student->first_name }}</td>
                        <td class="py-4 px-6">{{ $student->last_name }}</td>
                        <td class="py-4 px-6">{{ $student->email }}</td>
                        <td class="py-4 px-6">{{ $student->age }}</td>
                        <td class="py-4 px-6">
                            <a href="/student/{{ $student->age }}" class="bg-sky-600 text-white px-4 py-1 rounded">View</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pt-3 mx-auto">
                {{ $studentsInfo->links() }}
            </div>
            
        </div>
    </section>
@include('partials.footer')

{{-- ------------------------------------------------------------------------------------ --}}
