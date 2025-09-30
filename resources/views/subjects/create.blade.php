<x-app-layout>
    <div class="max-w-xl mx-auto p-6 bg-white shadow-md mt-10 rounded">
        <h1 class="text-2xl font-bold mb-4">Create New Subject</h1>

        <form method="POST" action="{{ route('teacher.subjects.store') }}">
            @csrf

            <!-- Subject Name -->
            <div class="mb-4">
                <label for="name" class="block font-bold">Subject Name:</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full p-2 border rounded">
                @error('name')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block font-bold">Description:</label>
                <textarea name="description" id="description" class="w-full p-2 border rounded">{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Subject Code -->
            <div class="mb-4">
                <label for="code" class="block font-bold">Subject Code:</label>
                <input type="text" name="code" id="code" value="{{ old('code') }}" class="w-full p-2 border rounded">
                @error('subject_code')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Credits -->
            <div class="mb-4">
                <label for="credits" class="block font-bold">Credit Value:</label>
                <input type="number" name="credits" id="credits" value="{{ old('credits') }}" class="w-full p-2 border rounded">
                @error('credits')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save Subject</button>
        </form>
    </div>
</x-app-layout>
