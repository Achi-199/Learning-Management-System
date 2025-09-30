<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Teacher Dashboard</h1>
        <p class="mb-6">Welcome, {{ Auth::user()->name }}!</p>

        <h2 class="text-xl font-semibold mb-2">Your Subjects</h2>
        <a href="{{ route('teacher.subjects.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">+ New Subject</a>

        @if ($subjects->count())
        <table class="table-auto w-full text-left bg-white rounded shadow mt-4">
            <thead>
                <tr>
                    <th class="border px-4 py-2">Name</th>
                    <th class="border px-4 py-2">Description</th>
                    <th class="border px-4 py-2">Code</th>
                    <th class="border px-4 py-2">Credits</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subjects as $subject)
                <tr>
                    <td class="border px-4 py-2">
                        <a href="{{ route('teacher.subjects.show', $subject->id) }}" class="text-blue-600 hover:underline">
                            {{ $subject->name }}
                        </a>
                    </td>
                    <td class="border px-4 py-2">{{ $subject->description }}</td>
                    <td class="border px-4 py-2">{{ $subject->code }}</td>
                    <td class="border px-4 py-2">{{ $subject->credits }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p class="mt-4">You have not created any subjects yet.</p>
        @endif
    </div>
</x-app-layout>