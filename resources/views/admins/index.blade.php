@include('partials.header')
<?php $array = array('title' => 'Employee System') ;?>
<x-nav :data="$array" />
<x-messages />


<header class="max-w-lg mx-auto mt-5">
    <a href="#">
        <h1 class="text-4x1 font-bold text-white text-center hover:text-gray-900">Employee List</h1>
    </a>
</header>
<section class="mt-10">
    <div class="overflow-x-auto relative">
        <table class="w-96 mx-auto text-sm text-left text-gray-500">
            <thead class="text xs gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        First Name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Last Name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Email
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Gender
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Age
                    </th>
                    <th scope="col">

                    </th>
                    {{-- <th scope="col" class="py-3 px-6">
                        Department
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Designation
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Status
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Date Hired
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Tenurity
                    </th> --}}
                </tr>
            </thead>

            <tbody>
                @foreach ($employees as $employee)
                <tr class="bg-gray-800 border-b text-white">
                    <td class="py-4 px-6">
                        {{$employee->fname}}
                    </td>
                    <td class="py-4 px-6">
                        {{$employee->lname}}
                    </td>
                    <td class="py-4 px-6">
                        {{$employee->email}}
                    </td>
                    <td class="py-4 px-6">
                        {{$employee->gender}}
                    </td>
                    <td class="py-4 px-6">
                        {{$employee->age}}
                    </td>
                    <td class="py-4 px-6">
                        <a href="/employee/{{$employee->id}}" class="bg-sky-600 text-white px-4 py-1 rounded hover:bg-blue-700">view</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mx-auto max-w-md pt-6 p-4">
            {{$employees->links()}}
        </div>
        
    </div>
</section>
@include('partials.footer')

{{-- <ul>
    @foreach ($employees as $employee)
    
    <li>{{$employee->gender}} - {{$employee->gender_count}}</li>
    
    @endforeach
</ul> --}}