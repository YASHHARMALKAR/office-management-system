<script src="https://cdn.tailwindcss.com"></script>
<div class="bg-gray-800 text-white p-4 flex justify-between">

    <span class="font-bold">Office System</span>

    <div class="flex gap-4">
        <a href="/" class="hover:underline">Home</a>
        <a href="/companies" class="hover:underline">Companies</a>
        <a href="/employees" class="hover:underline">Employees</a>
    </div>

</div>
<div class="flex justify-center items-center h-screen bg-gray-100">
    <form method="POST" action="/companies" class="bg-white p-6 rounded shadow w-96">
        @csrf

        <h2 class="text-xl font-bold mb-4 text-center">Add Company</h2>

        <input name="name" placeholder="Company Name"
            class="w-full border p-2 mb-3 rounded"><br>

        <input name="location" placeholder="Location"
            class="w-full border p-2 mb-3 rounded"><br>

        <button class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600">
            Save
        </button>
    </form>
</div>