<x-app-layout>
    <div class="max-w-4xl mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Take a New Subject</h1>

        @if($subjects->isEmpty())
            <p class="text-gray-600">All subjects already taken.</p>
        @else
        <table class="table-auto w-full bg-white">
            <thead>
                <tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Description</th>
                    <th class="px-4 py-2">Code</th>
                    <th class="px-4 py-2">Credits</th>
                    <th class="px-4 py-2">Teacher</th>
                    <th class="px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subjects as $subject)
                <tr>
                    <td class="border px-4 py-2">{{ $subject->name }}</td>
                    <td class="border px-4 py-2">{{ $subject->description }}</td>
                    <td class="border px-4 py-2">{{ $subject->code }}</td>
                    <td class="border px-4 py-2">{{ $subject->credits }}</td>
                    <td class="border px-4 py-2">{{ $subject->teacher->name }}</td>
                    <td class="border px-4 py-2">
                        <form method="POST" action="{{ route('student.subjects.enroll', $subject->id) }}">
                            @csrf
                            <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm">
                                Take Subject
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
