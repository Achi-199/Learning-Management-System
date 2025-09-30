<x-app-layout>
    <div class="max-w-3xl mx-auto py-8 text-black">
        <h1 class="text-3xl font-bold mb-4">{{ $task->title }}</h1>

        <p><strong>Description:</strong> {{ $task->description }}</p>
        <p><strong>Points:</strong> {{ $task->points }}</p>
        <p><strong>Submitted Solutions:</strong> {{ $submittedCount }}</p>
        <p><strong>Evaluated Solutions:</strong> {{ $evaluatedCount }}</p>

        <div class="mt-4">
            <a href="{{ route('teacher.tasks.edit', $task->id) }}"
                class="inline-block bg-yellow-400 text-black px-4 py-2 rounded hover:bg-yellow-500 mb-2">
                Edit Task
            </a>

            <div>
                <a href="{{ route('teacher.subjects.show', $task->subject_id) }}"
                    class="text-blue-400 underline inline-block">
                    ← Back to Subject
                </a>
            </div>
        </div>
    </div>
    @if($task->solutions->count())
    <h2 class="text-xl font-semibold mt-6 mb-2">Submitted Solutions</h2>
    <table class="table-auto w-full bg-white border border-gray-300 mt-4">
        <thead>
            <tr>
                <th class="border px-4 py-2">Submitted At</th>
                <th class="border px-4 py-2">Student Name</th>
                <th class="border px-4 py-2">Email</th>
                <th class="border px-4 py-2">Points</th>
                <th class="border px-4 py-2">Evaluated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($task->solutions as $solution)
            <tr>
                <td class="border px-4 py-2">{{ $solution->created_at->format('Y-m-d H:i') }}</td>
                <td class="border px-4 py-2">{{ $solution->student?->name ?? 'N/A' }}</td>
                <td class="border px-4 py-2">{{ $solution->student?->email ?? 'N/A' }}</td>
                <td class="border px-4 py-2">
                    @if ($solution->evaluated_at)
                    {{ $solution->points }} pts
                    @else
                    —
                    @endif
                </td>
                <td class="border px-4 py-2">
                    @if ($solution->evaluated_at)
                    {{ \Carbon\Carbon::parse($solution->evaluated_at)->format('Y-m-d H:i') }}
                    @else
                    <a href="{{ route('teacher.solutions.edit', $solution->id) }}"
                        class="text-white bg-blue-600 px-3 py-1 rounded hover:bg-blue-700">
                        Evaluate
                    </a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

</x-app-layout>