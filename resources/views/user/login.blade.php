@include('partials.header')
    <header class="max-w-lg mx-auto">
        <a href="#">
            <h1 class="text-4x1 font-bold text-white text-center">Employee Log In</h1>
        </a>
    </header>
    <main class="bg-white max-w-lg mx-auto p-8 my-10 rounded-lg shadow-2xl">
        <section>
            <h3 class="font-bold text-2xl text-center">Welcome to Employee System</h3>
            <p class="text-gray-600 pt-2 text-center">Don't have an account? click
                <a href="/register" class="text-blue-500 font-bold hover:text-blue-700">here</a>
            to Register.</p>
        </section>
        <hr>
        <section class="mt-10">
            <form action="/login/process" method="POST" class="flex flex-col">
                @csrf
                @error('email')
                    <p class="text-red-500 text-xs p-1">
                        {{$message}}
                    </p>
                @enderror
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Email</label>
                    <input type="email" name="email" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3">
                </div>
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Password</label>
                    <input type="password" name="password" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3">
                </div>
                <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 rounde shadow-lg hover:shadow-xl transition duration-200" type="submit">Login</button>
            </form>
        </section>
    </main>
@include('partials.footer')