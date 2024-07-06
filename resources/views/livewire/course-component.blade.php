<x-layouts.app>
    <h1>Cursos</h1>
    
    <ul>
        @foreach($courses as $course)
            <li><strong>{{ $course->name }}</strong>: {{ $course->description }}</li>
        @endforeach
    </ul>
</x-layouts.app>
