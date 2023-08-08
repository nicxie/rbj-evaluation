<ul class="flex flex-col md:flex-row px-2 bg-gray-400">
    <li>
        <a href="/login" class="block py-2 pr-4 pl-3 hover:text-blue-700">Sign In</a>
    </li>
    <li>
        <a href="/register" class="block py-2 pr-4 pl-3 hover:text-blue-700">Sign Up</a>
    </li>
    <li>
        <form action="/logout" method="POST">
            @csrf
            <button href="/logout" class="block py-2 pr-4 pl-3 hover:text-red-700">Logout</button>
        </form>
    </li>
</ul>