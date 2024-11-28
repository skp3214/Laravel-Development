<div>
    <h1>Student Data Table</h1>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Roll No</th>
            <th>Reg No</th>
        </tr>
        @foreach ($students as $student)
            <tr>
                <td>{{ $student['name'] }}</td>
                <td>{{ $student['Roll No'] }}</td>
                <td>{{ $student['Reg No'] }}</td>
            </tr>
        @endforeach
</div>
