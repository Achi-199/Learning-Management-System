<x-app-layout>
    <div class="max-w-4xl mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">My Subjects</h1>

        <a href="{{ route('student.subjects.take') }}"
            class="inline-block mb-4 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Take a New Subject
        </a>

        @if ($subjects->isEmpty())
        <p>You haven't enrolled in any subjects yet.</p>
        @else
        <table class="table-auto w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="border px-4 py-2">Name</th>
                    <th class="border px-4 py-2">Description</th>
                    <th class="border px-4 py-2">Code</th>
                    <th class="border px-4 py-2">Credits</th>
                    <th class="border px-4 py-2">Teacher</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subjects as $subject)
                <tr>
                    <td class="border px-4 py-2">
                        <a href="{{ route('student.subjects.show', $subject->id) }}" class="text-blue-500 hover:underline">
                            {{ $subject->name }}
                        </a>
                    </td>
                    <td class="border px-4 py-2">{{ $subject->description }}</td>
                    <td class="border px-4 py-2">{{ $subject->code }}</td>
                    <td class="border px-4 py-2">{{ $subject->credits }}</td>
                    <td class="border px-4 py-2">{{ $subject->teacher->name }}</td>
                    <td class="border px-4 py-2">
                        <form action="{{ route('student.subjects.leave', $subject->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to leave this subject?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm">
                                Leave Subject
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</x-app-layout>